//Been to location variables
beentoschoolschoolgate = true;
beentoschoolsquare = false;
beentoschool = false;

//Inventory
cash = 0;
slingshot = false;
skateboard = false;
stick = false;


//Current room
currentroom = "school";

$(document).ready(function() {

	$("#console").fadeIn(2500);

	$("form").submit(function() {﻿
		var input = $("#command_line").val();

		valid_command = true;

		//Clear the command line after every command
		$("#command_line").val("");

		function valid_command() {
			valid_command = false;
		}

		//Standard commands
		if (input == "help" || input == "commands") {
			$("<p>Commands:<br>How to use the syntax:<br>[command] [param]<br>---------------------------------------<br>help / commands [none]<br>take / pickup [item]<br>go [north / east / south / west]<br>inventory / inv [item]<br>clear / cls [none]</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}
		if (input == "location") {
			$("<p>You are at: " + currentroom + ".</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}

		if (input == "clear" || input == "cls") {
			$("#console_cleararea").empty();
			valid_command();
		}

		if (input == "reload" || input == "refresh") {
			window.location.reload(true);
			valid_command();
		}

		//Inventory
		if (input == "inventory" || input == "inv") {
			$("<p>Cash: $" + cash + "</p>").hide().appendTo("#console_cleararea").fadeIn(1000);

		if (stick == true) {
			$("<p>Stick</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
		}
		if (slingshot == true) {
			$("<p>Slingshot</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
		} 
		if (skateboard == true) {
			$("<p>Skateboard</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
		} 
			valid_command();
		}

		
		//Take item commands
		
		//Location: Schoolgate
		if (input == "take cash" || input == "pickup cash" || input == "take money" || input == "pickup money" && currentroom == "schoolgate") {
			$("<p>You picked up $0.25.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
			cash += 0.25;
		} else if(input == "take cash" || input == "pickup cash" || input == "take money" || input == "pickup money" && currentroom != "schoolgate") {
			$("<p>There is no money on the ground..</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}


		//Goto location commands
		//at schoolgate
		if (input == "go north" && currentroom == "schoolgate" || input == "walk north" && currentroom == "schoolgate") {
			currentroom = "schoolyard";
			$("<p>You walk towards the schoolyard.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		} else if (input == "go north" && currentroom != "schoolgate" || input == "walk north" && currentroom != "schoolgate") {
			$("<p>Can't go that way.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}

		//at schoolyard
		/*if (input == "go north" && currentroom == "schoolyard" || input == "walk north" && currentroom == "schoolyard") {
			currentroom = "school";
			$("<p>You walk towards the school, open the door and enter.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		} else if (input == "go north" && currentroom != "schoolyard" || input == "walk north" && currentroom != "schoolyard") {
			$("<p>Can't go that way.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}*/
/*
		else if (input == "go south" && currentroom == "schoolyard" || input == "walk south" && currentroom == "schoolyard") {
			currentroom = "schoolgate";
			$("<p>You walk towards the schoolgate.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		} else if (input == "go south" && currentroom != "schoolyard" || input == "walk south" && currentroom != "schoolyard") {
			$("<p>Can't go that way.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}
*/

		//at school
		if (input == "go south" && currentroom == "school" || input == "walk south" && currentroom == "school") {
			currentroom = "schoolyard";
			$("<p>You open the door and walk towards the schoolyard.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		} else if (input == "go south" && currentroom != "school" || input == "walk south" && currentroom != "school") {
			$("<p>Can't go that way.</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
			valid_command();
		}

		//Dont understand command
		else if(valid_command == true) {
			$("<p>Invalid command: '" + input + "'</p>").hide().appendTo("#console_cleararea").fadeIn(1000);
		}

	});
});