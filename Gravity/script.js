function create() {
  var circle = this.add.circle(
    this.cameras.main.centerX, 0, 10, 0xffffff
  );
  this.physics.add.existing(circle);
  circle.body
    .setCollideWorldBounds(true)
    .setBounce(1)
    .setSize(33, 33)
    .setVelocityX(Phaser.Math.Between(-500, 500));
}
//moon:130 jupiter:2700 earth: 980.665
var config = {
  width: 300,
  height: 300,
  physics: {
    default: 'arcade',
    arcade: {
      gravity: { y: 0 }
    }
  },
  scene: {
    create: create
  }}


new Phaser.Game(config);
}}