//Game vars
var server = require("./libs/server");
var color = require("./libs/color");

//console.log(color.red, "Test Message");

//Chat vars
//var mongojs = require("mongojs");
var db = null;//mongojs('localhost:27017/myGame', ['account','progress']);

var express = require('express');
var app = express();
//var serv = express.Server(app);
var serv = require('http').Server(app);

//Game code

server.init(3000, "Game is running on port 3000", color.green);


server.on("playerMovement", function(data) {
	server.send(data, "playerMovement");
});
server.onConnect = function(socket) {
	socket.emit("onConnect", {id: socket.id});
}

server.onDisconnect = function(socket) {
	console.log(color.red, socket.id);
	server.send({id: socket.id}, "sendDisconnect");
}



//SOCKET_LIST[socket.id] = socket;
	
//Player.onConnect(socket);

server.on("sendMsgToServer",function(data){
	var playerName = ("" + socket.id).slice(2,7);
	for(var i in SOCKET_LIST) {
		SOCKET_LIST[i].emit("addToChat",playerName + ": " + data);
	}
});

//Chat code
app.get('/',function(req, res) {
	res.sendFile(__dirname + '/OnlineGame/index.html');
});
app.use('/OnlineGame',express.static(__dirname + '/OnlineGame'));

app.enable('trust proxy');

serv.listen(process.env.PORT || 3001);
console.log("Chat server started on port 3001");

var SOCKET_LIST = {};

var Entity = function(param){
	var self = {
		id:""
	}
	if(param){
		if(param.id)
			self.id = param.id;
	}
	
	self.update = function(){
		//self.updatePosition();
	}
	return self;
}

var Player = function(param){
	var self = Entity(param);
	self.number = "" + Math.floor(10 * Math.random());
	self.username = param.username;
	
	var super_update = self.update;
	self.update = function(){
		super_update();
	}
	
	self.getInitPack = function(){
		return {
			id:self.id,
			number:self.number
		};		
	}
	self.getUpdatePack = function(){
		return {
			id:self.id
		}	
	}
	
	Player.list[self.id] = self;
	
	initPack.player.push(self.getInitPack());
	return self;
}
Player.list = {};
Player.onConnect = function(socket,username){
	var player = Player({
		username:username,
		id:socket.id
	});

	//send to client user joined the chat
	for(var i in SOCKET_LIST){
		SOCKET_LIST[i].emit('sendConnect',player.username);
	}
	
	socket.on('sendMsgToServer',function(data){
		for(var i in SOCKET_LIST){
			SOCKET_LIST[i].emit('addToChat',player.username + ': ' + data);
		}
	});
	socket.on('sendPmToServer',function(data){ //data:{username,message}
		var recipientSocket = null;
		for(var i in Player.list)
			if(Player.list[i].username === data.username)
				recipientSocket = SOCKET_LIST[i];
		if(recipientSocket === null){
			socket.emit('addToChat','The user ' + data.username + ' is not online.');
		} else {
			recipientSocket.emit('addToChat','From ' + player.username + ': ' + data.message);
			//socket.emit('addToChat','To ' + data.username + ': ' + data.message);
		}
	});

	socket.on('sendKickToServer',function(data,username){ //data:{username,message}
		if (userRights == 3) {
			console.log(data);
			var recipientSocket = null;
			for(var i in Player.list)
				if(Player.list[i].username === data.username)
					recipientSocket = SOCKET_LIST[i];
			if(recipientSocket === null){
				socket.emit('addToChat','The user ' + data.username + ' is not online.');
			} else {
				//kick player
				delete Player.list[socket.id];
				removePack.player.push(socket.id);

				for(var i in SOCKET_LIST) {
					SOCKET_LIST[i].emit('sendKick',data,player.username);
				}
			}
		} else {
			//not admin
		}
	});
	
	socket.emit('init',{
		selfId:socket.id,
		player:Player.getAllInitPack(),
	})
	
	//User rights
	userRights = 0;

	if /*(player.username == "admin")*/ (player.username != "admin"){
		userRights = 3;
	} else if (player.username == "moderator") {
		userRights = 2;
	} else if (player.username == "vip") {
		userRights = 1;
	} else {
		userRights = 0;
	}

	//Send command
	socket.on('sendCommandToServer',function(data,username){
		for(var i in SOCKET_LIST){
			SOCKET_LIST[i].emit('sendCommandToServer',data,player.username);
		}

		//console.log(data)

		//
		//User commands
		//

		//help list
		if (data == 'help' || data == 'commands' || data == 'faq') {
			for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendHelp',player.username);
			}
		}

		//Coinflip
		if (data == 'coin' || data == 'flip') {
			//Calculate coin toss
			var coinCalc  = Math.floor(Math.random() * 2);
			if (coinCalc == 0) {
				coinValue = "Heads";
				//console.log(coinValue);
				for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendCoin',coinValue,player.username);
				}
			} else {
				coinValue = "Tails";
				//console.log(coinValue);
				for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendCoin',coinValue,player.username);
				}
			}
		}

		//coinflip
		if (data == 'dice' || data == 'roll') {
			//Calculate coin toss
			var diceCalc  = Math.floor(Math.random() * 6 + 1);
				diceValue = diceCalc;
				//console.log(coinValue);
				for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendDice',diceValue,player.username);
			}
		}

		//local time
		if (data == 'time') {
			for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendTime',player.username);
			}
		}

		//server uptime
		if (data == 'uptime') {
			var uptime = process.uptime();
			//console.log(format(uptime));

			//calculate uptime
			for(var i in SOCKET_LIST) {
				SOCKET_LIST[i].emit('sendUptime',uptime,player.username);
			}
		}

		//
		//Admin commands
		//

		//shutdown server
		if (data == 'shutdown' || data == 'exit' || data == 'quit' || data == 'q') {
			if (userRights == 3) {
				for(var i in SOCKET_LIST) {
					SOCKET_LIST[i].emit('sendShutdown',player.username);
				}
				var delay = 1000; //1 second
				setTimeout(function() {
				 process.exit();
				}, delay);
			}
		}

		//clear chat
		if (data == 'clear' || data == 'cls' || data == 'empty') {
			if (userRights == 3) {
				for(var i in SOCKET_LIST) {
					SOCKET_LIST[i].emit('sendClear',player.username);
				}
			}
		}

		//ban player
		if (data == 'ban') {
			if (userRights == 3) {
				for(var i in SOCKET_LIST) {
					SOCKET_LIST[i].emit('sendBan',data.username);
				}
			}

			//socket.emit('addToChat',data.username + ': has been banned from the chat session.');
		}
		
	});
	
	Player.onDisconnect = function(socket,username){
		//send to client user left the chat message
		for(var i in SOCKET_LIST){
		SOCKET_LIST[i].emit('sendDisconnect',player.username);
		}
	}
}

Player.onDisconnect = function(socket){
	delete Player.list[socket.id];
	removePack.player.push(socket.id);
}

Player.getAllInitPack = function(){
	var players = [];
	for(var i in Player.list)
		players.push(Player.list[i].getInitPack());
	return players;
}


Player.update = function(){
	var pack = [];
	for(var i in Player.list){
		var player = Player.list[i];
		player.update();
		pack.push(player.getUpdatePack());		
	}
	return pack;
}

var DEBUG = true;

var isValidPassword = function(data,cb){
	return cb(true);
	/*db.account.find({username:data.username,password:data.password},function(err,res){
		if(res.length > 0)
			cb(true);
		else
			cb(false);
	});*/
}
var isUsernameTaken = function(data,cb){
	return cb(false);
	/*db.account.find({username:data.username},function(err,res){
		if(res.length > 0)
			cb(true);
		else
			cb(false);
	});*/
}
var addUser = function(data,cb){
	return cb();
	/*db.account.insert({username:data.username,password:data.password},function(err){
		cb();
	});*/
}

var io = require('socket.io')(serv,{});
io.sockets.on('connection', function(socket){
	socket.id = Math.random();
	SOCKET_LIST[socket.id] = socket;
	
	socket.on('signIn',function(data){ //{username,password}
		isValidPassword(data,function(res){
			if(res){
				Player.onConnect(socket,data.username);
				//console.log(socket.id + " connected.");
				socket.emit('signInResponse',{success:true});
			} else {
				socket.emit('signInResponse',{success:false});			
			}
		});
	});
	socket.on('signUp',function(data){
		isUsernameTaken(data,function(res){
			if(res){
				socket.emit('signUpResponse',{success:false});		
			} else {
				addUser(data,function(){
					socket.emit('signUpResponse',{success:true});					
				});
			}
		});		
	});
	
	
	socket.on('disconnect',function(){
		delete SOCKET_LIST[socket.id];
		Player.onDisconnect(socket);
	});
});

var initPack = {player:[]};
var removePack = {player:[]};


setInterval(function(){
	var pack = {
		player:Player.update(),
	}
	
	for(var i in SOCKET_LIST){
		var socket = SOCKET_LIST[i];
		socket.emit('init',initPack);
		socket.emit('update',pack);
		socket.emit('remove',removePack);
	}
	initPack.player = [];
	removePack.player = [];
	
},1000/25);

/*
var profiler = require('v8-profiler');
var fs = require('fs');
var startProfiling = function(duration){
	profiler.startProfiling('1', true);
	setTimeout(function(){
		var profile1 = profiler.stopProfiling('1');
		
		profile1.export(function(error, result) {
			fs.writeFile('./profile.cpuprofile', result);
			profile1.delete();
			console.log("Profile saved.");
		});
	},duration);	
}
startProfiling(10000);
*/
