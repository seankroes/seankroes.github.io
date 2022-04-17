var mode = "off";
var audio = document.getElementById('musicSource');
function toggleMusic(){
	//var pagestyle = document.getElementById('pagestyle');
	var musicSwitch = document.getElementById('musicSwitch');
	if(mode == "off"){
		//pagestyle.setAttribute('href', 'template/css/dark.css');
	    //musicSwitch.src = "../img/on.jpg";
	    //musicSwitch.title = "Turn the lights back on";
		mode = "off";
		var audio = document.getElementById('musicSource');
		audio.stop();
	} else {
		//pagestyle.setAttribute('href', 'template/css/light.css');
	    //lightSwitch.src = "../img/off.jpg";
	    lightSwitch.title = "Turn the lights off";
		mode = "on";
		
		var audio = document.getElementById('musicSource');
        audio.play();
		
	}
}


function save(){
    var checkbox = document.getElementById('musicSwitch');
    localStorage.setItem('musicSwitch', checkbox.checked);
	
	//fix this later (glitch makes it so css doesnt load for a sec sometimes, also that when you click save whilst its already activated it will deactive).
	load();
}

function load(){    
    var checked = JSON.parse(localStorage.getItem('musicSwitch'));
    document.getElementById("musicSwitch").checked = checked;
	
	if (document.getElementById("musicSwitch").checked = checked) {
		toggleMusic();
	}
}

function restore(){
    location.reload();
    localStorage.clear()
}


load();