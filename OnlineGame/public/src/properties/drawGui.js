window.onload = function() {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	requestAnimationFrame(draw);

var previousFrameTime = 0;
var name = "Username";

function draw(time) {
	var fps = Math.floor(1000 / (time - previousFrameTime));
	previousFrameTime = time;
	
	ctx.fillStyle = "#000";
	ctx.font = "normal 10pt sans-serif";
	ctx.fillText("FPS: " + fps, 10, 20);
	//ctx.fillText("X: " + px + " Y: " + py, 10, 40);
	ctx.fillText(name, 10, 80);
		
	requestAnimationFrame(draw);
	}
};