<?php
//Airport

if (isset($_POST['fly'])) {
	if ($cash > 2499) {
	if ($health > 0) {
	
	$radioVal = $_POST["val"];
	
	//include './dbhandler.php';
	
	$sql = "SELECT country, cash FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$country = $row["country"];
	$cash = $row['cash'];
	
	//USA
	if ($radioVal == 'USA' && $country != 'USA') {
	//FLY USA
	echo "<a style='color:green'>You are flying to the United States"."</a>";
	$country = "USA";
	$cash -= 2500;
	
	// Start session
	//session_start();
	
	//Get id
	
	
	$sql = "UPDATE users SET country = 'USA' where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash - 2500 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
	
	
	} else if ($radioVal == 'USA') {
	// Already there
	echo "<a style='color:red'>You are already in the United States"."</a>";
	}
	
	//France
	if ($radioVal == 'France' && $country != 'France') {
	//FLY france
	echo "<a style='color:green'>You are flying to France"."</a>";
	$country = "France";
	$cash -= 2500;
	// Start session
	//session_start();
	
	//Get id
	
	$sql = "UPDATE users SET country = 'France' where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash - 2500 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
	
	
	} else if ($radioVal == 'France'){
	// Already there
	echo "<a style='color:red'>You are already in France"."</a>";
	}
	
	//Russia
	if ($radioVal == 'Russia' && $country != 'Russia') {
	//FLY Russia
	echo "<a style='color:green'>You are flying to Russia"."</a>";
	$country = "Russia";
	$cash -= 2500;
	// Start session
	//session_start();
	
	//Get id
	
	
	$sql = "UPDATE users SET country = 'Russia' where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash - 2500 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
	
	
	} else if ($radioVal == 'Russia'){
	// Already there
	echo "<a style='color:red'>You are already in Russia"."</a>";
	}
	
	//Italy
	if ($radioVal == 'Italy' && $country != 'Italy') {
	//FLY Italy
	echo "<a style='color:green'>You are flying to Italy"."</a>";
	$country = "Italy";
	$cash -= 2500;
	// Start session
	//session_start();
	
	//Get id
	
	$sql = "UPDATE users SET country = 'Italy' where id='$session'";
	$result = mysqli_query($connection, $sql);
	
	$sql = "UPDATE users SET cash = cash - 2500 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
	
	
	} else if ($radioVal == 'Italy') {
	// Already there
	echo "<a style='color:red'>You are already in Italy"."</a>";
	}
	} else {
	echo "<a style='color:red'> You cant fly, you are dead.</a>";
	}
	} else {
	echo "<a style='color:red'> You dont have enough cash to fly.</a>";
	}
}
?>
<h3>Airport</h3>
<hr>
<?php if (isset($_SESSION['id'])) {
	
if ($cash < 2500) {
	echo "<a style='color:red'></a>";
	echo "<a style='color:red'>You don't have enough cash to fly.</a>";
} else if ($cash > 2499) {
	echo "<a style='color:green'></a>";//remove this line and fix this bug
	echo "<a style='color:green'>You have enough cash to fly.</a>";
}
 echo $hr;
 echo "Flying costs $2,500 cash.";
 echo $hr;
 echo "You have $";
 echo number_format($cash, 0, '.', ',');
 echo " cash.";
 echo $br;
 echo $br;
 ?>
<form method="POST" action=''>
    <input type="radio" name="val" value="USA" checked>USA<br>
	<hr>
    <input type="radio" name="val" value="France">France<br>
	<hr>
    <input type="radio" name="val" value="Russia">Russia<br>
	<hr>
    <input type="radio" name="val" value="Italy">Italy<br><br>
    <input type="submit" name="fly" value="fly"  class="button" onclick="return confirm('<?php echo "Are you sure that you want to fly for $2,500 cash?";?>')">
</form>

<?php echo "You are in ".$country.""; } ?>