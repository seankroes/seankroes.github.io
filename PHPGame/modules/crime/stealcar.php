<?php
//Crime
$loseChance = mt_rand(1,100); // One in 100
$jailChance = mt_rand(0,1); //50% chance


$winChance1 = mt_rand(1,100); //One in 100
$winChance2 = mt_rand(1,100); //One in 100
$winChance3 = mt_rand(1,100); //One in 100
$winChance4 = mt_rand(1,100); //One in 100

//Chance calc
if (isset($_POST['steal'])) {
	if ($health > 0) {
	
    //Chance1
    if ($winChance1 < $loseChance) {
	//Loss
	if ($jailChance) {
	// Set free
	echo "<a style='color:orange'>You were almost caught by the police. You lost -30 health."."</a>";
	//Remove health
			$sql = "SELECT health FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$sql = "UPDATE users SET health = health - 30 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$health -= 30;
	} else {
	// Go jail
	echo "<a style='color:red'>You got caught and sent to jail. You lost -40 health."."</a>";
	//Remove health
			$sql = "SELECT health FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$sql = "UPDATE users SET health = health - 40 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$health -= 40;
	}
    } else {
		// Win
		$cashWin = mt_rand(1,15000);
		echo "<a style='color:green'> You stole $".number_format($cashWin, 0, '.', ',').".</a>";
		$cash += $cashWin;
		//Add cash to database
		
		//Connect with database
		include './dbhandler.php';
		
		// Start session
		//session_start();
		
		//Get id
		$sql = "SELECT name, rankprogress FROM users where id='$session'";
		$result = mysqli_query($connection, $sql);
		$row = $result->fetch_assoc();
		$name = $row["name"];
		$rankprogress = $row["rankprogress"];
		
		$sql = "UPDATE users SET cash = cash + $cashWin where id='$session'";
		//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
		$result = mysqli_query($connection, $sql);
		//header("refresh:5;url=crimes.php"); 
    }
	} else {
	  echo "<a style='color:red'> You are dead.</a>";
  }
}
?>
<h3>Steal car</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
<form method="POST" action=''>
    <input type="radio" name="val" value="1" checked>Steal from a parking lot<br>
	<hr>
    <input type="radio" name="val" value="2">Break into a parking garage<br>
	<hr>
    <input type="radio" name="val" value="3">Steal car at a stoplight<br>
	<hr>
    <input type="radio" name="val" value="4">Break into someones garage<br>
	<hr>
    <input type="submit" name="steal" value="Steal" class="button">
</form>
<?php 
echo "Health: ";
echo $health;
echo "%<progress class='progress-health' value=\"$health\" max=\"100\"></progress>";
 } ?>