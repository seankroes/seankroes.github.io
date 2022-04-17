<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Homepage</title>
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<!--Include fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="css/style.css">-->
<link rel="stylesheet" type="text/css" id="pagestyle" href="template/css/dark.css">
</head>
<body>
<!--Navigation left-->
<!--Start session-->
<?php session_start();

if (isset($_SESSION['id'])) {
?>

<div class="sidenav-left">
    <a href="index.php" class="home"> Home</a>
	<a href="#" class="mail"> <strike>Mail</strike></a>
    <a href="users.php" class="users"> Users</a>
	<hr>
    <a href="gunstore.php" class="gunstore"> Gun store</a>
    <a href="bank.php" class="bank"> Bank</a>
	<a href="bulletfactory.php" class="bulletfactory"> Bullet factory</a>
    <a href="onlinemarket.php" class="onlinemarket">Online market</a>
    <a href="hospital.php" class="hospital"> Hospital</a>
	<a href="graveyard.php" class="graveyard"> Graveyard</a>
	<a href="airport.php" class="airport"> Airport</a>
	<hr>
	<a href=""> <strike>Inventory</strike></a>
   <a href="settings.php"> Settings</a>
	<hr>
</div>

<!--Navigation right-->
<div class="sidenav-right">
    <a href="crimes.php" class="crimes"> Crimes</a>
    <a href="stealcar.php" class="stealcar"> Steal car</a>
	<a href="pimp.php"> Search</a>
	<a href="territory.php"> Territory</a>
	<hr>
    <a href="#"> <strike>Heist</strike></a>
	<a href="#"> <strike>Driveby</strike></a>
    <a href="#"> <strike>Missions</strike></a>
	<a href="#" class="streetrrace"> <strike>Street race</strike></a>
	<hr>
	<a href="#"> <strike>Garage</strike></a>
	<a href="#"> <strike>Car dealer</strike></a>
	
	<a href="#"> <strike>Auction</strike></a>
	<hr>
</div>
<?php }?>

<div class="main">
<div class="wrapper">
<h2 class="title">Online PHP RPG Demo v0.1</h2>