var mode = "default";

function swapStyleSheet(){
    var pagestyle = document.getElementById('lightSwitchStyle');
    var lightSwitch = document.getElementById('lightSwitch');
    if(mode == "default"){
        //pagestyle.setAttribute('href', 'style-theme-dark.css');
        pagestyle.setAttribute('href', 'light.css');
        mode = "dark";
    } else {
        //pagestyle.setAttribute('href', 'style-theme-default.css');
        pagestyle.setAttribute('href', 'dark.css');
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
        mode = "dark";
        swapStyleSheet();
    } else {
        //mode = "default"
        swapStyleSheet();
    }
}

/*function restore(){
    location.reload();
    localStorage.clear();
}*/

load();