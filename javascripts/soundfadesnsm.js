

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
