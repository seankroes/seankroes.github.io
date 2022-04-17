var mode = "dark";

function swapStyleSheet(){
    var pagestyle = document.getElementById('lightSwitchStyle');
    var lightSwitch = document.getElementById('lightSwitch');
    if(mode == "default"){
        //pagestyle.setAttribute('href', 'style-theme-dark.css');
        pagestyle.setAttribute('href', 'style-theme-default.css');
        mode = "dark";
	    
	    
	//stop rain
	    removeEventListener("load");
    } else {
        //pagestyle.setAttribute('href', 'style-theme-default.css');
        pagestyle.setAttribute('href', 'style-theme-dark.css');
        
        
        
        // Creating rain

window.addEventListener("load", function() {
	// create rain vars
	var el = document.createElement("div");
	el.classList.add("rain")
	document.getElementById("load").appendChild(el);
	var frames, duplicate, x, y; // create some vars
	duplicate = document.getElementById("load").innerHTML;
	document.getElementById("load").innerHTML = duplicate.repeat(2);
	frames = document.getElementById("load").children;
	setInterval(function() {
		x = document.documentElement.clientWidth - 1, y = document.documentElement.clientHeight - 100; // and y position for the rain drops
		for(var i = 0; i < frames.length; i++) {
			frames[i].setAttribute("style", "position:absolute; height:100px; width:1px; left:" + Math.random() * x +"px; top:" + Math.random() * y + "px;")
		}
	}, 1);

});
        
        mode = "default";
    }
}


function save(){
    var checkbox = document.getElementById('lightSwitch');
    localStorage.setItem('lightSwitch', checkbox.checked);
    
    //fix this later (bug makes it so css doesnt load for a second sometimes).
    load();
}

function load(){

    var checked = JSON.parse(localStorage.getItem('lightSwitch'));
    document.getElementById("lightSwitch").checked = checked;
    
    if (document.getElementById("lightSwitch").checked = checked) {
        mode = "default";
        swapStyleSheet();
    } else {
        mode = "dark"
        swapStyleSheet();
    }
}

/*function restore(){
    location.reload();
    localStorage.clear();
}*/

load();
