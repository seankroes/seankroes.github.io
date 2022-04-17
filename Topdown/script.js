const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = 800;
canvas.height = 1200;
let health = 100;
let money = 0;
let bullets = 28;
let lvl = 1;
let xp = 0;
let xp_cap = lvl * 50;
let gameFrame = 0;
//ctx.font = '32px Georgia';


// Mouse interactivity
let canvasPosition = canvas.getBoundingClientRect();
const mouse = {
    x: canvas.width/2,
    y: canvas.height/2,
    click: false
}
canvas.addEventListener('mousedown', function(e){
    mouse.click = true;

//Mouse clicks
 const rect = canvas.getBoundingClientRect();
const x = event.clientX - rect.left;
const y = event.clientY - rect.top;

player.killEnemy(x+player.enemyX/2,y+player.enemyY/2);

player.openStore(x+player.storeButtonX/2,y+player.storeButtonY/2);

 //console.log("click at: //x:"+mouse.x+" y:"+mouse.y);
    //money += 1;
    mouse.x = e.x;
    mouse.y = e.y;
player.x = mouse.x + 225;//x;
player.y = mouse.y + 325;//y;
});
window.addEventListener('mouseup', function(e){
    mouse.click = false;
});

// Player
class Player {
    constructor(){
        this.x = canvas.width/2;
        this.y = canvas.height/2;
        this.enemyHealth = 1;
        this.enemyX = 400 + Math.floor((Math.random() * 150) + 1) - Math.floor((Math.random() * 100) + 1);
        this.enemyY = 200 + Math.floor((Math.random() * 150) + 1) - Math.floor((Math.random() * 100) + 1);

        this.radius = 50;
        this.storeButtonradius = 62.5;
        this.storeButtonX = 725;
        this.storeButtonY = 75;
        this.angle = 0;
        this.frameX = 0;
        this.frameY = 0;
        this.frame = 0;
    }

    killEnemy(xmouse,ymouse) {
      //console.log(x,y);
      const distance =
Math.sqrt(
      ( (xmouse - this.enemyX) * (xmouse - this.enemyX) ) + ( (ymouse - this.enemyY) * (ymouse - this.enemyY) ) );

 //console.log(distance);

if (distance < this.radius && this.enemyHealth == 1 && !bullets <= 0) {
      //this.enemyHealth -= 1;
      bullets -= 1;
      health -= Math.floor(Math.random() * 15);
      xp += Math.floor(Math.random() * 25);
      money += Math.floor(Math.random() * 25);
      console.log("enemy killed");
      this.enemyX = 400 + Math.floor((Math.random() * 150) + 1) - Math.floor((Math.random() * 100) + 1);
        this.enemyY = 200 + Math.floor((Math.random() * 150) + 1) - Math.floor((Math.random() * 100) + 1);
      return true;
      } else {
      //console.log(xmouse,ymouse);
      return false;
      }
    }

openStore(xmouse,ymouse) {
      //console.log(x,y);
      const distance =
Math.sqrt(
      ( (xmouse - this.storeButtonX) * (xmouse - this.storeButtonX) ) + ( (ymouse - this.storeButtonY) * (ymouse - this.storeButtonY) ) );

 //console.log(distance);

if (distance < this.radius) {
      console.log("shop clicked");
      //xp += 1000;
      if (money >= 250) {
      bullets += 28;
      money -= 250;
      }
      return true;
      } else {
      //console.log(xmouse,ymouse);
      return false;
      }
    }

    update() {

     
     //health/regen system
     if (health < 100) {
       health += .01 * lvl//.025;

     }
     
     if (health < 1) {
       //console.log("dead");
       health = 100;
       money = 0;
       bullets = 28;
       lvl = 1;
       xp = 0;
       xp_cap = lvl * 50;
     }

     //lvl/xp system
     //xp += 1;
     if (xp > xp_cap - 1) {
      lvl += 1;
      xp = 0 + xp - xp_cap;
      xp_cap = lvl * 50;
     }

    }


    draw() {


    //Enemy
    if (this.enemyHealth == 1) {
ctx.font = '32px Georgia';
    ctx.fillStyle = 'red';
    ctx.beginPath();
ctx.arc(this.enemyX+Math.random()*5,this.enemyY+Math.random()*5, this.radius, 0, Math.PI * 2);
    ctx.fill();
    ctx.closePath();
}

    //Player
    ctx.fillStyle = 'blue';
    ctx.beginPath();
    //ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.beginPath();
ctx.arc(this.x+Math.random()*5,this.y+Math.random()*5, this.radius, 0, Math.PI * 2);
    ctx.fill();
    ctx.closePath();
   
    //Gui
    ctx.fillStyle = 'black';
    ctx.fillText("Health: "+Math.round(health)+"%",16,32);
    ctx.fillText("$: "+money,16,64);
    ctx.fillText("Lvl: "+lvl,16,96);
    ctx.fillText("xp: "+xp+" / "+xp_cap,16,128);
    ctx.fillText("bullets: "+bullets,16,162);

ctx.fillStyle = 'yellow';
    ctx.beginPath();
    ctx.arc(this.storeButtonX, this.storeButtonY, this.storeButtonradius, 0, Math.PI * 2);

ctx.fill();
    ctx.closePath();
    ctx.fillStyle = 'gold';
    ctx.beginPath();
    ctx.arc(this.storeButtonX, this.storeButtonY, this.storeButtonradius-10, 0, Math.PI * 2);
    ctx.fill();
    ctx.closePath();
    ctx.fillStyle = 'green';
ctx.font = '64px Georgia';
ctx.fillText("$",this.storeButtonX-20,this.storeButtonY+20);
    }
}

const player = new Player();

function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      player.update();
      player.draw();
      requestAnimationFrame(animate);
    }

    animate();


