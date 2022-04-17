<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

	  
//init captcha variables
	$min_number = 0;
	$max_number = 5;
	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>
<form action="" method="POST">
<input type="text" name="user" placeholder="Username" required><br />
<input type="password" name="pass" placeholder="Password" required><br />
<!Resolve the captcha below:!>
<?php
//captcha form
	echo $random_number1 . ' + ' . $random_number2 . ' = ';
?>
<input name="captchaResult" type="text" size="2" placeholder="?" required>
<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
<p class="antispam"><input type="text" name="antispam" /></p>
<button type="submit" value="SIGN UP" name="submit">SIGN UP</button>
</form>

<?php
if(isset($_POST["submit"])) {
if(isset($_POST['antispam']) && $_POST['antispam'] == ''){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	
	//check captcha if the answer is valid
	$captchaResult = $_POST["captchaResult"];
	$firstNumber = $_POST["firstNumber"];
	$secondNumber = $_POST["secondNumber"];
	$checkTotal = $firstNumber + $secondNumber;
	
if ($captchaResult == $checkTotal) {
	//captcha is ok - connect with database
	
	//connect with database
	//include "con_db.php";
	
	//Connect with database
      include 'dbhandler.php';
	
	//store users in variables
	$user=mysqli_real_escape_string($connection,$_POST['user']);
	$user = preg_replace('/[^a-z]/i', '', $user);
	$pass=mysqli_real_escape_string($connection,$_POST['pass']);
	
	$query=mysqli_query($connection,"SELECT * FROM users WHERE name='".$user."'");
	$numrows=mysqli_num_rows($query);
if($numrows==0)
	{
		//$ip = $_SERVER['REMOTE_ADDR'];
		$ip = isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '127.0.0.1';
		$encrypt = password_hash($pass, PASSWORD_DEFAULT);
		//$sql="INSERT INTO login(username,email,bdate,country,password,ip) VALUES('$user','$mail','$bdate','$country','$pass','$ip')";
	    //$sql="INSERT INTO users(name, password, cash, bank, power, bullets, hoes, credits, homies, country, health, rank, rankprogress, murderexpierence, ip) VALUES('$user', '$encrypt', '0', '0', '0', '0', '0', '100', '0', 'USA', '100', 'Hood rat', '0', '0', '$ip')";
		//$sql="INSERT INTO users (name, password, cash, bank, power, bullets, hoes, credits, homies, country, health, rank, rankprogress, murderexpierence, ip) VALUES ('$user', '$encrypt', '0', '0', '0', '0', '0', '100', '0', 'USA', '100', 'Hood rat', '0', '0', '$ip')";
		$sql="INSERT INTO users (`name`, `password`, `cash`, `bank`, `power`, `bullets`, `hoes`, `credits`, `homies`, `country`, `health`, `rank`, `rankprogress`, `murderexpierence`, `ip`) VALUES ('$user', '$encrypt', '0', '0', '0', '0', '0', '100', '0', 'USA', '100', 'Hood rat', '0', '0', '$ip')";
		$result=mysqli_query($connection,$sql);
		//$connection->query('SET AUTOCOMMIT = 1');
if($result){
echo "<a style='color:green'>Account successfully created.</a>";
//echo "<p></p>";
//echo "You will be redirected in a few seconds";
//header("refresh:3;url=login.php"); 
} else {
echo "<a style='color:'>Failed to create account.</a>";
//echo $sql;
}
} else {
echo "<a style='color:red'>That username already exists. Please try again.</a>";
}
} else {
echo "<a style='color:red'>Wrong captcha.</a>";
}
} else {
echo "<a style='color:red'>Please fill out all the fields.</a>";
}
} else {
echo "<a style='color:red'>Spam detected.</a>";
}
}
	?>