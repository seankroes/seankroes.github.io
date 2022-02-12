function setup() {
  Screen.init();
  new rawImage("tilesets/player");
  
  new imageSet("tilesets", "map", 8, 501);
  new rawMap("maps", "map");
  
  client.init("https://0.0.0.0:3000");
  //new player(client.socket.id, true);
}
function step() {
	drawMap("map");
	/*for(var x=0; x<width; x+=32) {
		for(var y=0; y<height; y+=32) {
		var pos = new position(null, x, y);
		imageSet.draw("map.png", pos, 1, 0);
		}
	}*/
}
