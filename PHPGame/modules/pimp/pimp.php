<!--Do the same but with homies-->
<?php
//Pimp
$pimpChance = mt_rand(1,40); //One in 50
$pimpAmount = mt_rand(1,10);

//Chance calc
if (isset($_POST['pimp'])) {
	if ($health > 0) {

    //Chance1
    if ($pimpChance <= 25) {
        //Loss
        echo "<a style='color:red'>You didn't find anything."."</a>";
    } else {
        // Win
		if ($pimpAmount < 2) {
			echo "<a style='color:green'>You found ".$pimpAmount." crate"."</a>";
		} else {
			echo "<a style='color:green'>You found ".$pimpAmount." crates"."</a>";
		}
		$hoes+=$pimpAmount;
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
				
				$sql = "UPDATE users SET hoes = hoes + $pimpAmount where id='$session'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:0;url=pimp.php"); 
					}
					} else {
	  echo "<a style='color:red'> You are dead.</a>";
  }
				}
?>
<h3>Search</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
<form method="POST" action=''>
    <input type="submit" name="pimp" value="Search" class="button">
</form>
<?php 
echo "You have ".$hoes." crates"."";
} ?>