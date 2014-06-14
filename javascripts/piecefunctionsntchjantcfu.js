 
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
function init() {
 console.log("doing init");
 

  	for(j = 0; j < 7; j++) {
	 	  soundNamer[j] = soundNames[month][j]; //if one month j rather than k
		  }

  bufferLoader = new BufferLoader(
    context,
  soundNamer,
    finishedLoading
    );
  bufferLoader.load();
  }
//FUNCTIONS
//when click on first arrow page 1 - cage pic 
function nxt() {
	$("#goarrow").fadeOut(500);
	$("#cover").fadeOut(500);
	setTimeout(function() {$('#goarrow').remove();$('#cover').remove();}, 700);
	moreinfofaders(0);
}

function nxtios() {
	setTimeout(function() { $("body").fadeOut(500, redirectPage);  }, 500);
}

   function redirectPage() {
window.location = "http://www.novamara.com/window/choosemonths.html";
    }
	
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
  setTimeout( function() {stoppit = 1;}, 50);
  $("#moreinfo1").fadeOut(150);
  $("#moreinfo2").fadeOut(250);
  $("#moreinfo2").fadeOut(350);
  setTimeout( function () {$('#moreinfo1').remove(); $('#moreinfo2').remove(); $('#moreinfo3').remove(); }, 480);

	$("#thankyou").fadeOut(500);
	$("#problems").fadeOut(500);
	$("#thanks").fadeOut(500);
	$("#probs").fadeOut(500);
setTimeout(function() {$("#thankyou").remove(); $("#problems").remove();$("#thanks").remove(); $("#probs").remove();}, 600);

	$('#moreinfobg').fadeOut(1200);
	$('#coverbg').fadeOut(100);
	$('#moreinfoA').fadeOut(1200);
	$('#moreinfoB').fadeOut(1200);
	$('#buttonsinfo').fadeOut(1200);
	setTimeout(function() {$("#moreinfoA").remove(); $("#moreinfoB").remove();$("#buttonsinfo").remove(); $("#moreinfobg").remove();}, 1200);
	$('#author1').fadeOut(100);
	$('#author2').fadeOut(100);
	setTimeout(function() {$('#author1').remove();$('#author2').remove(); $('#coverbg').remove;}, 120);
		
	var ival;

	/*ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();		
*/	stage.add(ilay);
	stage.add(wordslayer);
	stage.add(shaperlayer);
	tobjs = drawmonthsbymn();



	ch(month, tobjs);

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


function bs1(month1) {
	var ival;

	/*ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();		
	stage.add(ilay);
	stage.add(wordslayer);
	stage.add(shaperlayer);*/
	tobjs = drawmonthsbymn();


i = 3;
	ch(month1, tobjs);

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



function bsios() {
	
			stage = new Kinetic.Stage({
        	  container: "content1",
         	  width: w,
          	  height: h
        	}); 
		//	stage.start();
	ilay = new Kinetic.Layer();
	wordslayer = new Kinetic.Layer();
	shaperlayer = new Kinetic.Layer();	
	stage.add(ilay);
	stage.add(wordslayer);
	stage.add(shaperlayer);
	
	tobjs = drawmonthsbymn();
//var i = Math.floor(Math.random(4));
var ival;
var i = 3;
var month1 = month;
	ch(month1, tobjs);

  
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


//fading in out of text that keeps things going during load bar action
function moreinfofaders(i) {
  var c;
  var m,s,l;
  m = 600;
  s = 300;
  l = 900;
  var d = new Array(m,s,m,s,m,m,l,m,m,l,m,l,m,s,m,l,m,l);
  var fade1wait, fade2wait, fade3wait;
  
  fade1wait = 3000+800;
  fade2wait = 3800+2500;
  fade3wait = 5200+2500;
  
  $('#moreinfo1').center();
  $('#moreinfo2').center();
  $('#moreinfo3').center();

  if(i < moreinfotexts.length && stoppit != 1) {
	  if(i==0) {
	  $('#moreinfo1').fadeIn(500);
	  $("#moreinfo1").text(moreinfotexts[i]);
  setTimeout(function() {$('#moreinfo1').fadeOut(500);}, fade1wait + d[i]);
	  }
	  else {
	  $('#moreinfo1').fadeIn(2500);
	  $("#moreinfo1").text(moreinfotexts[i]);
  setTimeout(function() {$('#moreinfo1').fadeOut(500);}, fade1wait + d[i]);
	  }
  
  setTimeout(function() {
	  $('#moreinfo2').fadeIn(2500);
	  $("#moreinfo2").text(moreinfotexts[i+1]);
	setTimeout(function() {$('#moreinfo2').fadeOut(500);}, fade2wait + d[i+1]);
					  }, fade1wait + d[i]);
  setTimeout(function() {  	
	  $('#moreinfo3').fadeIn(2500);
	  $("#moreinfo3").text(moreinfotexts[i+2]);
	  if(i + 2 == moreinfotexts.length) c = 8000;
	  else c = 800;
	  setTimeout(function() {$('#moreinfo3').fadeOut(c);}, fade3wait + d[i+2]);}, fade1wait + d[i]+fade2wait + d[i+1]);
	  setTimeout(function() { i = i + 3; moreinfofaders(i);}, 12000);
	  }
	 else return false;
 }
 
//when sounds have loaded move to buttons and instructions
 function son() {		
  $('#moreinfoA').fadeIn(1500);
  $('#moreinfoB').fadeIn(1500);
  $('#buttonsinfo').fadeIn(1500);
  $("#appwindow").show();
  $("#bgcontent").show();
}

 function sonios() {		
  $("#appwindow").show();
  $("#bgcontent").show();
  
  bsios();
}

function drawmonthsbymn() {
	var spacer;
		for (i = 0; i < soundNamer.length; i ++ ) {
			if(i % 7 == 0) k = 0;
			else k++;
			spacer = Math.floor((w*0.9)/7)*k;
			tobjs[i] = drawImage(source[i], w, h, spacer, stage);
			console.log(source[i]);
			}
	return (tobjs);
}
//the objects is drawimage - return([moveImg, ilay, thissound]); 
//draw the polygons for dragging sounds	and add vol pan
//thissound is soundsource now 
function drawImage(thissound, w, h, spacer, stage){
    var x, y;
    var moveImg;
	var drag;
	var pan, volume;
	var yval, xval;
	var hlimit, wlimit;
	var sound;
	var radius = 25;  //bigger for tablet
	
   hlimit = h * 0.9;
   wlimit = w * 0.9;
   xinit = radius+spacer+Math.floor(40*Math.random());  //spread 'em out at init.
   yinit = Math.floor( (h-100)+ Math.random()*(100-radius)); //settles them - will make a sound to start but not too loud
   if(xinit < radius) xinit = radius;
   
  //make a graphic polygon 
  moveImg = new Kinetic.RegularPolygon({
          x: xinit,
          y: yinit,
          sides: 7,
          radius: radius,
          fill: color,
          stroke: "grey",
          strokeWidth: 3,
		  alpha: 0,
		  dragBounds: {
	 		top: radius,
	 		bottom: h-radius,
	 		left: radius,
	 		right:w-radius
		}
 });
moveImg.draggable(true);
var quiv = setInterval(function() {quiver(moveImg, ilay, 1,7);;}, (Math.random()*2000) + 3000);
	//SOUND
		//pan = Math.floor((xinit-w/2)/(w/2)*0.01);
		yval = yinit;
	
	if(yval > h-(radius*2) ) 
	{
		volume = 0;
		moveImg.setFill('#666062');
		ilay.draw();
	}
	else
	{
 //need scale and to invert so loud is top - y = 0
		volume = lineartoexp(Math.floor(((yval-h)*-1) / (h/100))) / 100; 
	//scaled for web audio
	//	volume = Math.floor(((yval-h)*-1) / (h/100) /100 s); //maybelinear to exponential later 
		moveImg.setFill(color);
		moveImg.setStroke('grey');
		panx = xinit/w;
		console.log("panx...init" + panx);
	   thissound.gainNode.gain.value = volume;
	   thissound.gainNode1.gain.value = volume * (1-panx);
	   thissound.gainNode2.gain.value = volume * (panx);
console.log("init vol..." + volume);
		}


//MOUSE EVENTS
	moveImg.on("mousedown",  function(){
		//e.stopPropagation();
	    fademeup(moveImg, ilay, moveImg.getAlpha(), 1, 0.2);
		this.setStroke('green');
		quiver(moveImg, ilay, 1,7);
		ilay.draw();
	//	console.log("touch...");
		
		});
	moveImg.on("mouseup", function(){
			drag = false;
		//e.stopPropagation();
		$('#mycursor').hide();
		this.setStroke('grey');
		fademeout(moveImg, ilay, moveImg.getAlpha(), 0.6, 0.1, 0);
		ilay.draw();
	//	console.log("end touch...");
		});

	moveImg.on("dragmove", function(){
		drag = true;
		//e.stopPropagation();
		xval = moveImg.getX();
		yval = moveImg.getY(); 
		if (drag == true) {
 	//	 volume = lineartoexp(Math.floor((((yval*100)/h)-100)*-1)) / 100;      
  	 	volume = Math.floor(((yval-h)*-1) / (h/100)) / 100; 
		//console.log("volume y..." + volume);
		panx = xval/w;
	   thissound.gainNode.gain.value = volume;
	   thissound.gainNode2.gain.value = volume * (panx);
	   thissound.gainNode1.gain.value = 1-thissound.gainNode2.gain.value;
		this.setStroke('green');
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
		radius: 24,
		fill: "grey",
		stroke: "grey",
        strokeWidth: 2,
		alpha: 0.8
		});

  wordobj1 = new Kinetic.Text({
		x: x1,
		y: y1,
		text: txt1,
		fontSize: 13,
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

  shaper.on("touchstart", function(event){
	event.stopPropagation();
	if(shaperlayer.getAlpha() > 0 ) { //only if shaper layer is 'activated'
	setTimeout (function() {
	  fademeup(wordobj1, wordslayer, 0, 0.9, 1);
	  setTimeout( function() {fademeout(wordobj1, wordslayer, wordobj1.getAlpha(), 0, 2.5,0); wordslayer.draw();}, 4000); //just in case mouseout gets missed
	  fademeup(shaper, shaperlayer, shaper.getAlpha(), 1, 0.2);
	  }, 60);
	  wordslayer.draw();
	  clickme = 1;
	  this.setStroke('white');
	  setTimeout(function() {this.setStroke('grey');}, 500);
	}
  });

  shaper.on("touchend", function(event){
	  event.stopPropagation();
		fademeout(shaper, shaperlayer, shaper.getAlpha(), 0.8, 0.1, 0);
		this.setStroke('grey');
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

///////ch - main function when selecting month///////
function ch(month1, tobjs) {
	var waiter1;
	var waiter2;
	var nowd = new Date();
	var nowtime = nowd.getTime();

init();


	color = colorchoice[month1];
	if (month1 < 11) nextmonth = month1 + 1;
	else nextmonth = 0;
	//var j = month*7;
	var j = 0;

  if (textinit == 1) {
  $("#textlay").fadeTo(400,0);	
  setTimeout(function() {document.getElementById("textlay").innerHTML = essaytexts[month1];$("#textlay").fadeTo(1200,1);	},400);
  }
  else {
	  document.getElementById("textlay").innerHTML = essaytexts[month1];
  }
  
  drawwordsmonth(month1, initmonth);	
  
  k = 0;
  var m = month1;
	if(initmonth == 0) {	
		for(i = 0; i < soundNamer.length; i++) {
		tobjs[(m*7) + 1][0].setFill(color);
		fademeup(tobjs[(m*7) + 1][0], tobjs[i][1], 0, 0.6, 1);
		ilay.add(tobjs[(m*7) + 1][0]);
		ilay.draw();
		loopSound(source[i], tobjs[(m*7) + 1][0], 1);
		oldobjects[i] = tobjs[(m*7) + 1];
		}
	
	  $("#bgcover1").fadeTo(2000, 0); //was 6
	  $("#themonth").text(monthnames[month1]);
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
			setTimeout(function(){$("#bgcontent").cycle(month1*7); }, 18000);
		}
		});
	  oldtime = nowtime;
	  }
	else {
			if(nowtime-oldtime > 500) { //to prevent v fast click change 
			 oldtime = nowtime;
		for(k = 0; k < 7; k++) {
			fademeout(oldobjects[k][0], ilay, oldobjects[k][0].getAlpha(), 0, 0.8, 1) ;
			fadeOutsound(oldobjects[k][2],-10, 0);
			}
		//	SOMETHING WRONG TO DO WITH REMOVING ONE SET OF MVE IMAGES AND REMAKINGTHE NEXT IN DIFFERENT PLACES...
	for(i = 0; i < soundNamer.length; i++) {
		oldobjects[i] = tobjs[(m*7) + 1];
		tobjs[(m*7) + 1][0].setFill(color);
		fademeup(tobjs[(m*7) + 1][0], tobjs[(m*7) + 1][1], 0, 0.6, 1);
		console.log("in here...");
		ilay.add(tobjs[(m*7) + 1][0]);
		ilay.draw();
		loopSound(source[i], tobjs[(m*7) + 1][0], 1);
		console.log("out here...");
		}
		  $("#bgcover1").fadeTo(1000, 1);
		  $("#themonth").fadeTo(1200,0);
		  waiter1 = setInterval(function() {$("#themonth").text(monthnames[month1]); $("#themonth").css('color', color); $("#themonth").fadeTo(1500,1); clearInterval(waiter1);}, 1200);
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
