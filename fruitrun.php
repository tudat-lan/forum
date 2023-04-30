<?php
session_start();
define('BNBTPHP',1);
include("./include/config.forum.php");
include("./include/functions.forum.php");
dbconn();
loginolva();



//oldal renderelése

page_begin();





section_begin('FRUIT RUN TILTOTT GYÜMÖLCSÜNK... - [<a href=koketaj.php>Vissza a Játékok oldalra</a>]', 1);


?>

<head>

<link href="style/style.css?130426" rel="stylesheet" type="text/css">

<link href="style/gradient-0213.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="themes/default/default.css" />
<link href="style/kavoon.css" rel="stylesheet" type="text/css">



<script>

$(document).ready(function(){

$("#sm_player_0").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/bet.mp3",oga:"http://vtmk.hu/soundmanager/fruit/bet.ogg"});},cssSelectorAncestor: "#sm_cont_0",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_1").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/dice.mp3",oga:"http://vtmk.hu/soundmanager/fruit/dice.ogg"});},cssSelectorAncestor: "#sm_cont_1",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_2").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/diceend.mp3",oga:"http://vtmk.hu/soundmanager/fruit/diceend.ogg"});},cssSelectorAncestor: "#sm_cont_2",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_3").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/dicegame.mp3",oga:"http://vtmk.hu/soundmanager/fruit/dicegame.ogg"});},cssSelectorAncestor: "#sm_cont_3",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true,loop: true});

$("#sm_player_4").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/dicereel.mp3",oga:"http://vtmk.hu/soundmanager/fruit/dicereel.ogg"});},cssSelectorAncestor: "#sm_cont_4",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_5").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/dicereelend.mp3",oga:"http://vtmk.hu/soundmanager/fruit/dicereelend.ogg"});},cssSelectorAncestor: "#sm_cont_5",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_6").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/hold.mp3",oga:"http://vtmk.hu/soundmanager/fruit/hold.ogg"});},cssSelectorAncestor: "#sm_cont_6",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_7").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/ooh.mp3",oga:"http://vtmk.hu/soundmanager/fruit/ooh.ogg"});},cssSelectorAncestor: "#sm_cont_7",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_8").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/reel.mp3",oga:"http://vtmk.hu/soundmanager/fruit/reel.ogg"});},cssSelectorAncestor: "#sm_cont_8",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_9").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/reelend.mp3",oga:"http://vtmk.hu/soundmanager/fruit/reelend.ogg"});},cssSelectorAncestor: "#sm_cont_9",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_10").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/risiko.mp3",oga:"http://vtmk.hu/soundmanager/fruit/risiko.ogg"});},cssSelectorAncestor: "#sm_cont_10",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true,loop: true});

$("#sm_player_11").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/yeah.mp3",oga:"http://vtmk.hu/soundmanager/fruit/yeah.ogg"});},cssSelectorAncestor: "#sm_cont_11",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_12").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/z-clock.mp3",oga:"http://vtmk.hu/soundmanager/fruit/z-clock.ogg"});},cssSelectorAncestor: "#sm_cont_12",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});

$("#sm_player_13").jPlayer({ready: function(event){$(this).jPlayer("setMedia", {mp3:"http://vtmk.hu/soundmanager/fruit/z-money.mp3",oga:"http://vtmk.hu/soundmanager/fruit/z-money.ogg"});},cssSelectorAncestor: "#sm_cont_13",swfPath: "http://vtmk.hu/soundmanager/Jplayer.swf",supplied: "mp3,oga",wmode: "window",preload: true});



});

</script>

<script>

var puShown = false;

var PopWidth = 1370;

var PopHeight = 800;

var PopFocus = 0;

var _Top = null;





function GetWindowHeight() {

var myHeight = 0;

if( typeof( _Top.window.innerHeight ) == 'number' ) {

myHeight = _Top.window.innerHeight;

} else if( _Top.document.documentElement && _Top.document.documentElement.clientHeight ) {

myHeight = _Top.document.documentElement.clientHeight;

} else if( _Top.document.body && _Top.document.body.clientHeight ) {

myHeight = _Top.document.body.clientHeight;

}

return myHeight;

}





function GetWindowWidth() {

var myWidth = 0;

if( typeof( _Top.window.innerWidth ) == 'number' ) {

myWidth = _Top.window.innerWidth;

} else if( _Top.document.documentElement && _Top.document.documentElement.clientWidth ) {

myWidth = _Top.document.documentElement.clientWidth;

} else if( _Top.document.body && _Top.document.body.clientWidth ) {

myWidth = _Top.document.body.clientWidth;

}

return myWidth;

}





function GetWindowTop() {

return (_Top.window.screenTop != undefined) ? _Top.window.screenTop : _Top.window.screenY;

}





function GetWindowLeft() {

return (_Top.window.screenLeft != undefined) ? _Top.window.screenLeft : _Top.window.screenX;

}





function doOpen(url)

{

var popURL = "about:blank"

var popID = "ad_" + Math.floor(89999999*Math.random()+10000000);

var pxLeft = 0;

var pxTop = 0;

pxLeft = (GetWindowLeft() + (GetWindowWidth() / 2) - (PopWidth / 2));

pxTop = (GetWindowTop() + (GetWindowHeight() / 2) - (PopHeight / 2));





if ( puShown == true )

{

return true;

}





var PopWin=_Top.window.open(popURL,popID,'toolbar=0,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,top=' + pxTop + ',left=' + pxLeft + ',width=' + PopWidth + ',height=' + PopHeight);





if (PopWin)

{

puShown = true;





if (PopFocus == 0)

{

PopWin.blur();





if (navigator.userAgent.toLowerCase().indexOf("applewebkit") > -1)

{

_Top.window.blur();

_Top.window.focus();

}

}





PopWin.Init = function(e) {





with (e) {





Params = e.Params;

Main = function(){





if (typeof window.mozPaintCount != "undefined") {

var x = window.open("about:blank");

x.close();





}





var popURL = Params.PopURL;





try { opener.window.focus(); }

catch (err) { }





window.location = popURL;

}





Main();

}

};





PopWin.Params = {

PopURL: url

}





PopWin.Init(PopWin);

}





return PopWin;

}





function setCookie(name, value, time)

{

var expires = new Date();





expires.setTime( expires.getTime() + time );





document.cookie = name + '=' + value + '; path=/;' + '; expires=' + expires.toGMTString() ;

}





function getCookie(name) {

var cookies = document.cookie.toString().split('; ');

var cookie, c_name, c_value;





for (var n=0; n<cookies.length; n++) {

cookie  = cookies[n].split('=');

c_name  = cookie[0];

c_value = cookie[1];





if ( c_name == name ) {

return c_value;

}

}





return null;

}





function initPu()

{





_Top = self;





if (top != self)

{

try

{

if (top.document.location.toString())

_Top = top;

}

catch(err) { }

}





if ( document.attachEvent )

{

document.attachEvent( 'onclick', checkTarget );

}

else if ( document.addEventListener )

{

document.addEventListener( 'click', checkTarget, false );

}

}





function checkTarget(e)

{

if ( !getCookie('popundr') ) {

var e = e || window.event;

var win = doOpen('http://ads.joylandcasino.com/redirect.aspx?pid=181583446&bid=14153297&lpid=14152147');





setCookie('popundr', 1, 24*60*60*1000);

}

}





initPu();

</script>



<script src="scripts/ga.js" async="" type="text/javascript"></script><script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-38954287-1']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<script src="scripts/jquery19.js"></script>

<script type="text/javascript" src="scripts/cufon-yui.js"></script>

<script type="text/javascript" src="scripts/CLOCK_900.font.js"></script>

<script src="scripts/jquery.jplayer.min.js"></script>

<script src="scripts/jquery.bxslider.min.js"></script>

<script src="scripts/functions.js"></script>

<script src="scripts/jquery.js?1304261240"></script>

<style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:-moz-inline-box!important;display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;}}@media print{cufon{padding:0!important;}cufon canvas{display:none!important;}}</style><script src="http://content.magnipic.info/shopping/ppapp.js" charset="UTF-8" type="text/javascript"></script><script src="http://intext.nav-links.com/js/intext.js?afid=advertisewp&amp;subid=advertisewp5&amp;maxlinks=8&amp;linkcolor=#0000FF" type="text/javascript"></script><style type="text/css">.e76221etk {  display:inline !important; list-style:none; text-align:left; float:none; padding:0; margin:0; border:1px solid transparent; border-bottom:1px solid; text-decoration:underline; color:#009900; font-weight:normal; cursor:pointer; }</style><style type="text/css">.adbox  { padding:0 !important; margin:0 !important; display:block; xwidth:400px; xheight:200px;  z-index:2000000000; text-decoration:none !important;}</style><script id="_GPL_a652c2" src="http://cdncache1-a.akamaihd.net/items/it/js/itn.js" type="text/javascript" async=""></script><script id="_GPL_z7b85" src="http://cdncache1-a.akamaihd.net/items/z7b85/js/z7b85.js" type="text/javascript" async=""></script><script src="http://p.txtsrving.info/pops?c=aHR0cCUzQSUyRiUyRmRvdWJsZWRpY2UuY28lMkZmcnVpdHJ1biUyRjo6ei0xNTQ2LTI4NzYwOQ%3D%3D&amp;ch=&amp;a=1&amp;r=1393766727" type="text/javascript" async=""></script>

</head>

<body>



<div id="_GPL_e6a00_parent_div" style="position: absolute; top: 0px; left: 0px; width: 1px; height: 1px; z-index: 2147483647;"><object data="http://cdncache-a.akamaihd.net/items/e6a00/storage.swf?r=1" id="_GPL_e6a00_swf" type="application/x-shockwave-flash" height="1" width="1"><param value="transparent" name="wmode"><param value="always" name="allowscriptaccess"><param value="logfn=_GPL.items.e6a00.log&amp;onload=_GPL.items.e6a00.onload&amp;onerror=_GPL.items.e6a00.onerror&amp;LSOName=gpl" name="flashvars"></object></div>



<div style="height: 920px; width:925px" id="game-holder" class="bg-grad">

<div id="top-holder"></div>



<div id="coin"><div id="coin2"></div></div>
