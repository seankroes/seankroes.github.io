<?php
//Hospital
$hospitalChance = mt_rand(1,50); //One in 50

if (isset($_POST['resurrect'])){
			
			//Deposit
			$sql = "SELECT health, credits FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$credits = $row["credits"];
			
			if ($health > 0) {
				echo "<a style='color:red'>You are already alive.</a>";
			} else if ($credits > 74 && $health < 1) {
			//heal
			
			$sql = "SELECT health, credits FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$credits = $row["credits"];
				$sql = "UPDATE users SET health = 100 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$sql = "UPDATE users SET credits = credits - 75 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				echo "<a style='color:green'>You were resurrected for 75 credits and gained +100 health.</a>";
				
				
			//add hp
				$health = 100;
				$credits -= 75;
				//header("refresh:3;"); 
			
		 } else {
			 //echo "<a style='color:red'></a>";
			 echo "<a style='color:red'>You don't have enough credits to be resurrected.</a>";
		 }
		}
		
		if (isset($_POST['haunt'])){
			
			//Deposit
			$sql = "SELECT health, credits FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$credits = $row["credits"];
			
			if ($health > 99) {
				echo "<a style='color:red'>You already have maximum health.</a>";
			} else {
			//heal
			
			$sql = "SELECT health, credits FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$health = $row["health"];
			$credits = $row["credits"];
				$sql = "UPDATE users SET health = health + 1 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				$sql = "UPDATE users SET credits = credits - 25 where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				echo "<a style='color:green'>You gained +1 health and lost -25 credits.</a>";
				
				
			//add hp
				$health += 1;
				$credits -= 25;
				//header("refresh:3;"); 
			
		 }
			 //echo "<a style='color:red'></a>";
		}

?>
<h3>Graveyard</h3>
<?php if (isset($_SESSION['id'])) {

    if ($health < 1){
    echo "<form method='POST' action=''>";
    echo "<input type='submit' name='haunt' value='Haunt' class='button' onclick='return confirm('<?php echo 'Are you sure that you want to haunt the graveyard? you will gain +1 health but lose - credits'?>";
     echo "</form>";
	}
	?>
	<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
	<tr>
	<th>RIP</th>
	<th>Health</th>
	<!--<th>Cash</th>
	<th>Bank</th>
	<th>Rank</th>-->
	</tr>
	</thead>
	<tbody>
	<?php
	include('.../../dbhandler.php');
	
	$sql = "SELECT * FROM users where health < 1";
	$result = mysqli_query($connection, $sql);
	
	while ($row = mysqli_fetch_array($result)) {
		?>
		<tr>
		<td><label><a style="color:gray;" href="profile.php?id=<?php echo $row['id']; ?>"><strike><?php 
		echo $row['name']; ?></strike></a></label></td>
		<td><label><?php 
		
		echo $row['health']; ?>%</label></td>
		<!--<td><label><?php //echo number_format($row['power'], 0, '.', ','); ?></label></td>
		<td><label><?php //echo $row['cash']; ?></label></td>
		<td><label><?php //echo $row['bank']; ?></label></td>
		<td><label><?php //echo $row['rank']; ?></label></td>-->
		</tr>
		</tbody>
		</table']";
	<?php }  echo $br; //}?
	
if ($credits < 75) {
	echo "<a style='color:red'></a>";
	echo "<a style='color:red'>You don't have enough credits for resurrection.</a>";
} else if ($credits > 74) {
	echo "<a style='color:green'></a>";//remove this line and fix this bug
	echo "<a style='color:green'>You have enough credits for resurrection.</a>";
}
 echo $hr;
 echo "Resurrection costs 75 credits, and it will set you to maximum health.";
 echo $hr;
 echo "You have ";
 echo number_format($credits, 0, '.', ',');
 echo " credits.";
 echo $br;
 echo $br;
	?>
<form method="POST" action=''>
    <input type="submit" name="resurrect" value="Resurrect" class="button" onclick="return confirm('<?php echo "Are you sure that you want to be resurrected to maximum health for 75 credits?"?>')">
</form>
<?php
echo $br;
echo $br;
echo "Health: ";
echo $health;
echo "%<progress class='progress-health' value=\"$health\" max=\"100\"></progress>";
} ?>
