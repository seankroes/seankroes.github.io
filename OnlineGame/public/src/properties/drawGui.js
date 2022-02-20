window.onload = function() {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	requestAnimationFrame(draw);

var previousFrameTime = 0;

function draw(time) {
	var fps = Math.floor(1000 / (time - previousFrameTime));
	previousFrameTime = time;
	
	ctx.fillStyle = "#fff";
	ctx.font = "normal 10pt sans-serif";
	ctx.fillText("FPS: " + fps, 1048, 20);
	//ctx.fillText("X: " + px + " Y: " + py, 10, 40);
	var uname=localStorage.getItem("uname");
	var name = uname;
	ctx.fillText(name, 20, 200);
		
	requestAnimationFrame(draw);
	}
};
