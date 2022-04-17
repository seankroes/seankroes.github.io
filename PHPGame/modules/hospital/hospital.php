<?php
//Hospital
$hospitalChance = mt_rand(1,50); //One in 50

if (isset($_POST['heal'])){
			
			//Deposit
			$sql = "SELECT health, cash FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$cash = $row["cash"];
			
			if ($health < 1 ) {
				echo "<a style='color:red'>You are dead. You can get resurrected at the graveyard.</a>";
			} else if ($health > 99) {
				echo "<a style='color:green'>You already have maximum health.</a>";
			} else if ($cash > 249 && $health > 0) {
			//heal
			
			$sql = "SELECT health, cash FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$cash = $row["cash"];
			
			if ($health > 90) {
				$sql = "UPDATE users SET health = 100 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$health = 100;
			} else {
				$sql = "UPDATE users SET health = health + 10 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$health += 10;
			}
				$sql = "UPDATE users SET cash = cash - 250 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				echo "<a style='color:green'>You were healed for +10 health.</a>";
				
				
			//add hp
				
				$cash -= 250;
				//header("refresh:3;"); 
			
		 } else {
			 echo "<a style='color:red'>You don't have enough cash for treatment.</a>";
		 }
		}
		 
		 if (isset($_POST['damage'])){
			 if ($health > 0) {
			 //Withdraw
			$sql = "SELECT health FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			
			//$bankvalue_no_negative = $_POST['withdraw-value'];
			//$cashvalue = max($bankvalue_no_negative,0);
			
			if ($health < 1 ) {
				echo "<a style='color:red'>You are already dead.</a>";
			} else {
			//Get remove cash
			
			$sql = "SELECT health FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
				$sql = "UPDATE users SET health = health - 10 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				
			$health -= 10;	
			echo "<a style='color:red'>You were damaged for -10 health.</a>";
				//header("refresh:3;"); 
		 }
		 } else {
	  echo "<a style='color:red'> You are already dead.</a>";
  }
		 }

?>
<h3>Hospital</h3>
<hr>
<?php if (isset($_SESSION['id'])) {
	echo "You have $";
	echo number_format($cash, 0, '.', ',');
	echo " cash.";
	echo $br;
	echo $hr;
if ($cash < 250) {
	echo "<a style='color:red'>You don't have enough cash to get treatment.</a>";
} else if ($cash > 249) {
	echo "<a style='color:green'>You have enough cash to get treatment.</a>";
}
 echo "<br><br>";
 echo "Treatment costs $250 for +10 health.";
 echo "<br/>";
 echo $br;
	?>
<form method="POST" action=''>
    <input type="submit" name="heal" value="Heal +10" class="button" onclick="return confirm('<?php echo "Are you sure that you want to be healed +10 health for $250?"?>')">
</form>
<form method="POST" action=''>
    <input type="submit" name="damage" value="Damage" class="button" onclick="return confirm('<?php echo "Are you sure that you want to be damaged for -10 health? (this is for testing purposes.)"?>')">
</form>
<?php 
echo "Health: ";
echo $health;
echo "%<progress class='progress-health' value=\"$health\" max=\"100\"></progress>";
} ?>