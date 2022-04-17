<?php
//Connect with database
include 'dbhandler.php';

// Start session
session_start();

//include with mysql injection prevention
$name = mysqli_real_escape_string($connection, $_POST['name']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

//Decrypt

$sql = "SELECT * FROM users WHERE name='$name'";
$result = mysqli_query($connection, $sql);
$row = $result->fetch_assoc();
$hash = $row['password'];
$decrypt = password_verify($password,$hash);
if ($decrypt == 0) {
	//Your username or password is incorrect
	echo "Incorrect credentials";
} else {

$sql = "SELECT * FROM users WHERE name='$name' AND password='$hash'";
$result = mysqli_query($connection, $sql);

}
//goto home
/*header("Location: index.html");*/

//Br
$br = "<br><br>";

//Check if logged in
if (!$row = mysqli_fetch_assoc($result)) {
	header("Location: index.php");
	echo "Your username or password is incorrect.";
} else {
	$_SESSION['id'] = $row['id'];
	header("Location: index.php");
}
?>
