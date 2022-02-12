var client = {
  socket: null,
  init: function(link) {
    client.socket = io.connect(link);
	client.socket.on("playerMovement", function(data) {

		
		px = data.posX;
		py = data.posY;
		

	/*canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	
	requestAnimationFrame(drawXY);

	
	function drawXY(time) {
		
		ctx.fillStyle = "#000";
		ctx.font = "normal 10pt sans-serif";
		ctx.fillText("X: " + px, 10, 40);
		ctx.fillText("Y: " + py, 10, 60);
			
		requestAnimationFrame(drawXY);
		}*/
		
		//console.log(data);
		//noLoop();
		
		if(data.id != client.socket.id) {
			if(!players[data.id]) {
				new player(data.id);
			}
		players[data.id].pos.x = data.posX;
		players[data.id].pos.y = data.posY;
		players[data.id].img.setY(data.dir);
		if(data.isAnimating == true) players[data.id].img.animateX();
		}
	});
	client.socket.on("onConnect", function(data) {
		new player(data.id, true);
	});
	
	client.socket.on("sendDisconnect", function(data) {
		console.log("Player:", data.id, "disconnected.");

		for(var i=0; i<objects.length; i++) {
			if(objects[i].name == data.id) {
				objects.splice(i, 1);
			break;
			}
		}
		delete players[data.id];
	});
	
  },
  send: function(data, key) {
    if(!key) key = "send";
    client.socket.emit(key, data);
  }
}
