//Background
var Background;

//Objects
var Player;
var Obstacle;

//Mobile buttons
var UpBtn;
var DownBtn;
var LeftBtn;
var RightBtn;
//End

function startGame() {
    Background = new component(656, 270, "img/background.jpg", 0, 0, "image");

    Player = new component(30, 30, "img/ball.png", 200, 75, "image");

    Obstacle = new component(10,100, "red", 300, 170);

  //Mobile buttons
    UpBtn = new component(0, 0, "gray", 50, 160);    
    DownBtn = new component(0, 0, "gray", 50, 220);    
    LeftBtn = new component(30, 30, "img/button-left.png", 20, 200, "image");    
    RightBtn = new component(30, 30, "img/button-right.png", 90, 200, "image"); 
    //End
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.interval = setInterval(updateGameArea, 20);
        //Mobile buttons
        window.addEventListener('mousedown', function (e) {
            myGameArea.x = e.pageX;
            myGameArea.y = e.pageY;
        })
        window.addEventListener('mouseup', function (e) {
            myGameArea.x = false;
            myGameArea.y = false;
        })
        window.addEventListener('touchstart', function (e) {
            myGameArea.x = e.pageX;
            myGameArea.y = e.pageY;
        })
        window.addEventListener('touchend', function (e) {
            myGameArea.x = false;
            myGameArea.y = false;
        })
        //End


        //Keyboard
        window.addEventListener('keydown', function (e) {
          myGameArea.keys = (myGameArea.keys || []);
          myGameArea.keys[e.keyCode] = true;
        })
        window.addEventListener('keyup', function (e) {
          myGameArea.keys[e.keyCode] = false; 
        })
        //End

    },
    stop : function() {
        clearInterval(this.interval);
    },    
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    dead : function() {
      myGameArea.stop();
      startGame();
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    if (type == "image") {
    this.image = new Image();
    this.image.src = color;
    }
    this.width = width;
    this.height = height;
    this.x = x;
    this.y = y;
    speed = 4;
    this.speedX = 0;
    this.speedY = 0;    
    this.gravity = 0.175;
    this.gravitySpeed = 0;
    this.bounce = 1;
    this.update = function() {

        ctx = myGameArea.context;
        if (type == "image") {
            ctx.drawImage(this.image, 
                this.x, 
                this.y,
                this.width, this.height);
    } else {
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
    }
}
    this.newPos = function() {
        this.gravitySpeed += this.gravity;
        this.x += this.speedX;
        this.y += this.speedY + this.gravitySpeed;
        this.hitBottom();
    }
    this.hitBottom = function() {
        var rockbottom = myGameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;
            this.gravitySpeed = -(this.gravitySpeed * this.bounce);
        }
    }
//Mobile buttons
    this.clicked = function() {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var clicked = true;
        if ((mybottom < myGameArea.y) || (mytop > myGameArea.y) || (myright < myGameArea.x) || (myleft > myGameArea.x)) {
            clicked = false;
        }
        return clicked;
    }
    //End

      this.crashWith = function(otherobj) {
    var myleft = this.x;
    var myright = this.x + (this.width);
    var mytop = this.y;
    var mybottom = this.y + (this.height);
    var otherleft = otherobj.x;
    var otherright = otherobj.x + (otherobj.width);
    var othertop = otherobj.y;
    var otherbottom = otherobj.y + (otherobj.height);
    var crash = true;
    if ((mybottom < othertop) ||
    (mytop > otherbottom) ||
    (myright < otherleft) ||
    (myleft > otherright)) {
      crash = false;
    }
    return crash;
  }
}

function updateGameArea() {

    if (Player.crashWith(Obstacle)) {
    myGameArea.dead();
  } else {
    myGameArea.clear();
    Obstacle.update();
  }
    //Mobile buttons
        if (myGameArea.x && myGameArea.y) {
        /*if (myUpBtn.clicked()) {
            Player.y -= this.speed;
        }
        if (myDownBtn.clicked()) {
            Player.y += this.speed;
        }*/
        if (LeftBtn.clicked()) {
            Player.x += -this.speed;
        }
        if (RightBtn.clicked()) {
            Player.x += this.speed;
        }
    }
    UpBtn.update();        
    DownBtn.update();        
    LeftBtn.update();     
    RightBtn.update();                                
    Player.update();

    //End

    //Keyboard
  Player.speedX = 0;
  Player.speedY = 0; 

  if (myGameArea.keys && myGameArea.keys[37]) {Player.speedX = -this.speed; }
  if (myGameArea.keys && myGameArea.keys[39]) {Player.speedX = this.speed; }
  //if (myGameArea.keys && myGameArea.keys[38]) {Player.speedY = -this.speed; }
  //if (myGameArea.keys && myGameArea.keys[40]) {Player.speedY = this.speed; }
  //End
    Background.newPos(); 
    Background.update();
    Player.newPos();
    Player.update();

    Obstacle.update();

    //UpBtn.update();        
    //DownBtn.update();        
    LeftBtn.update();     
    RightBtn.update();
}
