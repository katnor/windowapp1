//FADE FUNCTIONS SOUNDS AND IMAGES
// - volume is between 0 and 100 in SM2


function fadeOutsound(soundID,negincr, endvol) {
	var s = soundManager.getSoundById(soundID);
	var vol = s.volume;
	if (vol <= endvol+5) { if (endvol == 0) {soundManager.pause(soundID); }  return false; }
	s.setVolume(Math.max(endvol,vol+negincr));
	setTimeout(function(){fadeOutsound(soundID,negincr, endvol)},20);
}

function fadeOuttozero(soundID, imageID, negincr,count) {
	var s = soundManager.getSoundById(soundID);
	var yival = imageID.getY();
	var currvol = Math.floor(((yival-h)*-1) / (h/100));
    var vol = negincr*count;
	var setvol = currvol-vol;
	count++; 
	
	if (setvol <= 0) return false;
	s.setVolume(Math.max(0,setvol));
//	console.log("fadingouttozero...." + setvol);
	setTimeout(function(){fadeOuttozero(soundID,imageID, negincr, count)},200);
}


function fadeUpsound(soundID,incr, endvol) {
	var s = soundManager.getSoundById(soundID);
	var vol = s.volume;
if(vol < endvol) s.setVolume(Math.min(endvol,vol+incr));
	setTimeout(function(){fadeUpsound(soundID,incr,endvol)},400);
}

function fadeUpfromzero(soundID, imageID, posincr, sinit) {
	var s = soundManager.getSoundById(soundID);
	var yival = imageID.getY();
	var endvol = Math.floor(((yival-h)*-1) / (h/100));
	var vol;
	if (sinit == 0) {
		vol = 0;
	}
	else vol = s.volume;
	
	if (vol >= endvol) return false;
	s.setVolume(Math.min(endvol,vol+posincr));
	//	console.log("fadingupfromzero" + vol+posincr);

	setTimeout(function(){fadeUpfromzero(soundID, imageID, posincr, 1)},200);
}


//loop - not seamless so make sounds workable for a small gap
function loopSound(soundID, imageID, goinit) {
	//endvol derivd from ImageID
	var s = soundManager.getSoundById(soundID);
	if(goinit) {
	soundManager.play(soundID,{onfinish:function(){
	loopSound(soundID,imageID, goinit);
	  }});
	}
		else {
	//	console.log("stop sound");
		fadeOutsound(soundID, -4, 0);
	}

	//fades included - don't need to prep sources 
	fadeUpfromzero(soundID,imageID, 2, 0); 
//	console.log("fadeinloop");
	s.onPosition(s.duration-5000, function(eventPosition) {
    fadeOuttozero(soundID, imageID, 4, goinit);
//	console.log("fadeoutloop");
	});

} 



//PROB
function plainloopSound(soundID, endvol) { 
	//endvol derivd from ImageID
	var s = soundManager.getSoundById(soundID);
	if (stoppit == 0) {
	soundManager.play(soundID,{onfinish:function(){
	plainloopSound(soundID,endvol);
		}});
	fadeUpsound(soundID, 2, endvol); 
	s.onPosition(s.duration-5000, function(eventPosition) {
    fadeOutsound(soundID, 4, 0);
  });
	}


}



//
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
