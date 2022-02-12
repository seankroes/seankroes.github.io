	<?php
//Connect with database
	$con=mysqli_connect("localhost","billbrue_comment",";R0Uu1'9o,5]h-8>5") or die(mysqli_error());
	mysqli_select_db($con,"billbrue_comments") or die("Cannot select database");
	?>
	
	
<?php
	//local connect with database
	//$con=mysqli_connect('127.0.0.1','root','') or die(mysqli_error());
	//mysqli_select_db($con,'commentdb') or die("Cannot connect");
?>