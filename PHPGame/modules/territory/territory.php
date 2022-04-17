<?php
//Pimp
$homieChance = mt_rand(1,15); //One in 50
$homieAmount = mt_rand(1,10);

//Chance calc
if (isset($_POST['homies'])) {
	if ($health > 0) {

    //Chance1
    if ($homieChance <= 10) {
        //Loss
        echo "<a style='color:red'>You failed to find homies."."</a>";
    } else {
        // Win
		if ($homieAmount < 2) {
			echo "<a style='color:green'>You found ".$homieAmount." homie"."</a>";
		}
		else {
			echo "<a style='color:green'>You found ".$homieAmount." homies"."</a>";
		}
		$homies+=$homieAmount;
        //Add hoes to database
				
				//Connect with database
				include './dbhandler.php';
				
				// Start session
				//session_start();
				
				//Get id
				$sql = "SELECT name FROM users where id='$session'";
				$result = mysqli_query($connection, $sql);
				$row = $result->fetch_assoc();
				$name = $row["name"];
				
				$sql = "UPDATE users SET homies = homies + $homieAmount where id='$session'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:0;url=crimes.php"); 
					}
					} else {
	  echo "<a style='color:red'> You are dead.</a>";
  }
				}
?>
<h3>Territory</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
<form method="POST" action=''>
    <input type="submit" name="homies" value="Search" class="button">
</form>
<?php 
echo "You have ".$homies." homies"."";
} ?>