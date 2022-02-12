var players = {};

class player {
  constructor(name, hasController) {
	this.pos = new position(this, 300, 300, 0, -16);
	this.img = new animator(this, this.pos, "tilesets/player", 4, 4, .2);
	if(hasController) this.controller = new userMovement(this, this.pos, this.img);
	  
    this.properties = [
	this.pos,
	this.img
	];
	if(hasController) this.properties.push(this.controller);
	this.name = name;
	players[name] = this;
    objects.push(this);
  }
  
  step() {
	  if(this.name == client.socket.id) 
		  client.send({
			  posX: this.pos.x,
			  posY: this.pos.y,
			  id: client.socket.id,
			  dir: this.img.realY,
			  isAnimating: this.controller.moving
			}, "playerMovement");
  }
}
