<!--Include game stylesheet-->
<head>
<link rel="stylesheet" href="./css/game-style.css" type="text/css">
</head>

<?php
//Include db
include './dbhandler.php';

$session = $_SESSION['id'];


$sql = "SELECT * FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			//$id = $row["id"];


//$sql1 = "SELECT * FROM users where id='$id'";
//$result1 = mysqli_query($connection, $sql);
//$row1 = $result1->fetch_assoc();

//Line break
$br = "<br />";
$hr = "<hr>";

//Init vars
$name = $row["name"];
$cash = $row["cash"];
$bank = $row["bank"];
$power = $row["power"];
$bullets = $row["bullets"];

$hoes =  $row["hoes"];
$credits =  $row["credits"];
$homies = $row["homies"];
$country =  $row["country"];

$health =  $row["health"];
$rank =  $row["rank"];
$rankprogress =  $row["rankprogress"];
$profiled =  $row["profiledescription"];
