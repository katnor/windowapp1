//WEBKIT WEB AUDIO FUNCTIONS

//nb for web audio the range is 0 to 1 for volume and pan

  	soundplay = function(source) {
 		source.loop = true;
		source.noteOn(0);
	};
	
  	soundinit= function(source) {
 		source.loop = true;
		source.gainNode.gain.value = 0;
		source.noteOn(0);
	};
	
	soundstop = function(source) {
	 source.gainNode.gain.value = 0;
	 //source.noteOff(0);
		};
	
	soundtoggle = function(source) {
	   source.playing ? soundstop(source) : soundplay(source);
	   source.playing = !source.playing;
	   console.log(source.playing);
	};

	
//FADE FUNCTIONS SOUNDS AND IMAGES

function fadeOutsound(soundsource,negincr, endvol) {
	var s = soundsource;
	var vol = s.gainNode.gain.value;
	if (vol <= endvol+0.01) { if (endvol == 0) {soundstop(soundsource); }  return false; }
	s.gainNode.gain.value = Math.max(endvol,vol+negincr);
	setTimeout(function(){fadeOutsound(soundsource,negincr, endvol)},20);
}

function fadeOuttozero(soundsource, imageID, negincr,count) {
	var s = soundsource;
	var yival = imageID.getY();
	var currvol = Math.floor(((yival-h)*-1) / (h/100)) /100;
    var vol = negincr*count;
	var setvol = currvol-vol;
	count++; 
	
	if (setvol <= 0) return false;
	s.gainNode.gain.value  = Math.max(0,setvol);
//	console.log("fadingouttozero...." + setvol);
	setTimeout(function(){fadeOuttozero(soundsource,imageID, negincr, count)},200);
}

function fadeUpsound(soundsource,incr, endvol) {
	var s = soundsource;
	var vol = s.gainNode.gain.value;
if(vol < endvol) s.setVolume(Math.min(endvol,vol+incr));
	setTimeout(function(){fadeUpsound(soundsource,incr,endvol)},400);
}

function fadeUpfromzero(soundsource, imageID, posincr, sinit) {
	var s = soundsource;
	var yival = imageID.getY();
	var endvol = (Math.floor(((yival-h)*-1) / (h/100)))/100;
	var vol;
	if (sinit == 0) {
		vol = 0;
	}
	else vol = s.gainNode.gain.value;
	if (vol >= endvol) return false;
	s.gainNode.gain.value = (Math.min(endvol,vol+posincr));
	setTimeout(function(){fadeUpfromzero(soundsource, imageID, posincr, 1)},200);
	
}


//convert to web api - divided increments by 100

function loopSound(soundsource, imageID, goinit) {
	//endvol derivd from ImageID
		if(goinit) {
		var fademe = 0;
		soundplay(soundsource);
		var starttime = context.currentTime;
	}
		else {
		soundstop(soundsource); //but want a function with the next line fadout
		//(soundsource,incr, endvol)
		fadeOutsound(soundsource, -0.04, 0);
	}
	//fades included - don't need to prep sources 
	fadeUpfromzero(soundsource,imageID, 0.02, 0); 
	if (context.currentTime >= starttime + (soundsource.buffer.duration-5) && fademe == 0)
	{
	   fadeOuttozero(soundsource, imageID, 0.04, goinit);
	   starttime = 0;
	   fademe == 1;
	}
	
} 

function plainloopSound(soundsource, endvol) { 
	var s = soundsource
	if (stoppit == 0) {
		var fademe = 0;
		soundplay(soundsource);
		var starttime = context.currentTime;
	}
	fadeUpsound(soundsource, .02, endvol); 
		if (context.currentTime >= starttime + (soundsource.buffer.duration-5) && fademe == 0)
	{
	 fadeOutsound(soundsource, .04, 0);
	   starttime = 0;
	   fademe == 1;
	}
	}


//FUNCTIONS: 
//FADES ALPHA UP AND DOWN FOR OBJ
function fademeup(thistext,layer, startalpha, endalpha, duration) {
	//var alpha = thistext.getAlpha();
	var alpharange = endalpha-startalpha;
	 //convert from sec to ms
	var val = 0.05;
	var incr = Math.floor((duration*1000)/(alpharange/val));
	var fadeupvar;
	fadeupvar = setInterval(function() {if (thistext.getAlpha() < endalpha ) {thistext.setAlpha(thistext.getAlpha()+val);layer.draw();} else clearInterval(fadeupvar); layer.draw(); }, incr);
}

function fademeout(thisthing, layer, startalpha, endalpha, duration, removeflag) {
	var alpharange = startalpha-endalpha;
	var val = 0.05;
	var incr = Math.floor((duration*1000)/(alpharange/val));
	var fadedownvar;
	fadedownvar = setInterval(function() {if (thisthing.getAlpha() > endalpha+val) {thisthing.setAlpha(thisthing.getAlpha()-val); layer.draw(); } else { clearInterval(fadedownvar); thisthing.setAlpha(endalpha); if (removeflag == 1) {layer.remove(thisthing); } layer.draw();}}, incr); //now removes the object too
}

function quiver(obj, layer, quiver, rate) {
	var ms = 1000/rate; 
	var c = 0;
	//rate is x times a second; c is number of quivers before it stops
	var times = setInterval(function() {changepos(obj, layer, quiver); c++; if (c > 6) clearInterval(times);}, ms); 
}

//
//alp is startalpha
function fadeoutlayer(layer){
	var alp = layer.getAlpha();
downwego = setInterval(function() {layer.setAlpha(alp); layer.draw(); alp -= 0.1; 	 if (alp <=0) { layer.setAlpha(0); clearInterval(downwego); layer.draw(); return false;}}, 90);
}
//alp is start, endalpha
function fadeuplayer(layer, alp, endalp) {
	upwego = setInterval(function() {layer.setAlpha(alp); layer.draw(); alp += 0.1; if (alp >= endalp) clearInterval(upwego); layer.draw(); return false;}, 90);
}
