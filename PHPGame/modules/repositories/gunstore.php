<?php
//Gunstore

//Pistol M1911
if (isset($_POST['M1911'])) {
	if ($health > 0) {
	//Clear echo
	
	//Connect with database
	include './dbhandler.php';
	
	// Start session
	//session_start();
	
	//Get id
	$sql = "SELECT name, cash, power FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$name = $row["name"];
	//$cash = $row["cash"];
	//$power = $row["power"];
	
	if ($cash >= 1000) {
		$power+=50;
		$cash-=1000;
	echo "<a style='color:green'>You bought a M1911 for $1,000 and gained 50 power.</a><br/><br/>";
	echo "<a style='color:green'> You now have "; echo number_format($power, 0, '.', ','); echo " power.</a>";
	$sql = "UPDATE users SET power = power+50 where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash-1000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	//header("refresh:5;url=crimes.php"); 
	
	} else {
	echo "<a style='color:red'>You don't have enough cash to buy a M1911.</a>";
	}
	} else {
	  echo "<a style='color:red'> You cant buy a M1911, you are dead.</a>";
  }
}

//Smg MP5
if (isset($_POST['MP5'])) {
	if ($health > 0) {
	//Connect with database
	include './dbhandler.php';
	
	// Start session
	//session_start();
	
	//Get id
	$sql = "SELECT name, cash FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$name = $row["name"];
	//$cash = $row["cash"];
	
	if ($cash >= 3000) {
	$power+=150;
	$cash-=3000;
	
	echo "<a style='color:green'>You bought a MP5 for $3,000 and gained 150 power.</a><br/><br/>";
	echo "<a style='color:green'> You now have "; echo number_format($power, 0, '.', ','); echo " power.</a>";
	$sql = "UPDATE users SET power = power+150 where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash-3000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	//header("refresh:5;url=crimes.php"); 
	
	} else {
	echo "<a style='color:red'>You don't have enough cash to buy a MP5.</a>";
	}
	} else {
	  echo "<a style='color:red'> You cant buy a MP5, you are dead.</a>";
  }
}

//M1014 Shotgun
if (isset($_POST['M1014'])) {
	if ($health > 0) {
	//Connect with database
	include './dbhandler.php';
	
	// Start session
	//session_start();
	
	//Get id
	$sql = "SELECT name, cash FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$name = $row["name"];
	//$cash = $row["cash"];
	
	if ($cash >= 4000) {
	$power+=300;
	$cash-=4000;
	
	echo "<a style='color:green'>You bought a M1014 shotgun for $4,000 and gained 300 power.</a><br/><br/>";
	echo "<a style='color:green'> You now have "; echo number_format($power, 0, '.', ','); echo " power.</a>";
	$sql = "UPDATE users SET power = power+300 where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash-4000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	//header("refresh:5;url=crimes.php"); 
	
	} else {
	echo "<a style='color:red'>You don't have enough cash to buy a M1014 shotgun.</a>";
	}
	} else {
	  echo "<a style='color:red'> You cant buy a M1014 shotgun, you are dead.</a>";
  }
}

//Rifle AK-47
if (isset($_POST['AK-47'])) {
	if ($health > 0) {
	//Connect with database
	include './dbhandler.php';
	
	// Start session
	//session_start();
	
	//Get id
	$sql = "SELECT name, cash FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$name = $row["name"];
	//$cash = $row["cash"];
	
	if ($cash >= 6000) {
	$power+=500;
	$cash-=6000;
	
	echo "<a style='color:green'>You bought a AK-47 for $6000 and gained 500 power.</a><br/><br/>";
     echo "<a style='color:green'> You now have "; echo number_format($power, 0, '.', ','); echo " power.</a>";
	
	$sql = "UPDATE users SET power = power+500 where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash-6000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	//header("refresh:5;url=crimes.php"); 
	
	} else {
	echo "<a style='color:red'>You don't have enough cash to buy a AK-47.<a/>";
	}
	} else {
	  echo "<a style='color:red'> You cant buy a AK-47, you are dead.</a>";
  }
}

//Explosive RPG
if (isset($_POST['RPG'])) {
	if ($health > 0) {
	//Connect with database
	include './dbhandler.php';
	
	// Start session
	//session_start();
	
	//Get id
	$sql = "SELECT name, cash FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$name = $row["name"];
	//$cash = $row["cash"];
	
	if ($cash >= 10000) {
	$power+=1000;
	$cash-=10000;
	
	echo "<a style='color:green'>You bought an RPG for $10,000 and gained 1000 power.</a><br/><br/>";
     echo "<a style='color:green'> You now have "; echo number_format($power, 0, '.', ','); echo " power.</a>";
	
	$sql = "UPDATE users SET power = power+1000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash-10000 where id='$session'";
	$result = mysqli_query($connection, $sql);
	//header("refresh:5;url=crimes.php"); 
	
	} else {
	echo "<a style='color:red'>You don't have enough cash to buy a RPG.<a/>";
	}
	} else {
	  echo "<a style='color:red'> You cant buy a RPG, you are dead.</a>";
  }
}
?>
<h3>Gunstore</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
<form method="POST" action=''>
    <input type="submit" name="M1911" value="M1911" class="button" onclick="return confirm('<?php echo "Are you sure that you want to buy a M1911 for $1,000 and gain +50 power?"?>')">
</form>

<form method="POST" action=''>
    <input type="submit" name="MP5" value="MP5" class="button" onclick="return confirm('<?php echo "Are you sure that you want to buy a MP5 for $3,000 and gain +150 power?"?>')">
</form>

<form method="POST" action=''>
    <input type="submit" name="M1014" value="M1014" class="button" onclick="return confirm('<?php echo "Are you sure that you want to buy a M1014 shotgun for $4,000 and gain +300 power?"?>')">
</form>

<form method="POST" action=''>
    <input type="submit" name="AK-47" value="AK-47" class="button" onclick="return confirm('<?php echo "Are you sure that you want to buy a AK-47 for $6,000 and gain +500 power?"?>')">
</form>

<form method="POST" action=''>
    <input type="submit" name="RPG" value="RPG" class="button" onclick="return confirm('<?php echo "Are you sure that you want to buy a RPG for $10,000 and gain +1000 power?"?>')">
</form>

<?php
echo "You have $";
echo number_format($cash, 0, '.', ',');
echo " cash.";
echo "<hr/>";
echo "You have ";
echo number_format($power, 0, '.', ',');
echo " power.";
} ?>