// Creating rain

window.addEventListener("load", function() {
	// create rain vars
	var el = document.createElement("div");
	document.getElementById("load").appendChild(el);
	var frames, duplicate, x, y; // create some vars
	duplicate = document.getElementById("load").innerHTML;
	document.getElementById("load").innerHTML = duplicate.repeat(2);
	frames = document.getElementById("load").children;
	setInterval(function() {
		x = document.documentElement.clientWidth - 1, y = document.documentElement.clientHeight - 100; // and y position for the rain drops
		for(var i = 0; i < frames.length; i++) {
			frames[i].setAttribute("style", "position:absolute; height:100px; width:1px; left:" + Math.random() * x +"px; top:" + Math.random() * y + "px;")
		}
	}, 1);

});
