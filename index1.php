<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Listening in Place - Window</title>
<!--Windows - Katharine Norman 2012 http://www.novamara.com-->
<!---PC VERSION for IE--->
<style type="text/css">

@import url("../Copy of window/css/months.css");
@import url("../Copy of window/css/flashblock.css");
@import url("../Copy of window/css/jquerycss.css"); 

#slider { margin: 10px; }
body,td,th {
	color: #CCC;
}
</style>


<script type="text/javascript" src="../Copy of window/javascripts/PxLoader.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/PxLoaderImage.js"></script> 
<script type="text/javascript" src="../Copy of window/javascripts/PxLoaderSound.js"></script> 
<script type="text/javascript" src = "../Copy of window/javascripts/jquery.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/soundManager2/script/soundmanager2.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/kinetic.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="../Copy of window/javascripts/knjquery.cycle.all.js"></script> 
<script type="text/javascript" src="../Copy of window/javascripts/soundfades.js"></script> 
<script type="text/javascript">

Array.prototype.shuffle = function() {
var s = [];
while (this.length) s.push(this.splice(Math.random() * this.length, 1)[0]);
while (s.length) this.push(s.pop());
return this;
} 


$(document).ready(function() {
	
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
	$('#moreinfo').center();
	$('#moreinfo').hide();
	$('#buttonsinfo').center();
	$('#buttonsinfo').hide();
	$('#goarrow2').center();
	$('#goarrow2').hide();

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
	
	$("#goarrow2").each(function() {
				$(this).hover(function() {
					$(this).stop().animate({ opacity: 1.0 }, 100);
				},
			   function() {
				   $(this).stop().animate({ opacity: 0.8 }, 200);
			   });
			});
	
	});


var w = 950;
var h = 580;
var w1 = 880;
var h1 = 580;

//other global declarations
var soundIds = new Array();
var months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
var monthnames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

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
var soundNameso = new Array();
var imageNames = new Array();
var xinit, yinit;
var colorchoice = new Array();
var color;
var month;
var stage;
var tobjs = new Array();
var wordobjects = new Array();
var wordslayer = new Kinetic.Layer();
var shaperlayer = new Kinetic.Layer();
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
var shaperlayer;
var d = new Date();
var oldtime;
month = d.getMonth(); 
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
var placestuff = new Array('are we in the same place, together?','dust settles visibly, in that familiar way','today’s same morning light','gathering more each time','are these clicks detritus?','is this ordinary?','this tree means home','remembering a hand against bark','sound enters, light reveals','listening makes dimension','catching the periphery','rain on the windowledge, inside');
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
var essaytexts = new Array("<p>For a year I took a photograph from my window nearly every day, often in the morning while getting up. I recorded sound as well, pointing the microphone from the window or sometimes back into the room. While I frequently stopped to look and listen, sometimes I was in a hurry and had other things to do.  In any case, listening doesn’t require contemplation, and looking can thrive in a fleeting glance.</p></br><p>As I looked and listened each day, and re-looked and re-listened to my recordings (feeling possessive, as if they were part of me), I was conscious of how familiarity arises from the accumulation of small, ordinary experiences, repeated innumerable times—this is how it feels to know a place. </p>","<p>A dog barks and a distant engine sputters into life. There is so much going on. Trying to catch ordinary things and ordinary ways of being in sound and light—it’s like attempting to catch sight of your back in a mirror. You contort your listening and looking, and the ordinary is gone before you know it, impossible to grasp. One moment a bird sings, the next a plane flies overhead. Both normally seem quite unheard.</p></br><p> Every day the same view, but in all kinds of weather. Habit gives rise to deep attachments. </p></br><p>Places are forged by people, mapping their landscapes, not by sounds or light. It almost goes without saying.</p>","<p>There is a film of John Cage making bread, Slapping and shaping the dough, and pushing it down into the pan—he describes the process to the filmmaker while he works, as if how to make bread is what we need to know. He bangs the breadpan on the work surface and dislodges the oiled dough, taking delight in an ordinary ritual. I would like to thank him for this—for making a noise with ordinary pots and pans, for patting and shaping the loaf and carefully collecting up the scraps. Nothing wasted. Everything important.</p></br><p>We stop to listen and suddenly we are here, at home in these quite unnecessary sounds—the important detritus of our daily lives. </p>","<p>This nameless tree is larger than the surrounding suburban foliage. Transplanted from a Romantic landscape, its feathery branches grasp the sky. I take a photo or two each morning, trying to get it into focus. Sometimes I return later on, greeting it as a friend. As time moves on, I see the tree in context, and grab the camera when I observe a change in the sky, or hear that the wind is up, or notice some other shift in our co-existence. </p></br><p>At first I felt this was a rather pointless, obsessive behaviour. I’d miss my train.  Lately I have become less naïve about my priorities. I have realised that looking closely at trees is quite essential.</p>","<p>On the train home, two ebullient girls in flamboyant African dress and lugging suitcases are obviously off to the airport. They are supremely loud in all respects, verbally sparring in an amazingly extrovert English that I can’t quite identify. Posing alternately in the aisle they take turns to hold up their phones and record the other ‘being interviewed’. Then they play the videos back, laughing uproariously and adding an ongoing commentary. Back and forth they travel, listening, looking and laughing, and confirming their existence to one another. </p></br><p>The train moves on. I stare out at the familiar Essex landscape while they make touchscreen connections.</p></br><p>We are all on our way.</p>","<p>In his ‘Indeterminacy: New Aspect of Form in Instrumental and Electronic Music’, Cage recited a series of stories and observations from his own experience, each related within a one-minute window. He made a performance version in which performer David Tudor played fragments of Cage’s music, starting and ending at times derived by chance procedures.</p></br><p>Tudor performed out of Cage’s earshot, in another room.</p><p></p><p> Cage’s life and work often seems to me a series of superimposed layers, each capable of being either art or unremarkable quotidian experience, or of being both.</p>","<p>This place has settled pragmatically into the landscape without concern for its surroundings. A starling cackles from the TV aerial. At dusk a long-legged hedgehog makes trips across the patio, intent on killing. The clouds blow from left to right behind the tree, going nowhere. The space is moving all the time. </p></br><p> It is an easy matter to be transfixed by the ripple of a flag in the breeze, by the rustling of leaves or the shadow across the fence. </p></br><p>The landscape as view is dissolving into details illuminated by sound, light and the movement of air.</p>","<p> Morning. The cars, the trains, the birds, the wind, the shower in the other room, his voice, the way the door closes, the rattle of the curtains pulled to greet the day. Outside, children squealing. </p></br><p>Evening. The rain subsides. The breeze hisses in the cherry tree, and darkness falls. I close the window against the cooling air. Inside, suddenly quiet.</p></br><p>The view continues out into the night.</p>","<p>In bed, listening, mapping the familiar landscape of home. A particular creak of a chair and the clink of his spoon against the bowl. Outside, the birds are vocal today, perhaps there is fog.  Water gurgles through the radiator, trickling from one place to another. On the landing a pipe creaks, somewhere under the floorboards. </p></br><p>This domestic landscape is composed entirely of those things at the edges, and yet in listening out for them one can travel vast distances. Bachelard would class them as intimate immensities—they form the soundtrack to those places where we become lost in thought and dreams.</p>","<p>It’s the kind of view to which you’d pay no attention as you slam the car door shut and haul the shopping home, or rush out in the morning to go to work. There’s no need to stop or even to close your eyes. </p></br><p>I don’t demand tranquility, there’s no time for that. </p></br><p> Everything is worth listening to. Tranquility is an absence.</p>","<p>In anticipation, I open the window on today’s familiar new view. The natural signs of being here move back into place - the tree, the children’s toys, the rooftop birds, the distant view. Up to the clouds, and back to the window ledge. Where does this place end and the view begin?</p></br><p>Sounds rush in and over. His footsteps on the stairs, descending. Downstairs, the cat cries for food. The forgotten alarm goes off again. Time moves forward (in a way).<p></br><p> Listening, I might lose my margins—the distinction between here and there, and now and then. </p>","<p>In the last year of his life Cage gave an interview, seated by the window of his New York apartment. The traffic rumbles by below, an occasional car horn or brake screech rising upwards and into the room. Cage, relaxed and quite undisturbed by the noise, talks about sound and listening. He is always smiling or near to smiling.</p></br><p>He says</p></br><p>'...I love sounds, just as they are, and I have no need for them to be anything more than what they are. I don’t want them to be psychological, I don’t want a sound to pretend to be a bucket, or that it’s the President, or that it’s in love with another sound. I just want it to be a sound.'</p></br><p>Reaching down, he chucks the chin of his well-beloved cat.</p></br>");
						   

//Cage clip on youtube - not embedding tho as it's copyright...<p><iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/2aYT1Pwp30M\" frameborder=\"0\"></iframe></p>
//essaytexts.shuffle();
//different order each time - and means I can add more texts later.
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

//stuck this in to try and force Flash for those where pan doesn't work in ogg
var chooseflash, choosehtml;
var timer;
soundManager.debugMode = false; //CAREFUL - must be false not true when page goes live!
if(browser ==1 | browser == 3 | browser == 4) { chooseflash = true; choosehtml = false; timer = 1000; } //want flash for these
else { chooseflash = false; choosehtml = true; timer = 100;}
//FOR NOW: for other guys just let it choose flash or html5 - but ogg doesn't do pan NB so force mp3
timer = 1000;
choosehtml = 1; 
chooseflash = 0;
soundManager.audioFormats.mp3.required = true; //ogg doesn't work for pan in soundmanager2
soundManager.url = '../../javascripts/soundManager2/swf/'; 
soundManager.flashVersion = 9; 
soundManager.useHighPerformance = true; // reduces delays 
soundManager.flashLoadTimeout = timer; 

// flash may timeout if not installed or when flashblock is installed 
soundManager.ontimeout(function(status) { 
    // if no flash, go with HTML5 audio 
    soundManager.useHTML5Audio = choosehtml; 
    soundManager.preferFlash = chooseflash; 
    soundManager.reboot(); 
	}); 

</script>
		
<?php
//LOAD UP THE SOUND NAMES _ they must be in a folder called sounds
echo '<script>';
 	
	//load up all the background images - they must be in a folder called allimages and must be jpgs (could include png but don't have any at present)
$directory="nallimages85";
   // create a handler to the directory
    $dirhandler = opendir($directory);
    // read all the files from directory
    $nofiles=0;
    while ($file = readdir($dirhandler)) {
    // if $file isn't this directory or its parent 
        //add to the $files array
        if ($file != '.' && $file != '..' )
        {
			$pos = strpos($file, "jpg");
		if ($pos) {
						//work	echo 'hello';
			$imgNames[$nofiles]=$file;  
			echo 'imageNames[' . $nofiles .'] = \'' . $file . '\'; ';  //don't delete this row - it is used
			$nofiles++;
		}
	   }   
    }
    //close the handler
    closedir($dirhandler);
	sort($imgNames); //so we get the right images
	
$directory="lrallsounds";
   // create a handler to the directory
    $dirhandler = opendir($directory);
    // read all the files from directory
    $nofiles=0;
    while ($file = readdir($dirhandler)) {
    // if $file isn't this directory or its parent 
        //add to the $files array
        if ($file != '.' && $file != '..' )
        {
			$pos = strpos($file, "mp3");
		if ($pos) {
			$file2 = str_replace('.mp3', '', $file);
			//print_r($file2); //stripped of extension ready as soundNames id - now have to get it into the javascript array.

			//$imgNames[$nofiles]=$file;  
			echo 'soundNameso[' . $nofiles .'] = \'' . $file2 . '\'; ';  //don't delete this row - it is used
			$nofiles++;
		}
	   }   
    }
	closedir($dirhandler);
	echo '</script>';
?>
    
<script>
imageNames.sort();
for (i = 0; i < soundNameso.length; i++ ){
	if(soundNameso[i].indexOf('jan-') == 0) 
		jansound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('feb-') == 0) 
		febsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('mar-') == 0)
		marsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('apr-') == 0)
		aprsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('may-') == 0)
		maysound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('jun-') == 0)
		junsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('jul-') == 0)
		julsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('aug-') == 0)
		augsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('sep-') == 0)
		sepsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('oct-') == 0)
		octsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('nov-') == 0)
		novsound.push(soundNameso[i]);
	else if(soundNameso[i].indexOf('dec-') == 0)
		decsound.push(soundNameso[i]);
}

soundManager.onready(function() { 	
for(i = 0; i < 12; i++) {
	//console.log(soundNames[i]);
	soundNames[i].shuffle();
}

 function buttonsdone() {
	ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();		
	stage.add(ilay);
	stage.add(wordslayer);
	stage.add(shaperlayer);
	tobjs = drawmonthsbymn();

	ch(month, tobjs, ilay, stage);
		 //will wantto make this setting by button next
		$('#moreinfobg').fadeOut(1200);
		$('#coverbg').fadeOut(100);
		$('#moreinfo').fadeOut(1200);
		$('#buttonsinfo').fadeOut(1200);
		setTimeout(function() {$("#moreinfo").remove(); $("#buttonsinfo").remove(); $("#moreinfobg").remove();}, 1200);
  		$('#author1').fadeOut(100);
 		$('#author2').fadeOut(100);
		setTimeout(function() {$('#author1').remove();$('#author2').remove(); $('#coverbg').remove;}, 120);
}

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
	
var loader = new PxLoader(); 
var $themonthtitle;
var alph = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');

for(i=0 ; i < 12; i++) { 
  	for(j = 0; j < 7; j++) {
	  soundIds[(i*7)+j] = alph[i] + soundNames[i][j]; //add letter so alphabetize poss for sorting use - for colour code and selection
	  //each month sub array previously been shuffled now just pick 7 from each for this run and set up
	 // console.log(soundIds[(i*7)+j]);
	  //forcing mp3 at present as I want pan
	  url = 'http://www.novamara.com/windows/lrallsounds/' + soundNames[i][j] + '.mp3';
	  //if(soundManager.canPlayURL(url)) {
	  //	url = url;
	  //}
	  //else {
	  //    url = soundNames[i]+'.ogg';
	  //}
	  loader.addSound(soundIds[(i*7)+j], url);  
	  }
}

soundIds.sort(); //sort alphabetically so colour assigning will work

loader.addProgressListener(function(e) { 
	percentage = Math.floor(100*(e.completedCount/e.totalCount));
		$('#loaderwhitestrip').css({ 'width' : percentage*2 }); //width up to 200px 
		if (e.completedCount == e.totalCount) {
		  
		$('#goarrow2').fadeIn(500);
		$("#loaderwhitestrip").fadeTo(500,0); //white bar
 		$("#loadergreystrip").fadeTo(100,0); //grey bar
		setTimeout(function() {$("#loadergreystrip").remove();$("#loaderwhitestrip").remove();}, 500);		
	  

	stage = new Kinetic.Stage({
          container: "content1",
          width: w,
          height: h
        }); 
		stage.start();

	stoppit = 1;
			}
		}); 

setTimeout(function() {loader.start();}, 2000); //delay loader until page visible
}); //end of SM on ready



function everyonecenter() {
	$('#content1').center();
	$('#bgcover1').center();
	$('#bgcover2').center();
	$('#textlay').center();
	$('#textbag').center();
	$('#shapebag').center();
	$('#bgcontent').center();
}

function bs(i) {
		$("#thankyou").fadeOut(500);
		$("#problems").fadeOut(500);
		$("#thanks").fadeOut(500);
		$("#probs").fadeOut(500);
	setTimeout(function() {$("#thankyou").remove(); $("#problems").remove();$("#thanks").remove(); $("#probs").remove();}, 600);
	
		$('#moreinfobg').fadeOut(1200);
		$('#coverbg').fadeOut(100);
		$('#moreinfo').fadeOut(1200);
		$('#buttonsinfo').fadeOut(1200);
		setTimeout(function() {$("#moreinfo").remove(); $("#buttonsinfo").remove(); $("#moreinfobg").remove();}, 1200);
  		$('#author1').fadeOut(100);
 		$('#author2').fadeOut(100);
		setTimeout(function() {$('#author1').remove();$('#author2').remove(); $('#coverbg').remove;}, 120);
		
	var ival;
	ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();		
	stage.add(ilay);
	stage.add(wordslayer);
	stage.add(shaperlayer);
	tobjs = drawmonthsbymn();

	ch(month, tobjs, ilay, stage);

		if (i == 0) {
		  textinit = 0;
		  shapeinit = 0;
		  ival = 10;
			}
		if (i == 1) {
		  textinit = 1;
		  shapeinit = 0;
		  ival = 35;
		  $("#textlay").fadeTo(1200,1);	
		  $("#textbag").fadeTo(1000,0.2);
				}
		if (i == 2) {
			ival = 60;
		  shapeinit = 1;
		  textinit = 0;
		  $("#shapebag").fadeTo(1200,0.2);	
		  fadeuplayer(shaperlayer, 0, 0.5);
		}
		if (i == 3) {
		  textinit = 0;
		  shapeinit = 0;
		  ival = 85;
		}
	
	$( "#slider" ).slider( "option", "value", ival );
	var ialphaval = ((ival-100)*-1)/100; 
	$('#bgcover2').css({ 'opacity' : ialphaval }); 
}

	

function tc() {
	if(tclik == 0) {
		$( "#thankyou" ).fadeIn(500);
   		//$( "#problems" ).hide();
   		tclik = 1;
	}
	else {
		$( "#thankyou" ).fadeOut(500);
   		tclik = 0;
	}	
}

function probsclik() {
	if(pclik == 0){
		$( "#problems" ).fadeIn(500);
		$( "#thankyou" ).hide();
		pclik = 1;
	}
	else {
		$( "#problems" ).fadeOut(500);
		pclik = 0;
	}
}

function notc() {
		$( "#thankyou" ).fadeOut(500);
}
function noprobsclik() {
	$( "#problems" ).fadeOut(500);
	
}
//when click on first arrow page 1 - cage pic 
function nxt() {
	$("#goarrow").fadeOut(500);
	cagegone = 1;
	$("#cover").fadeOut(500);
	setTimeout(function() {$('#goarrow').remove();$('#cover').remove();}, 700);
	$("#loadergreystrip").fadeIn(10); //grey bar
	$("#loaderwhitestrip").fadeIn(10); //whitebar
	
	moreinfofaders(0);
	setit = 1;
	
}

//fading in out of text that keeps things going during load bar action
function moreinfofaders(i) {
  var c;
  var m,s,l;
  m = 600;
  s = 300;
  l = 900;
  var d = new Array(m,s,m,s,m,m,l,m,m,l,m,l,m,s,m,l,m,l);
  var fade1wait, fade2wait, fade3wait;
  
  fade1wait = 2200;
  fade2wait = 3800;
  fade3wait = 5200;

  if(i < moreinfotexts.length && stoppit != 1) {
	  if(i==0) {
	  $('#moreinfo1').fadeIn(500);
	  $("#moreinfo1").text(moreinfotexts[i]);
	  $('#moreinfo1').center();
  setTimeout(function() {$('#moreinfo1').fadeOut(1300);}, fade1wait + d[i]);
	  }
	  else {
	  $('#moreinfo1').fadeIn(3000);
	  $("#moreinfo1").text(moreinfotexts[i]);
	  $('#moreinfo1').center();
  setTimeout(function() {$('#moreinfo1').fadeOut(3000);}, fade1wait + d[i]);
	  }
  
  setTimeout(function() {
	  $('#moreinfo2').fadeIn(3000);
	  $("#moreinfo2").text(moreinfotexts[i+1]);
	  $('#moreinfo2').center();
	setTimeout(function() {$('#moreinfo2').fadeOut(3000);}, fade2wait + d[i+1]);
					  }, fade1wait + d[i]);
  setTimeout(function() {  	
	  $('#moreinfo3').fadeIn(3000);
	  $("#moreinfo3").text(moreinfotexts[i+2]);
	  $('#moreinfo3').center();
	  if(i + 2 == moreinfotexts.length) c = 8000;
	  else c = 3000;
	  setTimeout(function() {$('#moreinfo3').fadeOut(c);}, fade3wait + d[i+2]);}, fade1wait + d[i]+fade2wait + d[i+1]);
	  setTimeout(function() { i = i + 3; moreinfofaders(i);}, 12000);
	  }
	 else return false;
 }
 
 //when click on second arrow - after loading done goarrow2 click
 function son() {
  $('#moreinfo').fadeIn(500);
  $('#buttonsinfo').fadeIn(100);
  $('#goarrow2').fadeOut(500);
 setTimeout(function() { $('#goarrow2').remove();}, 500);		
  $("#appwindow").show();
  //$('#bgcontent').center();
  $("#bgcontent").show();
  $("#moreinfo1").fadeOut(50);
  $("#moreinfo2").fadeOut(50);
  $("#moreinfo2").fadeOut(50);
  setTimeout( function () {$('#moreinfo1').remove(); $('#moreinfo2').remove(); $('#moreinfo3').remove(); }, 80);
}


			 //
//	
var oldsounds = new Array();
//prep all sounds and handles at init and then select from them later
function drawmonthsbymn() {
	var spacer;
		for (i = 0; i < 84; i ++ ) {
			if(i % 7 == 0) k = 0;
			else k++;
			spacer = Math.floor((w*0.9)/7)*k;
			tobjs[i] = drawImage(soundIds[i], w, h, spacer, stage);
			}
	return (tobjs);
}
//the objects is drawimage - return([moveImg, ilay, thissound]); 

//draw the small images for dragging sounds	
function drawImage(thissound, w, h, spacer, stage){
    var x, y;
    var moveImg;
	var drag;
	var pan, volume;
	var yval, xval;
	var hlimit, wlimit;
	var sound;
	var radius = 12;
	
   hlimit = h * 0.9;
   wlimit = w * 0.9;
   xinit = 20+spacer+Math.floor(40*Math.random());  //spread 'em out at init.
	
	yinit = Math.floor( (h-100)+ Math.random()*80); //settles them - will make a sound to start but not too loud
   if(xinit < radius) xinit = radius;
   
  //make a graphic polygon 
  moveImg = new Kinetic.RegularPolygon({
          x: xinit,
          y: yinit,
          sides: 7,
          radius: radius,
          fill: color,
          stroke: "grey",
          strokeWidth: 2,
		  alpha: 0,
		  dragBounds: {
	 		top: radius,
	 		bottom: h-radius,
	 		left: radius,
	 		right:w-radius
		}
 });
moveImg.draggable(true);
	//SOUND
	//initial settings for each 
	pan = Math.floor((xinit-w/2)/(w/2)*0.01);
	yval = yinit;

	soundManager.setPan(thissound, pan);
	if(yval > h-(radius*2) ) 
	{
		volume = 0;
		moveImg.setFill('#666062');
		ilay.draw();
	}
	else
	{
 //need scale and to invert so loud is top - y = 0
		//volume = lineartoexp(Math.floor(((yval-h)*-1) / (h/100))); 
		volume = Math.floor(((yval-h)*-1) / (h/100)); //maybelinear to exponential later 
		moveImg.setFill(color);
		moveImg.setStroke('grey');
	}
//nb won't work on ipad or mobile - pan and vol not funct

//MOUSE EVENTS
	moveImg.on("mouseup", function(){
		document.body.style.cursor = "default";
		$('#mycursor').hide();
		drag = false;
	    this.setStroke('grey');	
		ilay.draw();
	});
	moveImg.on("mousedown",  function(){
		document.body.style.cursor = "url('./sharedassets/greycursors.png'), pointer";
		drag = true;
		this.setStroke('white');
	   	ilay.draw();
		//console.log(thissound);
	});
	moveImg.on("mouseover",  function(){
		document.body.style.cursor = "pointer";
	    drag = false;
	    fademeup(moveImg, ilay, moveImg.getAlpha(), 1, 0.2);
		this.setStroke('white');
		quiver(moveImg, ilay, 1,7);
		ilay.draw();
		});
	moveImg.on("mouseout", function(){
		document.body.style.cursor = "default";
		drag = false;
		$('#mycursor').hide();
		this.setStroke('grey');
		fademeout(moveImg, ilay, moveImg.getAlpha(), 0.6, 0.1, 0);
		ilay.draw();
		});
	moveImg.on("dragmove", function(){
		xval = moveImg.getX();
		yval = moveImg.getY(); 
    	if (drag == true) {
		document.body.style.cursor = "url('./sharedassets/greycursors.png'), pointer";

  //SOUND
	  	pan = Math.floor((xval-(w/2))/(w/2*0.01)); 
	  	soundManager.setPan(thissound, pan);
		 //volume = lineartoexp(Math.floor((((yval*100)/h)-100)*-1));      
     volume = Math.floor(((yval-h)*-1) / (h/100)); //maybe put back linear to exponential later
	 soundManager.setVolume(thissound, volume); 
	 ilay.draw();
	 }
	});	

	return([moveImg, ilay, thissound]); 

} //end drawmage function.


function drawWords(txt1, w1, h1, x1, y1, stage, color) {
  var wordobj1;
  var yval, xval;
  var shaper;
  var clickme = 0;

  shaper = new Kinetic.RegularPolygon({
		x: x1+5,
		y: y1,
		sides: 7,
		radius: 20,
		fill: "grey",
		alpha: 0.6
		});

  wordobj1 = new Kinetic.Text({
		x: x1,
		y: y1,
		text: txt1,
		fontSize: 11,
		fontFamily: "Verdana",
		fontStyle: "italic",
		textFill: color,
		align: "middle",
		verticalAlign: "middle",
		alpha: 0
	  });
    
  wordslayer.add(wordobj1);
  shaperlayer.add(shaper);
  shaperlayer.setAlpha(0); 
  stage.add(shaperlayer);
  stage.add(wordslayer);

  shaper.on("mouseup", function(){
	if(shaperlayer.getAlpha() > 0 && clickme == 0) { //only if shaper layer is 'activated'
	setTimeout (function() {
	  fademeup(wordobj1, wordslayer, 0., 0.9, 1);
	  }, 60);
	  document.body.style.cursor = "pointer";		
	  wordslayer.draw();
	  clickme = 1;
	}
  });
  shaper.on("mouseover", function(){
  	if(shaperlayer.getAlpha() > 0 ) { //only if shaper layer is 'activated'
	  document.body.style.cursor = "pointer";		
 		if(clickme == 0) { //only if shaper layer is 'activated'
  			setTimeout (function() {
				fademeup(wordobj1, wordslayer, 0., 0.9, 1);
			}, 60);
	wordslayer.draw();
		  setTimeout( function() {fademeout(wordobj1, wordslayer, wordobj1.getAlpha(), 0, 2.5,0); wordslayer.draw();}, 4000); //just in case mouseout gets missed

			clickme = 1;
 		 }
	  fademeup(shaper, shaperlayer, shaper.getAlpha(), 1, 0.2);
	  }
  });
  shaper.on("mouseout", function(){
	  if(shaperlayer.getAlpha() > 0 | wordobj1.getAlpha() > 0) { //catch stragglers too
		fademeout(shaper, shaperlayer, shaper.getAlpha(), 0.6, 0.1, 0);
		fademeout(wordobj1, wordslayer, wordobj1.getAlpha(), 0, 2.5,0);
		document.body.style.cursor = "default";
		clickme = 0;
	  }
  });
  return([wordobj1, shaper, wordslayer]);
}
	  
//convert linear val to exp val in range 0-100 - use for volume value
//http://jsbin.com/ezema via stackoverflow 
function lineartoexp(val) {
	var nval;
	nval = Math.round(val < 76 ? val / 7.5 : 10 + ((val - 75)*(90/25)));
	return(nval);
}

function changepos(obj, layer, quiver) {
	  var quiverx, quivery;
	  var xval, yval;
	  var q, l, k, u;
		q = Math.random();
		l = Math.random();
		if (q < 0.5) k = 1;
		else k = -1;
		if (l < 0.5) u = 1;
		else u = -1;
			
		quiverx = quiver*k;	
		quivery = quiver*u;
		xval = obj.getX()+quiverx;
		yval = obj.getY()+quivery;
		if (xval < 10 ) xval = 10 +(Math.random()*4);
		if (xval > w-10) xval = w- (10+(Math.random()*4));
		if (yval < 10) yval = 10+(Math.random()*4)
		if (yval > h-10) yval = h - 10;
		obj.setX(xval);
		obj.setY(yval);  
    	layer.draw();
	}	

//DRAWWORDS
function drawwordsmonth(month, init) {
	var fill = colorchoice[month];
	var range = 83; 
	var rangel=0;
	var x1, y1;
	var slayeralp;
	var wlayeralp;
	var salp;
	
	if (init == 0) {  //ie first time only draw the words and shaper 
	  for (j = 0; j < 7; j++) {
		rangel = range*j;
		x1 = 30+Math.floor((w-(wordwidth))*Math.random());
		if(x1 < 30) x1 = 30;
		if(x1 > w-wordwidth-20) x1 = wordwidth-20;
		y1 = rangel + Math.floor(Math.random()*40);
		if(y1 < 30) y1 = 30; 
		if(y1 > h-30) y1 = h - 30; 
		wordobjects[j] = drawWords(alltexts[j][month], w1, h1, x1, y1, stage, fill);
			}
	} 
	else {
			//salp = shaperlayer.getAlpha();
			fadeoutlayer(shaperlayer);
			for (j = 0; j < 7; j++) {
				fademeout(wordobjects[j][0],wordobjects[j][2], wordobjects[j][0].getAlpha(), 0, .1);
				//(thistext, layer, startalpha, endalpha, duration)
			}
		var fad = setInterval(function() {newstuff(month, fad, fill, wordobjects, 0.5);}, 1100);
		}
		return(wordobjects);
}

function newstuff(month, fadd, fill, wordthings, salp) {
	var x1, y1;
	var range = 83; 
	//to spread em out in y height 	
	var rangel=0;
	var startalpha = 0;   
	
	for (j = 0; j < 7; j++) {
		rangel = range*j;
		x1 = 30+Math.floor((w-(wordwidth))*Math.random());
		if(x1 < 30) x1 = 30;
		if(x1 > w-wordwidth-20) x1 = wordwidth-20;
		y1 = rangel + Math.floor(Math.random()*40);
		if(y1 < 30) y1 = 30; 
		if(y1 > h-30) y1 = h - 30; 
		wordthings[j][1].setX(x1);
		wordthings[j][1].setY(y1);
		wordthings[j][0].setAlpha(startalpha);
		wordthings[j][0].setText(alltexts[j][month]);
		wordthings[j][0].setTextFill(fill);
		wordthings[j][0].setX(x1+2);
		wordthings[j][0].setY(y1);
	}
	clearInterval(fadd);
	if(shapeinit == 1) {
	fadeuplayer(shaperlayer, 0, salp);
	wordslayer.draw();
	}
}

var oldobjects = new Array();

///////ch - main function when selecting month///////
function ch(month, tobjs, ilay, stage) {
	var waiter1;
	var waiter2;
	var nowd = new Date();
	var nowtime = nowd.getTime();

	color = colorchoice[month];
	if (month < 11) nextmonth = month + 1;
	else nextmonth = 0;
	var j = month*7;

  if (textinit == 1) {
  $("#textlay").fadeTo(400,0);	
  setTimeout(function() {document.getElementById("textlay").innerHTML = essaytexts[month];$("#textlay").fadeTo(1200,1);	},400);
  }
  else {
	 // $("#textlay").hide(); //just in case
	  document.getElementById("textlay").innerHTML = essaytexts[month];
  }
  
 // console.log("shapeinit.." + shapeinit);
  
  drawwordsmonth(month, initmonth);	

	k = 0;
	if(initmonth == 0) {	
		for(i = 0; i < 84; i++) {
		if(i >=j && i < j+7) {
		tobjs[i][0].setFill(color);
		fademeup(tobjs[i][0], tobjs[i][1], 0, 0.6, 1);
		ilay.add(tobjs[i][0]);
		ilay.draw();
		loopSound(soundIds[i], tobjs[i][0], 1);
		oldobjects[k] = tobjs[i];
		k++;
		}
	}
	
	  $("#bgcover1").fadeTo(2000, 0); //was 6
	  $("#themonth").text(monthnames[month]);
	  $("#themonth").css('color', color);
	  $("#themonth").fadeTo(5800,1);
	  initmonth = 1;
	  $("#bgcontent").cycle({
		fx: 'fade', 
		speedIn: 18000,
		speedOut: 18000,
		startingSlide: month*7,
		before: function(curElement, nextElement, options, forwardFlag) {
		if (options.currSlide == (month*7)+5) 
			setTimeout(function(){$("#bgcontent").cycle(month*7); }, 18000);
		}
		});
	  oldtime = nowtime;
	  }
	else {
			if(nowtime-oldtime > 500) { //to prevent v fast click change - may not be necessary tho'
			 oldtime = nowtime;
		for(k = 0; k < 7; k++) {
			fademeout(oldobjects[k][0], ilay, oldobjects[k][0].getAlpha(), 0, 0.8, 1) ;
			fadeOutsound(oldobjects[k][2],-10, 0);
		}
	k = 0;
	for(i = 0; i < 84; i++) {
		if(i >=j && i < j+7) {
		oldobjects[k] = tobjs[i];
		k++;
		tobjs[i][0].setFill(color);
		fademeup(tobjs[i][0], tobjs[i][1], 0, 0.6, 1);
		ilay.add(tobjs[i][0]);
		ilay.draw();
		loopSound(soundIds[i], tobjs[i][0], 1);
		}
	}

		  $("#bgcover1").fadeTo(1000, 1);
		  $("#themonth").fadeTo(1200,0);
		  waiter1 = setInterval(function() {$("#themonth").text(monthnames[month]); $("#themonth").css('color', color); $("#themonth").fadeTo(1500,1); clearInterval(waiter1);}, 1200);
		  waiter2 = setInterval(function() { 
		  $("#bgcover1").fadeTo(1000, 0 ); //was 8000
		  $("#bgcontent").cycle('destroy'); $("#bgcontent").cycle({
		  fx:    'fade', 
		  speedIn: 18000,
		  speedOut: 18000,
		  startingSlide: month*7,
		  before: function(curElement, nextElement, options, forwardFlag) {
		  if (options.currSlide == (month*7)+5) 
			setTimeout(function(){$("#bgcontent").cycle(month*7); }, 18000);
		  }
		  }); clearInterval(waiter2);},1000);
		  }
	// else console.log("clicked too quick");
	}
}
						
</script>
</head>
<body onmousedown="return false;">
<div id = "coverbg" class = "cageclassbg"></div>
<div id = "author1" class = "authortitle1" align="center"><p>Window</p></div>
<div id = "author2" class = "authortitle2" align="center"><p><a href = "http://www.novamara.com">Katharine Norman</a></p><p>(2012)</p></div>
<div id = "goarrow" class = "go" align="center" ><a href="javascript:nxt()">></a></p></div>
<div id = "cover" class = "cageclass" align="center"><p>In memory of</p>
<p><a href = "http://exhibitions.nypl.org/johncage/" target = "blank"><div class = "mrcage">John Cage</div></a></p>
<p>(September 5, 1912 – August 12, 1992)</p></br><p><img src = "../Copy of window/sharedassets/John_Cage_Laugh.png" width="200" height="200"/></p></br><p>Cage's influential life and work continue to inspire so many people, and in so many different ways. For me, he proves that telling personal stories about everyday life can communicate ideas, that the most ordinary things have value, and that sounds are at once useful and inherently meaningless.</p><br><p>Life, and sound and music, go on - in all kinds of weather.</p><p>But everything is worth a listen.</p></div>
<div id = "goarrow2" class = "go2" align="center" ><a href="javascript:son()">></a></p></div>
<div id = "moreinfo" class = "moreinfodiv" align="center" >
Drag the sounds in any direction<br />
Explore to find the hidden words<br />Investigate the options at the bottom of the window</p></br><p>Choose where you'd like to begin by clicking a choice below</p><p>(you may change your perspective later)</p></br><p>
<div id = "buttonsinfo" class = "buttonsinfodiv">
<div class = "abutton1"><a href="javascript:bs(0);"><img src="../Copy of window/sharedassets/darkbg.png" width="60" height="40" ></a></div>
<div class = "abutton2"><a href="javascript:bs(1);"><img src="../Copy of window/sharedassets/textbg.png" width="60" height="40" ></a></div>
<div class = "abutton3"><a href="javascript:bs(2);"><img src="../Copy of window/sharedassets/wordsbg.png" width="60" height="40" ></a></div>
<div class = "abutton4"><a href="javascript:bs(3);"><img src="../Copy of window/sharedassets/daybg.png" width="60" height="40" ></a></div>
</div></div>
<div id="loadit" class = "loadite" >
<div id = "loadergreystrip" class = "loaderhold" style="display:none">---LOADING---</div>
<div id = "loaderwhitestrip" class =  "loadercontent" style="display:none"></div>
</div>
<div id = "moreinfo1" class = "moreinfodiv1" align="center"></div>
<div id = "moreinfo2" class = "moreinfodiv2" align="center"></div>
<div id = "moreinfo3" class = "moreinfodiv3" align="center"></div>
<div id = "probs" class = "problems" align = "center">Best on updated version of Chrome or Firefox.</a></div>
<div id = "thanks" class = "thankyou" align = "center"><a href = "javascript:tc()">Thanks and Credits</a></div>
<div id = "thankyou" class = "thankyoudiv" align="center" >Thanks to those who kindly helped by testing various things and provided so much useful feedback - especially Hilary Mullaney, Miriama Young and Jonathan Dore.</a> This piece uses <a href = "http://www.schillmania.com/projects/soundmanager2/">SoundManager 2 API</a>. The <a href="http://en.wikipedia.org/wiki/File:John_Cage_Laugh.png">photo of John Cage</a> is considered <a href = "http://en.wikipedia.org/wiki/Wikipedia:Fair_use">fair use</a> under the rationale that the subject is no longer alive so a current photograph could not be obtained.</div>

<div id = "themonth" class = "monthstitle" align="right"></div>  
<div id = "bgcover1"  class = "bgcoverplate1" ><img src="../Copy of window/sharedassets/black.jpg" width="950" height="600" > </div>   
<div id = "content1" class = "appletcontent" > </div> 
<div id = "bgcover2"  class = "bgcoverplate2" ><img src="../Copy of window/sharedassets/black.jpg" width="950" height="600" > </div> 
<div id = "textlay" class = "textlayer" ></div> 
<div id = "textbag" class = "textbg" ></div>  
<div id = "shapebag" class = "shapebg" ></div> 
<div id = "bgcontent" class = "bgcontentdiv">
<?
sort($imgNames);
for($i = 0; $i < 84; $i++) {
if($i == 0)
echo '<img src="nallimages85/' . $imgNames[$i] . '"' .' width = \'880\' height = \'600\' class = "first" />';
else
echo '<img src="nallimages85/' . $imgNames[$i] . '"' .' width = \'880\' height = \'600\' />';
}
?>
</div>
<div id = "bottomstrip" class = "bottome">
<div id = "moreinfobg" class = "moreinfodivbg" ></div>
<script>
for(i = 0; i < 12; i++) {
document.write('<div id = "' + months[i] + '"><a href="javascript:ch(' + i + ',tobjs, ilay, stage)" class = "monthroll"><img src="nthumbs/' + imageNames[(i*7)] + '" width="40" height="30" alt="' + months[i] + '" display: inline;"></a></div>');
}
</script>

<div id="slider" class = "faderstrip"></div>
</div>
</body>
</html>

