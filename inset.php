<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>inset</title>
<!--Window - Katharine Norman 2012 http://www.novamara.com-->

<style type="text/css">

@import url("../Copy of window/css/monthsAios.css");
@import url("../Copy of window/css/jquerycss.css"); 

#slider { margin: 10px; }
body,td,th {
	color: #CCC;
}
</style>

<script type="text/javascript" src = "../Copy of window/javascripts/jquery.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/kinetic.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/knjquery.cycle.all.js"></script> 
<script type="text/javascript" src="../Copy of window/javascripts/soundfadesios.js"></script> 
<script type="text/javascript" src="../Copy of window/javascripts/piecefunctionstab.js"></script> 
<script type="text/javascript">

<?php


//passed from cover file indextab.html
$month = $_GET["month"];
echo 'month = '. $month . ';';
?>
Array.prototype.shuffle = function() {
var s = [];
while (this.length) s.push(this.splice(Math.random() * this.length, 1)[0]);
while (s.length) this.push(s.pop());
return this;
} 

var soundNamer = new Array();
var k = 0;
var month;
var w = 950;
var h = 580;
var w1 = 880;
var h1 = 580;

var context;
var bufferLoader;
var source = new Array();
context = new webkitAudioContext();
var stage;

//other global declarations
var soundIds = new Array();
var months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
var monthnames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var soundNameso = ['apr-01','apr-02','apr-03','apr-04','apr-05','apr-06','apr-07','apr-08','apr-09','apr-10','apr-11','apr-12','apr-13','apr-14','apr-15','apr-16','apr-17','apr-18','apr-19','apr-20','apr-21','apr-22','apr-23','apr-24','apr-25','apr-26','apr-27','apr-28','apr-29','apr-30','apr-31','apr-32','apr-33','apr-34','apr-35','apr-36','apr-37','apr-38','apr-39','apr-40','apr-41','apr-42','apr-43','apr-44','apr-45','apr-46','apr-47','aug-01','aug-02','aug-03','aug-04','aug-05','aug-06','aug-07','aug-08','aug-09','aug-10','aug-11','aug-12','aug-13','aug-14','aug-15','aug-16','dec-01','dec-02','dec-03','dec-04','dec-05','dec-06','dec-07','dec-08','dec-09','dec-10','dec-11','dec-12','dec-13','feb-01','feb-02','feb-03','feb-04','feb-05','feb-06','feb-07','feb-08','feb-09','feb-10','feb-11','feb-12','feb-13','feb-14','feb-15','feb-16','feb-17','feb-18','feb-19','feb-20','feb-21','feb-22','feb-23','feb-24','feb-25','feb-26','feb-27','feb-28','feb-29','feb-30','feb-31','jan-11','jan-12','jan-13','jan-14','jan-15','jan-16','jan-17','jan-18','jan-19','jan-20','jan-21','jan-22','jan-23','jan-24','jan-25','jan-26','jan-27','jan-28','jan-29','jan-30','jan-31','jan-32','jan-33','jan-34','jan-35','jan-36','jan-37','jan-38','jan-39','jan-40','jul-01','jul-02','jul-03','jul-04','jul-05','jul-06','jul-07','jul-08','jul-09','jul-10','jul-11','jul-12','jul-13','jul-14','jul-15','jul-16','jul-17','jul-18','jul-19','jul-20','jun-01','jun-02','jun-03','jun-04','jun-05','jun-06','jun-07','jun-08','jun-09','jun-10','jun-11','jun-12','jun-13','jun-14','jun-15','jun-16','jun-17','jun-18','jun-19','jun-20','jun-21','jun-22','jun-23','jun-24','jun-25','jun-26','jun-27','jun-28','jun-29','jun-30','jun-31','jun-32','jun-33','jun-34','jun-35','jun-36','jun-37','jun-38','jun-39','jun-40','jun-41','mar-01','mar-02','mar-03','mar-04','mar-05','mar-06','mar-07','mar-08','mar-09','mar-11','mar-12','mar-13','mar-14','mar-15','mar-16','mar-17','mar-18','mar-19','mar-37','mar-38','may-01','may-02','may-03','may-04','may-05','may-06','may-07','may-08','may-09','may-10','may-11','may-12','may-13','may-14','may-15','may-16','may-17','may-18','may-19','may-31','may-32','may-33','may-34','nov-01','nov-02','nov-03','nov-04','nov-05','nov-06','nov-07','nov-08','nov-09','nov-10','nov-11','nov-12','nov-13','nov-14','nov-15','nov-16','nov-17','nov-18','nov-19','nov-20','nov-21','nov-22','nov-23','nov-24','oct-01','oct-02','oct-03','oct-04','oct-05','oct-06','oct-07','oct-08','oct-09','oct-10','oct-11','sep-01','sep-02','sep-03','sep-04','sep-05','sep-06','sep-07','sep-08','sep-09','sep-10','sep-11','sep-12','sep-13','sep-14','sep-15','sep-16','sep-17','sep-18','sep-19'];
var soundNameso1 = ['./lrallsounds/apr-01.mp3','./lrallsounds/apr-02.mp3','./lrallsounds/apr-03.mp3','./lrallsounds/apr-04.mp3','./lrallsounds/apr-05.mp3','./lrallsounds/apr-06.mp3','./lrallsounds/apr-07.mp3','./lrallsounds/apr-08.mp3','./lrallsounds/apr-09.mp3','./lrallsounds/apr-10.mp3','./lrallsounds/apr-11.mp3','./lrallsounds/apr-12.mp3','./lrallsounds/apr-13.mp3','./lrallsounds/apr-14.mp3','./lrallsounds/apr-15.mp3','./lrallsounds/apr-16.mp3','./lrallsounds/apr-17.mp3','./lrallsounds/apr-18.mp3','./lrallsounds/apr-19.mp3','./lrallsounds/apr-20.mp3','./lrallsounds/apr-21.mp3','./lrallsounds/apr-22.mp3','./lrallsounds/apr-23.mp3','./lrallsounds/apr-24.mp3','./lrallsounds/apr-25.mp3','./lrallsounds/apr-26.mp3','./lrallsounds/apr-27.mp3','./lrallsounds/apr-28.mp3','./lrallsounds/apr-29.mp3','./lrallsounds/apr-30.mp3','./lrallsounds/apr-31.mp3','./lrallsounds/apr-32.mp3','./lrallsounds/apr-33.mp3','./lrallsounds/apr-34.mp3','./lrallsounds/apr-35.mp3','./lrallsounds/apr-36.mp3','./lrallsounds/apr-37.mp3','./lrallsounds/apr-38.mp3','./lrallsounds/apr-39.mp3','./lrallsounds/apr-40.mp3','./lrallsounds/apr-41.mp3','./lrallsounds/apr-42.mp3','./lrallsounds/apr-43.mp3','./lrallsounds/apr-44.mp3','./lrallsounds/apr-45.mp3','./lrallsounds/apr-46.mp3','./lrallsounds/apr-47.mp3','./lrallsounds/aug-01.mp3','./lrallsounds/aug-02.mp3','./lrallsounds/aug-03.mp3','./lrallsounds/aug-04.mp3','./lrallsounds/aug-05.mp3','./lrallsounds/aug-06.mp3','./lrallsounds/aug-07.mp3','./lrallsounds/aug-08.mp3','./lrallsounds/aug-09.mp3','./lrallsounds/aug-10.mp3','./lrallsounds/aug-11.mp3','./lrallsounds/aug-12.mp3','./lrallsounds/aug-13.mp3','./lrallsounds/aug-14.mp3','./lrallsounds/aug-15.mp3','./lrallsounds/aug-16.mp3','./lrallsounds/dec-01.mp3','./lrallsounds/dec-02.mp3','./lrallsounds/dec-03.mp3','./lrallsounds/dec-04.mp3','./lrallsounds/dec-05.mp3','./lrallsounds/dec-06.mp3','./lrallsounds/dec-07.mp3','./lrallsounds/dec-08.mp3','./lrallsounds/dec-09.mp3','./lrallsounds/dec-10.mp3','./lrallsounds/dec-11.mp3','./lrallsounds/dec-12.mp3','./lrallsounds/dec-13.mp3','./lrallsounds/feb-01.mp3','./lrallsounds/feb-02.mp3','./lrallsounds/feb-03.mp3','./lrallsounds/feb-04.mp3','./lrallsounds/feb-05.mp3','./lrallsounds/feb-06.mp3','./lrallsounds/feb-07.mp3','./lrallsounds/feb-08.mp3','./lrallsounds/feb-09.mp3','./lrallsounds/feb-10.mp3','./lrallsounds/feb-11.mp3','./lrallsounds/feb-12.mp3','./lrallsounds/feb-13.mp3','./lrallsounds/feb-14.mp3','./lrallsounds/feb-15.mp3','./lrallsounds/feb-16.mp3','./lrallsounds/feb-17.mp3','./lrallsounds/feb-18.mp3','./lrallsounds/feb-19.mp3','./lrallsounds/feb-20.mp3','./lrallsounds/feb-21.mp3','./lrallsounds/feb-22.mp3','./lrallsounds/feb-23.mp3','./lrallsounds/feb-24.mp3','./lrallsounds/feb-25.mp3','./lrallsounds/feb-26.mp3','./lrallsounds/feb-27.mp3','./lrallsounds/feb-28.mp3','./lrallsounds/feb-29.mp3','./lrallsounds/feb-30.mp3','./lrallsounds/feb-31.mp3','./lrallsounds/jan-11.mp3','./lrallsounds/jan-12.mp3','./lrallsounds/jan-13.mp3','./lrallsounds/jan-14.mp3','./lrallsounds/jan-15.mp3','./lrallsounds/jan-16.mp3','./lrallsounds/jan-17.mp3','./lrallsounds/jan-18.mp3','./lrallsounds/jan-19.mp3','./lrallsounds/jan-20.mp3','./lrallsounds/jan-21.mp3','./lrallsounds/jan-22.mp3','./lrallsounds/jan-23.mp3','./lrallsounds/jan-24.mp3','./lrallsounds/jan-25.mp3','./lrallsounds/jan-26.mp3','./lrallsounds/jan-27.mp3','./lrallsounds/jan-28.mp3','./lrallsounds/jan-29.mp3','./lrallsounds/jan-30.mp3','./lrallsounds/jan-31.mp3','./lrallsounds/jan-32.mp3','./lrallsounds/jan-33.mp3','./lrallsounds/jan-34.mp3','./lrallsounds/jan-35.mp3','./lrallsounds/jan-36.mp3','./lrallsounds/jan-37.mp3','./lrallsounds/jan-38.mp3','./lrallsounds/jan-39.mp3','./lrallsounds/jan-40.mp3','./lrallsounds/jul-01.mp3','./lrallsounds/jul-02.mp3','./lrallsounds/jul-03.mp3','./lrallsounds/jul-04.mp3','./lrallsounds/jul-05.mp3','./lrallsounds/jul-06.mp3','./lrallsounds/jul-07.mp3','./lrallsounds/jul-08.mp3','./lrallsounds/jul-09.mp3','./lrallsounds/jul-10.mp3','./lrallsounds/jul-11.mp3','./lrallsounds/jul-12.mp3','./lrallsounds/jul-13.mp3','./lrallsounds/jul-14.mp3','./lrallsounds/jul-15.mp3','./lrallsounds/jul-16.mp3','./lrallsounds/jul-17.mp3','./lrallsounds/jul-18.mp3','./lrallsounds/jul-19.mp3','./lrallsounds/jul-20.mp3','./lrallsounds/jun-01.mp3','./lrallsounds/jun-02.mp3','./lrallsounds/jun-03.mp3','./lrallsounds/jun-04.mp3','./lrallsounds/jun-05.mp3','./lrallsounds/jun-06.mp3','./lrallsounds/jun-07.mp3','./lrallsounds/jun-08.mp3','./lrallsounds/jun-09.mp3','./lrallsounds/jun-10.mp3','./lrallsounds/jun-11.mp3','./lrallsounds/jun-12.mp3','./lrallsounds/jun-13.mp3','./lrallsounds/jun-14.mp3','./lrallsounds/jun-15.mp3','./lrallsounds/jun-16.mp3','./lrallsounds/jun-17.mp3','./lrallsounds/jun-18.mp3','./lrallsounds/jun-19.mp3','./lrallsounds/jun-20.mp3','./lrallsounds/jun-21.mp3','./lrallsounds/jun-22.mp3','./lrallsounds/jun-23.mp3','./lrallsounds/jun-24.mp3','./lrallsounds/jun-25.mp3','./lrallsounds/jun-26.mp3','./lrallsounds/jun-27.mp3','./lrallsounds/jun-28.mp3','./lrallsounds/jun-29.mp3','./lrallsounds/jun-30.mp3','./lrallsounds/jun-31.mp3','./lrallsounds/jun-32.mp3','./lrallsounds/jun-33.mp3','./lrallsounds/jun-34.mp3','./lrallsounds/jun-35.mp3','./lrallsounds/jun-36.mp3','./lrallsounds/jun-37.mp3','./lrallsounds/jun-38.mp3','./lrallsounds/jun-39.mp3','./lrallsounds/jun-40.mp3','./lrallsounds/jun-41.mp3','./lrallsounds/mar-01.mp3','./lrallsounds/mar-02.mp3','./lrallsounds/mar-03.mp3','./lrallsounds/mar-04.mp3','./lrallsounds/mar-05.mp3','./lrallsounds/mar-06.mp3','./lrallsounds/mar-07.mp3','./lrallsounds/mar-08.mp3','./lrallsounds/mar-09.mp3','./lrallsounds/mar-11.mp3','./lrallsounds/mar-12.mp3','./lrallsounds/mar-13.mp3','./lrallsounds/mar-14.mp3','./lrallsounds/mar-15.mp3','./lrallsounds/mar-16.mp3','./lrallsounds/mar-17.mp3','./lrallsounds/mar-18.mp3','./lrallsounds/mar-19.mp3','./lrallsounds/mar-37.mp3','./lrallsounds/mar-38.mp3','./lrallsounds/may-01.mp3','./lrallsounds/may-02.mp3','./lrallsounds/may-03.mp3','./lrallsounds/may-04.mp3','./lrallsounds/may-05.mp3','./lrallsounds/may-06.mp3','./lrallsounds/may-07.mp3','./lrallsounds/may-08.mp3','./lrallsounds/may-09.mp3','./lrallsounds/may-10.mp3','./lrallsounds/may-11.mp3','./lrallsounds/may-12.mp3','./lrallsounds/may-13.mp3','./lrallsounds/may-14.mp3','./lrallsounds/may-15.mp3','./lrallsounds/may-16.mp3','./lrallsounds/may-17.mp3','./lrallsounds/may-18.mp3','./lrallsounds/may-19.mp3','./lrallsounds/may-31.mp3','./lrallsounds/may-32.mp3','./lrallsounds/may-33.mp3','./lrallsounds/may-34.mp3','./lrallsounds/nov-01.mp3','./lrallsounds/nov-02.mp3','./lrallsounds/nov-03.mp3','./lrallsounds/nov-04.mp3','./lrallsounds/nov-05.mp3','./lrallsounds/nov-06.mp3','./lrallsounds/nov-07.mp3','./lrallsounds/nov-08.mp3','./lrallsounds/nov-09.mp3','./lrallsounds/nov-10.mp3','./lrallsounds/nov-11.mp3','./lrallsounds/nov-12.mp3','./lrallsounds/nov-13.mp3','./lrallsounds/nov-14.mp3','./lrallsounds/nov-15.mp3','./lrallsounds/nov-16.mp3','./lrallsounds/nov-17.mp3','./lrallsounds/nov-18.mp3','./lrallsounds/nov-19.mp3','./lrallsounds/nov-20.mp3','./lrallsounds/nov-21.mp3','./lrallsounds/nov-22.mp3','./lrallsounds/nov-23.mp3','./lrallsounds/nov-24.mp3','./lrallsounds/oct-01.mp3','./lrallsounds/oct-02.mp3','./lrallsounds/oct-03.mp3','./lrallsounds/oct-04.mp3','./lrallsounds/oct-05.mp3','./lrallsounds/oct-06.mp3','./lrallsounds/oct-07.mp3','./lrallsounds/oct-08.mp3','./lrallsounds/oct-09.mp3','./lrallsounds/oct-10.mp3','./lrallsounds/oct-11.mp3','./lrallsounds/sep-01.mp3','./lrallsounds/sep-02.mp3','./lrallsounds/sep-03.mp3','./lrallsounds/sep-04.mp3','./lrallsounds/sep-05.mp3','./lrallsounds/sep-06.mp3','./lrallsounds/sep-07.mp3','./lrallsounds/sep-08.mp3','./lrallsounds/sep-09.mp3','./lrallsounds/sep-10.mp3','./lrallsounds/sep-11.mp3','./lrallsounds/sep-12.mp3','./lrallsounds/sep-13.mp3','./lrallsounds/sep-14.mp3','./lrallsounds/sep-15.mp3','./lrallsounds/sep-16.mp3','./lrallsounds/sep-17.mp3','./lrallsounds/sep-18.mp3','./lrallsounds/sep-19.mp3'];
var imageNames = ['A-08.jpg','A-18.jpg','A-28.jpg','A-30.jpg','A-79.jpg','A-80.jpg','A-86.jpg','B-34.jpg','B-37.jpg','B-39.jpg','B-43.jpg','B-69.jpg','B-76.jpg','B-77.jpg','C-04.jpg','C-12.jpg','C-35.jpg','C-46.jpg','C-52.jpg','C-57.jpg','C-78.jpg','D-1.jpg','D-10.jpg','D-13.jpg','D-2.jpg','D-4.jpg','D-5.jpg','D-60.jpg','E-01.jpg','E-24.jpg','E-45.jpg','E-62.jpg','E-63.jpg','E-66.jpg','E-82.jpg','F-03.jpg','F-142.jpg','F-233.jpg','F-455.jpg','F-617.jpg','F-719.jpg','F-784.jpg','G-073.jpg','G-09.jpg','G-59.jpg','G-61.jpg','G-8.jpg','G-81.jpg','G-814.jpg','G-950.jpg','H-16.jpg','H-20.jpg','H-23.jpg','H-44.jpg','H-49.jpg','H-56.jpg','H-64.jpg','I-02.jpg','I-25.jpg','I-51.jpg','I-58.jpg','I-67.jpg','I-72.jpg','I-75.jpg','J-07.jpg','J-26.jpg','J-31.jpg','J-36.jpg','J-40.jpg','J-41.jpg','J-48.jpg','K-06.jpg','K-21.jpg','K-22.jpg','K-38.jpg','K-53.jpg','K-65.jpg','K-70.jpg','L-05.jpg','L-11.jpg','L-27.jpg','L-29.jpg','L-47.jpg','L-83.jpg','L-85.jpg'];
//	
var oldsounds = new Array();
//prep all sounds and handles at init and then select from them later
var oldobjects = new Array();

var xinit, yinit;
var colorchoice = new Array();
var color;

//var stage;
var tobjs = new Array();
var wordobjects = new Array();
var wordslayer;;
var shaperlayer;;
var initmonth = 0;
var wordwidth = 300; //width of shape to group words to 
var startalphaval = 0.2; //start opacity. = slider val (1-startalpha) * 100 - will be chosen by buttons
var globalcounter = 0;
var setit = 0;
var nextmonth;
var counter = 0;
var textinit = 0;
var shapeinit = 0;
var fadehappen = 0;
var stoppit = 0;
var percentage;
var cagegone = 0;
var tclik = 0;
var pclik = 0;

colorchoice = ["#F5FAFF", "#C8DADB", "#BBC9BD", "#C4F5CA", "#EDF5C4", "#FAEDA2", "#F5C5B0", "#E6CD9E", "#E0923F", "#7FA0A1", "#B8B8B8", "#B0B0B5"];
var ilay;
var wordslayer;
var starting;
var shaperlayer;
var d = new Date();
var oldtime;
if (month < 11) nextmonth = month + 1;
else nextmonth = 0;
color = colorchoice[month];
 
//TEXTS - now only one for each
var moreinfotexts = new Array("This could take some time to load. Please wait for the signs below.", "Is the volume turned up on your computer?", "Headphones or good sound speakers will make a big difference", "Because there will be sounds, eventually", "Actually, very ordinary sounds...", "similar to everyday sounds you might know well", "(or if not, you'll have your own)", "There is nothing special about these sounds", "They're simply there, in the background", "(Taken for granted - like breathing in and breathing out)","They are peripheral, lurking at the edges while life goes on", "Sounds don't mean anything. It's what you bring that matters","There's no need to close your eyes", "Woken by sun or rain, or by the kettle boiling...","  ...the day begins with where you are", "A strangely familiar landscape gathers into a place", "Open the window" ,"...listen." );

//7&12 
var outsideobs = new Array('starlings congregate, cackling','pigeons sway along the roof top','a long-legged hedgehog makes tracks','slick trails on the paving stones','a cat, waiting','small birds chatter for berries','above, an opaque slate sky','a line of pylons astride yellow fields','over there, the clouds are clearing','we make stillness, here','home is in these things','taking the long way round');
var outsidesnds = new Array('fence panels fight the wind','somewhere, wind chimes','and there are always birds that sing','leaves shiver paper rain','a ball thuds in a childish rhythm','traffic as ever changing silence','planes come and go above, quite unheard','and there are birds that listen','rain hardens against glass','listening at the edgelands','the mower makes sunlight','your view from here');
var insidesnds = new Array('a forgotten door bangs without reason','Mozart and tea clatter downstairs','the TV turned down, to listen','a cat, demanding','the shower’s hollow rainfall','a drawer opened and closed, in haste','the rattle of curtain rings, light','floorboards complain in that familiar way','the hum of the boiler signals time','radiators gurgle pleasantly','I remember this time last year','fog, hanging still');
var homestuff = new Array('inside this room, a universe','in such small journeys, everything','the tree, the sky, the garden','beyond this window, familiar paths','mapping the territory','back and forth, again again','this place where the quotidian resides','a version of the ordinary rituals','a window between here and there','my small Walden','place is a gathering','geometric shadows, suddenly');
var placestuff = new Array('are we in the same place, together?','dust settles visibly, in that familiar way','today’s same morning light','gathering more each time','are these clicks detritus?','is this ordinary?','this tree means home','remembering a hand against bark','sound enters, light reveals','listening makes dimension','catching the periphery','rain on the window ledge, inside');
var timestuff = new Array('tending the tomatoes, daily','at dusk these sudden streaks of gold','once, a helicopter','two dogs pass, the white one barks','the news looks good, she says','what kind of light today?','the same sun again','sound from a distance','beating the bounds of home','Sunday bells that come and go','listening at the edgelands','tomorrow will be warmer');
var youandme = new Array('he reminds me of the time','he is downstairs, now','are these sounds extraneous?','gathering small things for the journey','he and I in the mirror, together','my breath against the duvet','in another room, his chair creaks','the spoon against the bowl','I hear your breath, too','thinking of playing the piano','this interlacing tracery of sense','in all kinds of weather');

outsideobs.shuffle();
outsidesnds.shuffle();
insidesnds.shuffle();
homestuff.shuffle();
placestuff.shuffle();
timestuff.shuffle();
youandme.shuffle();
//
//TO DO each time you run this, sort all those above randomly then sort into 7s for the wordobject array for each month
var alltexts = new Array(outsideobs, outsidesnds, insidesnds, homestuff, placestuff, timestuff, youandme);

//eventually might pull this in via mysql
var essaytexts = new Array("<p>For a year I took a photograph from my window nearly every day, often in the morning while getting up. I recorded sound as well, pointing the microphone from the window or sometimes back into the room. While I frequently stopped to look and listen, sometimes I was in a hurry and had other things to do.  In any case, listening doesn’t require contemplation, and looking can thrive in a fleeting glance.</p></br><p>As I looked and listened each day, and re-looked and re-listened to my recordings (feeling possessive, as if they were part of me), I was conscious of how familiarity arises from the accumulation of small, ordinary experiences, repeated innumerable times—this is how it feels to know a place. </p>","<p>A dog barks and a distant engine sputters into life. There is so much going on. Trying to catch ordinary things and ordinary ways of being in sound and light—it’s like attempting to catch sight of your back in a mirror. You contort your listening and looking, and the ordinary is gone before you know it, impossible to grasp. One moment a bird sings, the next a plane flies overhead. Both normally seem quite unheard.</p></br><p> Every day the same view, but in all kinds of weather. Habit gives rise to deep attachments. </p></br><p>Places are forged by people, mapping their landscapes, not by sounds or light. It almost goes without saying.</p>","<p>There is a film of John Cage making bread, Slapping and shaping the dough, and pushing it down into the pan—he describes the process to the filmmaker while he works, as if how to make bread is what we need to know. He bangs the breadpan on the work surface and dislodges the oiled dough, taking delight in an ordinary ritual. I would like to thank him for this—for making a noise with ordinary pots and pans, for patting and shaping the loaf and carefully collecting up the scraps. Nothing wasted. Everything important.</p></br><p>We stop to listen and suddenly we are here, at home in these quite unnecessary sounds—the important detritus of our daily lives. </p>","<p>This nameless tree is larger than the surrounding suburban foliage. Transplanted from a Romantic landscape, its feathery branches grasp the sky. I take a photo or two each morning, trying to get it into focus. Sometimes I return later on, greeting it as a friend. As time moves on, I see the tree in context, and grab the camera when I observe a change in the sky, or hear that the wind is up, or notice some other shift in our co-existence. </p></br><p>At first I felt this was a rather pointless, obsessive behaviour. I’d miss my train.  Lately I have become less naïve about my priorities. I have realised that looking closely at trees is quite essential.</p>","<p>On the train home, two ebullient girls in flamboyant African dress and lugging suitcases are obviously off to the airport. They are supremely loud in all respects, verbally sparring in an amazingly extrovert English that I can’t quite identify. Posing alternately in the aisle they take turns to hold up their phones and record the other ‘being interviewed’. Then they play the videos back, laughing uproariously and adding an ongoing commentary. Back and forth they travel, listening, looking and laughing, and confirming their existence to one another. </p></br><p>The train moves on. I stare out at the familiar Essex landscape while they make touchscreen connections.</p></br><p>We are all on our way.</p>","<p>In his ‘Indeterminacy: New Aspect of Form in Instrumental and Electronic Music’, Cage recited a series of stories and observations from his own experience, each related within a one-minute window. He made a performance version in which pianist David Tudor played fragments of Cage’s music, starting and ending at times derived by chance procedures.</p></br><p>Tudor performed out of Cage’s earshot, in another room.</p><p></p><p> Cage’s life and work often seems to me a series of superimposed layers, each capable of being either art or unremarkable quotidian experience, or of being both.</p>","<p>This place has settled pragmatically into the landscape without concern for its surroundings. A starling cackles from the TV aerial. At dusk a long-legged hedgehog makes trips across the patio, intent on killing. The clouds blow from left to right behind the tree, going nowhere. The space is moving all the time. </p></br><p> It is an easy matter to be transfixed by the ripple of a flag in the breeze, by the rustling of leaves or the shadow across the fence. </p></br><p>The landscape as view is dissolving into details illuminated by sound, light and the movement of air.</p>","<p> Morning. The cars, the trains, the birds, the wind, the shower in the other room, his voice, the way the door closes, the rattle of the curtains pulled to greet the day. Outside, children squealing. </p></br><p>Evening. The rain subsides. The breeze hisses in the cherry tree, and darkness falls. I close the window against the cooling air. Inside, suddenly quiet.</p></br><p>The view continues out into the night.</p>","<p>In bed, listening, mapping the familiar landscape of home. A particular creak of a chair and the clink of his spoon against the bowl. Outside, the birds are vocal today, perhaps there is fog.  Water gurgles through the radiator, trickling from one place to another. On the landing a pipe creaks, somewhere under the floorboards. </p></br><p>This domestic landscape is composed entirely of those things at the edges, and yet in listening out for them one can travel vast distances. That poetic philosopher, Gaston Bachelard would call them 'intimate immensities'—they form the soundtrack to those places where we become lost in thought and dreams.</p>","<p>It’s the kind of view to which you’d pay no attention as you slam the car door shut and haul the shopping home, or rush out in the morning to go to work. There’s no need to stop or even to close your eyes. </p></br><p>I don’t demand tranquility, there’s no time for that. </p></br><p> Everything is worth listening to. Tranquility is an absence.</p>","<p>In anticipation, I open the window on today’s familiar new view. The natural signs of being here move back into place—the tree, the children’s toys, the rooftop birds, the distant pylons. Up to the clouds, and back to the window ledge. Where does this place end and the view begin?</p></br><p>Sounds rush in and over. His footsteps on the stairs, descending. Downstairs, the cat cries for food. The forgotten alarm goes off again. Time moves forward (in a way).<p></br><p> Listening, I might lose my margins—the distinction between here and there, and now and then. </p>","<p>In the last year of his life Cage gave an interview, seated by the window in his New York apartment. The traffic rumbles by below, an occasional car horn or brake screech rising upwards and into the room. Cage, relaxed and quite undisturbed by the noise, talks about sound and listening. He is always smiling or near to smiling.</p></br><p>He says</p></br><p>'...I love sounds, just as they are, and I have no need for them to be anything more than what they are. I don’t want them to be psychological, I don’t want a sound to pretend to be a bucket, or that it’s the President, or that it’s in love with another sound. I just want it to be a sound.'</p></br><p>Reaching down, he chucks the chin of his well-beloved cat.</p></br>");
	
//Cage clip on youtube - not embedding tho as it's copyright...<p><iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/2aYT1Pwp30M\" frameborder=\"0\"></iframe></p>
//essaytexts.shuffle();
//different order each time - and means I can add more texts later.

var iOS = false, p = navigator.platform;

if( p === 'iPad' || p === 'iPhone' || p === 'iPod' ){
    iOS = true;
	//browser = 5;
}
var win
var browser; //just in case needed later down the line
//browser detect 
if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){ //test for Firefox/x.x or Firefox x.x (ignoring remaining digits);
//document.write("you are using firefox");
browser = 1;
}
else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ 
browser = 2;
///	window.location.replace("sorryie.html");
}
else if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
browser = 3;
}
else if(/Safari/.test(navigator.userAgent)){ 
browser = 4;  
}
else if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) { //test for Opera/x.x or Opera x.x
browser = 5;
}
else
//document.write("n/a")

imageNames.sort();

var jansound = new Array();
var febsound = new Array();
var marsound = new Array();
var aprsound = new Array();
var maysound = new Array();
var junsound = new Array();
var julsound = new Array();
var augsound = new Array();
var sepsound = new Array();
var octsound = new Array();
var novsound = new Array();
var decsound = new Array();

var soundNames = [jansound, febsound, marsound, aprsound, maysound, junsound, julsound, augsound, sepsound, octsound, novsound, decsound];

$(document).ready(function() {
	for (i = 0; i < soundNameso1.length; i++ ){
	//does this console.log(soundNameso1[i]);
	if(soundNameso[i].indexOf('jan-') == 0) 
		jansound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('feb-') == 0) 
		febsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('mar-') == 0)
		marsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('apr-') == 0)
		aprsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('may-') == 0)
		maysound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('jun-') == 0)
		junsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('jul-') == 0)
		julsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('aug-') == 0)
		augsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('sep-') == 0)
		sepsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('oct-') == 0)
		octsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('nov-') == 0)
		novsound.push(soundNameso1[i]);
	else if(soundNameso[i].indexOf('dec-') == 0)
		decsound.push(soundNameso1[i]);
}

	//shuffled the contents of each month - only 7 from each will be picked 
	for(i = 0; i < 12; i++) {
		soundNames[i].shuffle();
	}///JUST SET UP ONE MONTH 
  	for(j = 0; j < 7; j++) {
	 	  soundNamer[j] = soundNames[month][j]; //if one month j rather than k
		("soundNamer...." + soundNamer[i]);
		  k++;
	  }


function BufferLoader(context, urlList, callback) {
    this.context = context;
    this.urlList = urlList;
    this.onload = callback;
    this.bufferList = new Array();
    this.loadCount = 0;
}

BufferLoader.prototype.loadBuffer = function(url, index) {
    // Load buffer asynchronously
    var request = new XMLHttpRequest();
    request.open("GET", url, true);
    request.responseType = "arraybuffer";

    var loader = this;

    request.onload = function() {
        // Asynchronously decode the audio file data in request.response
        loader.context.decodeAudioData(
            request.response,
            function(buffer) {
                if (!buffer) {
                    alert('error decoding file data: ' + url);
                    return;
                }
                loader.bufferList[index] = buffer;
                if (++loader.loadCount == loader.urlList.length)
                    loader.onload(loader.bufferList);
            }    
        );
    }

    request.onerror = function() {
        alert('BufferLoader: XHR error');        
    }

    request.send();
}

BufferLoader.prototype.load = function() {
    for (var i = 0; i < this.urlList.length; ++i)
        this.loadBuffer(this.urlList[i], i);
}

 
function init() {
 //yup console.log("doing init");
  bufferLoader = new BufferLoader(
    context,
  soundNamer,
    finishedLoading
    );
  bufferLoader.load();
  }

// Gain node needs to be mutated by volume control.
function finishedLoading(bufferList) {
  for (i = 0; i < soundNamer.length; i++ ) {
	source[i] = context.createBufferSource();
	source[i].buffer = bufferList[i];
    source[i].gainNode = context.createGainNode();
	source[i].gainNode1 = context.createGainNode();
	source[i].gainNode2 = context.createGainNode();
 	source[i].merger = context.createChannelMerger();
	source[i].connect(source[i].gainNode);
	source[i].gainNode.connect(source[i].gainNode1);
	source[i].gainNode.connect(source[i].gainNode2);
    source[i].gainNode1.connect(source[i].merger, 0, 0);
    source[i].gainNode2.connect(source[i].merger, 0, 1);
    source[i].merger.connect(context.destination);
 // source[i].noteOn(0);
 //   console.log(source[i].buffer.duration);
	 	 }
month = d.getMonth();
son();

			stage = new Kinetic.Stage({
        	  container: "content1",
         	  width: w,
          	  height: h
        	}); 
		//	stage.start();
	ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();		

	 }

jQuery.fn.center = function() {
    var container = $(window);
   // var top = -this.height() / 2;
    var left = -this.width() / 2;
    return this.css('position', 'absolute').css({ 'margin-left': left + 'px',  'left': '50%'});
}
	
	$('#problems').hide();
	$('#problems').center();
	$('#thankyou').hide();
	$('#thankyou').center();
	$('#probs').center();
	$('#thanks').center();
	$('#cover').hide();
	$('#cover').center();
	//$('#goarrow').hide();
	$('#goarrow').center();
	$('#coverbg').center();
	$('#loadit').center();
	$('#moreinfoA').center();
	$('#moreinfoA').hide();
	$('#moreinfoB').center();
	$('#moreinfoB').hide();
	$('#buttonsinfo').center();
	$('#buttonsinfo').hide();
	$('#moreinfo1').hide();
	$('#moreinfo2').hide();
	$('#moreinfo3').hide();
	$('#moreinfobg').center();
	//this covers the months at bottom during load
	$('#content1').center();
	$('#bgcover1').center();
	$('#bgcover2').center();
	$('#textlay').center();
	$('#textlay').hide();
	$('#textbag').center();
	$('#shapebag').center();
	$('#bgcontent').center();
	$('#bottomstrip').center();
	$('#author1').hide();
	$('#author2').hide();
	$('#author1').center();
	$('#author2').center();
	$('#cover').fadeIn(500);
	$('#goarrow').fadeIn(500);
	$('#author1').fadeIn(300);
  	$('#author2').fadeIn(300);
	
	$("#goarrow").each(function() {
				$(this).hover(function() {
					$(this).stop().animate({ opacity: 1.0 }, 100);
				},
			   function() {
				   $(this).stop().animate({ opacity: 0.8 }, 200);
			   });
			});
  
	$(function() {
 	 	$("#slider").slider({
		value:(1-startalphaval) * 100, //first slider setting - but should be overriden at start
		max: 100,
		min: 0,
		step:2, 
		slide: function(event, ui) {
			
		if (ui.value <= 20) {
		  if (textinit == 1) {
		  	$('#textlay').fadeTo(1000,0); 
		  	$("#textbag").fadeTo(1000,0);
		 	textinit = 0;
 			}
			}
		if (ui.value > 20 && ui.value <= 50 ) {
		 	 if (textinit == 0) {
			  textinit = 1;
		 	 $("#textlay").fadeTo(1200,1);	
		 	 $("#textbag").fadeTo(1000,0.2);
			 }
			 
		  	if (shapeinit == 1) {
			 	shapeinit = 0;
		 	 	$("#shapebag").fadeTo(1000,0);
		 	 	fadeoutlayer(shaperlayer);
		  		}
			}
			
		if ( ui.value <= 20 | ui.value > 50 ) {
		  if(textinit == 1) {
			textinit = 0;
		  	$('#textlay').fadeTo(1000,0); 
		  	$("#textbag").fadeTo(1000,0);
		  }
			}
			
		if (ui.value >  50 && ui.value <= 80) {
		  if (shapeinit == 0) {
			  shapeinit = 1;
		 	 $("#shapebag").fadeTo(1200,0.2);	
		 	 fadeuplayer(shaperlayer, 0, 0.5);
		  		}
			}
			
		if (ui.value > 80 | ui.value <= 50) {
		  if (shapeinit == 1) {
		  shapeinit = 0;
		  $("#shapebag").fadeTo(1000,0);
		  fadeoutlayer(shaperlayer);
		  }
		}
			//invert value to put in range 0 to 1 and get 1 to 0 scale. 1 is left = opaque
		var alphaval = ((ui.value-100)*-1)/100; 
		$('#bgcover2').css({ 'opacity' : alphaval }); 
	 }
	});
});
$('.ui-slider-handle').css('cursor', 'pointer');
$('#bgcover2').css({ 'opacity' : startalphaval });

 
init();



</script>
</head>
<body bgcolor="#000000" onmousedown="return false;">
<div id = "coverbg" class = "cageclassbg"></div>
<div id = "author1" class = "authortitle1" align="center"><p>Window</p></div>
<div id = "author2" class = "authortitle2" align="center"><p><a href = "http://www.novamara.com">Katharine Norman</a></p><p>(2012 - winner 2012 New Media Writing Prize)</p></div>
<div id = "goarrow" class = "go" align="center" ><a href="javascript:nxt()">></a></p></div>
<div id = "cover" class = "cageclass" align="center"><p>In memory of</p>
<p><a href = "http://exhibitions.nypl.org/johncage/" target = "blank"><div class = "mrcage">John Cage</div></a></p>
<p>(September 5, 1912 – August 12, 1992)</p></br><p><img src = "../Copy of window/sharedassets/John_Cage_Laugh.png" width="200" height="200"/></p></br><p>Cage's influential life and work continue to inspire so many people, and in so many ways. For me, he proves that telling personal stories about everyday life can communicate ideas, that the most ordinary things have value, and that sounds are at once useful and inherently meaningless.</p><br><p>Life, and sound and music, go on—in all kinds of weather.</p><p>But everything is worth a listen.</p></div>
<div id = "moreinfoA" class = "moreinfodivA" align="center" ><p>Ready. Choose where you'd like to begin by clicking a choice below</p><p>(you may change your perspective later)</p></div>
<div id = "buttonsinfo" class = "buttonsinfodiv" align="center">
<div class = "abutton1" ><a href="javascript:bs(0);"><img src="../Copy of window/sharedassets/darkbg.png" width="60" height="40" ></a></div>
<div class = "abutton2" ><a href="javascript:bs(1);"><img src="../Copy of window/sharedassets/textbg.png" width="60" height="40" ></a></div>
<div class = "abutton3" ><a href="javascript:bs(2);"><img src="../Copy of window/sharedassets/wordsbg.png" width="60" height="40" ></a></div>
<div class = "abutton4" ><a href="javascript:bs(3);"><img src="../Copy of window/sharedassets/daybg.png" width="60" height="40" ></a></div>
</div>
<div id = "moreinfoB" class = "moreinfodivB" align="center" ><p>Then, drag the sounds in any direction<br />Explore to find the hidden words<br />Investigate the options at the bottom of the window</p></div>
<div id="loadit" class = "loadite" >
<div id = "loadergreystrip" class = "loaderhold" style="display:none">---LOADING---</div>
<div id = "loaderwhitestrip" class =  "loadercontent" style="display:none"></div>
</div>
<div id = "moreinfo1" class = "moreinfodiv1" align="center"></div>
<div id = "moreinfo2" class = "moreinfodiv2" align="center"></div>
<div id = "moreinfo3" class = "moreinfodiv3" align="center"></div>
<div id = "probs" class = "problems" align = "center"><p>IPAD VERSION - BETA/TESTING</p></div>
<div id = "thanks" class = "thankyou" align = "center"><a href = "javascript:tc()">Thanks, License and Credits</a></div>
<div id = "thankyou" class = "thankyoudiv2" align="center" >Thanks to those who kindly helped by testing various things, and provided so much useful feedback - especially Hilary Mullaney, Miriama Young and Jonathan Dore.</br> <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">Window</span> by Katharine Norman is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.<br />This piece uses <a href = "http://www.schillmania.com/projects/soundmanager2/">SoundManager 2 API</a>. The <a href="http://en.wikipedia.org/wiki/File:John_Cage_Laugh.png">photo of John Cage</a> is considered <a href = "http://en.wikipedia.org/wiki/Wikipedia:Fair_use">fair use</a> since the subject is no longer alive so a current photograph could not be obtained.</div>
<div id = "themonth" class = "monthstitle" align="right"></div>  
<div id = "bgcover1"  class = "bgcoverplate1" ><img src="../Copy of window/sharedassets/black.jpg" width="950" height="600" > </div>   
<div id = "content1" class = "appletcontent"></div> 
<div id = "bgcover2"  class = "bgcoverplate2" ><img src="../Copy of window/sharedassets/black.jpg" width="950" height="600" > </div> 
<div id = "textlay" class = "textlayer" ></div> 
<div id = "textbag" class = "textbg" ></div>  
<div id = "shapebag" class = "shapebg" ></div> 
<script>
document.write('<div id = "bgcontent" class = "bgcontentdiv">');
document.write('<img src="nallimages85/' + imageNames[0]  +  '" width = "880" height = "600" class = "first" />');
for(i = 1; i < 84; i++) {
document.write('<img src="nallimages85/' + imageNames[i]  +  '" width = "880" height = "600"  />');
}
</script>
<div id = "bottomstrip" class = "bottome">
<div id = "moreinfobg" class = "moreinfodivbg" ></div>
for(i = 0; i < 12; i++) {
document.write('<div id = "' + months[i] + '"><a href="javascript:domonth(' + i + ')" class = "monthroll"><img src="../Copy of window/nthumbs/' + imageNames[(i*7)] + '" width="40" height="30" alt="' + months[i] + '" display: inline;"/></a></div>');
}
<div id="slider" class = "faderstrip"></div>
</div>
</body>
</html>
