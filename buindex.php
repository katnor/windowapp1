<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Listening in Place - Window</title>
<!--Window - Katharine Norman 2012 http://www.novamara.com-->

<style type="text/css">
<!--
@import url("../Copy of window/css/months.css");
@import url("../Copy of window/css/flashblock.css");
@import url("../Copy of window/css/jquerycss.css"); 

#slider { margin: 10px; }
body,td,th {
	color: #CCC;
}
</style>

<script type="text/javascript" src = "../Copy of window/javascripts/jquery.js"></script>
<script type="text/javascript">
//****************************************//
//BROWSER CHECK
//IMPORTANT NOTE RE iOS  - have to start sounds with onclick and vol/pan doesn't work - so send to another page for different version
//browser capabilities test page http://www.cyscape.com/showbrow.asp
var iOS = false, p = navigator.platform;

if( p === 'iPad' || p === 'iPhone' || p === 'iPod' ){
    iOS = true;
	window.location.replace("sorrymobile.html");
	//browser = 5;
}
var win
var browser; //just in case needed later down the line
//browser detect 
if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){ //test for Firefox/x.x or Firefox x.x (ignoring remaining digits);
window.location.replace("index1.php");
browser = 1;
}
else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ 
browser = 2;
window.location.replace("index1.php");
}
else if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
browser = 3;
window.location.replace("index1.php");
}
else if(/Safari/.test(navigator.userAgent)){ 
browser = 4; 
window.location.replace("index1.php");
}
else if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) { //test for Opera/x.x or Opera x.x
browser = 5;
window.location.replace("index1.php");
}
else
//document.write("n/a")
window.location.replace("index1.php");
</script>

</head>
<body>
redirecting...
</body>
</html>