<?php
//Bullet factory
$bulletChance = mt_rand(1,50); //One in 50
$bulletAmount = mt_rand(1, 15);

//Chance calc
if (isset($_POST['bullet'])) {
	if ($health > 0) {

    //Chance1
    if ($bulletChance <= 10) {
        //Loss
        echo "<a style='color:red'>You failed to make bullets."."</a>";
    } else {
        // Win
		if ($bulletAmount < 2) {
			echo "<a style='color:green'>You made ".$bulletAmount." bullet."."</a>";
		}else {
			echo "<a style='color:green'>You made ".$bulletAmount." bullets."."</a>";
		}
		$bullets+=$bulletAmount;
        //Add bullets to database
				
				//Connect with database
				include './dbhandler.php';
				
				// Start session
				//session_start();
				
				//Get id
				$sql = "SELECT name FROM users where id='$session'";
				$result = mysqli_query($connection, $sql);
				$row = $result->fetch_assoc();
				$name = $row["name"];
				
				$sql = "UPDATE users SET bullets = bullets + $bulletAmount where id='$session'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:5;url=crimes.php"); 
					}
					} else {
	  echo "<a style='color:red'> You are dead.</a>";
  }
				}

if (isset($_POST['sell'])) {
	if ($health > 0) {

    //Chance1
    if ($bullets < 1) {
        //not enough
        echo "<a style='color:red'>You dont have any bullets to sell."."</a>";
    } else if ($bullets > 0){
        // enough
		//$bullets = $bulletAmount;
		$creditAmount = $bullets/512;
		$credits += $creditAmount;
		echo "<a style='color:green'>You sold ".$bullets." bullets for ".$creditAmount." credits.</a>";
        //Add remove to database
				
				//Connect with database
				include './dbhandler.php';
				
				// Start session
				//session_start();
				
				//Get id
				//$sql = "SELECT * FROM users where id='$session'";
				//$result = mysqli_query($connection, $sql);
				//$row = $result->fetch_assoc();
				//$name = $row["name"];
				
				$sql = "SELECT * FROM users where id='$session'";
				$result = mysqli_query($connection, $sql);
				$row = $result->fetch_assoc();
				
				$sql = "UPDATE users SET bullets = bullets - $bullets where id='$session'";
				$result = mysqli_query($connection, $sql);
				
				$sql = "UPDATE users SET credits = credits + $creditAmount where id='$session'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:5;url=crimes.php"); 
				$bullets -= $bullets;
					}
					} else {
	  echo "<a style='color:red'> You are dead.</a>";
  }
				}
?>
<h3>Bullet factory</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
<form method="POST" action=''>
    <input type="submit" name="bullet" value="Make" class="button">
</form>
<form method="POST" action=''>
    <input type="submit" name="sell" value="Sell" class="button" onclick="return confirm('<?php echo "Are you sure you want to sell all of your bullets for credits?"?>')">
</form>
<?php 
echo "You have ".$bullets." bullets"."";
echo $br;
echo $br;
echo "You have ".$credits." credits"."";
} ?>