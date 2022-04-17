<!--Include stylesheet-->
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<?php
//Include template header
include 'template/template-header.php';

//Include and prevent form resubmission
include 'js/no_form_resubmission.php';

 $logout_button = "<form action='logout.php' method='POST'> <button href='logout.php'>Logout</button>";
 //echo $logout_button;

//Include and initialize variables
include 'var/var.php';

?>
<?php if (isset($_SESSION['id'])) {
	if(isset($_GET['id'])){
		
	$uid = $_GET['id'];
		
	$sql = "SELECT * FROM users WHERE id='$uid'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_array($result);
	
	?>
	
	
    <h3><? if ($row['name'] == 'Sean') {
    echo '<i style="
	
	color: cyan;
  text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;

	
	
	">' . '<img src="https://cdn.runescape.com/assets/img/external/oldschool/2015/security_page/Jmod.png">' . $row['name'] /* ;  Remove gray to have entire page colored*/ . '</i>';
} else {
	
echo $row['name']; } ?>'s profile</h3>
    <hr>
	
	<?php
	//echo $_SESSION['id'];
	echo $row['profiledescription'];
	echo $br;
	echo $hr;
	echo "Health: ";
	//$profilehealth = "$row['health']";
	echo $row['health']; echo "%<progress class='progress-health' value=\"";
	echo $row['health'];
    echo "\" max=\"100\"></progress>";
	echo $br;
	echo $hr;
	echo "Country: ";
	echo $row['country'];
	echo $br;
	echo $hr;
	echo "Rank: ";
	if ($row['name'] == 'Sean') {
    echo '<i style="
	
	color: cyan;
  text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;

	
	
	">' . '<img src="https://cdn.runescape.com/assets/img/external/oldschool/2015/security_page/Jmod.png">' . 'Admin/Dev' . '</i>'; //$row['rank'] /* ;  Remove gray to have entire page colored*/ . '</i>';
} else {
	
echo $row['rank']; }
	echo $br;
	echo $hr;
	echo "Progress: ";
	//echo $row['health'];
	echo $row['rankprogress']; echo "%<progress class='progress-rank' value=\"";
	echo $row['rankprogress'];
	echo "\" max=\"100\"></progress>";
	echo $br;
	echo $hr;
	echo "$";
	echo number_format($row['cash'], 0, '.', ',');
	echo " cash";
	echo $br;
	echo $hr;
	echo "$";
	echo number_format($row['bank'], 0, '.', ',');
	echo " in the bank";
	echo $br;
	echo $hr;
	echo number_format($row['power'], 0, '.', ',');
	echo " power";
	echo $br;
	echo $hr;
	echo number_format($row['bullets'], 0, '.', ',');
	echo " bullets";
	echo $br;
	echo $hr;
	echo number_format($row['hoes'], 0, '.', ',');
	echo " crates";
	echo $br;
	echo $hr;
	echo number_format($row['homies'], 0, '.', ',');
	echo " homies";
	echo $br;
	echo $hr;
	echo number_format($row['credits'], 0, '.', ',');
	echo " credits";
	echo $br;
	?>
	<?php
	include('dbhandler.php');
	
	$sql = "SELECT * FROM users where id='$id'";
	
	
	} else {
	echo "User not found!";
	exit();
	}
}
   ?>

<?php
//Include template footer
include 'template/template-footer.php';
?>