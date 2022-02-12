<?php
session_start();
if(!isset($_SESSION['username'])){
		session_destroy();
		//echo you cannot access that page
		header("Location: admin.php");
} else {
	
?>
<?php include "admin-header.php"?>
<div id="adminHeader">
     <div class="adminWrapper">
         <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a class="danger hvr-grow" href="admin.php?action=logout"?>Log out</a></p>
     </div>
</div>
<p><a class="btnblue hvr-grow" href="admin.php">Back</a></p>
<h2>Enter name or id to remove replie(s):</h2>
    <!--if there are duplicate names then use the id to remove single comments.-->
<br><br>
<form action="" method="POST">
<input type="text" name="name" placeholder="Name or id" required></p>
<p></p>
<p class="antispam"><input type="text" name="antispam" style="display:none;" /></p>
<p></p>
<input type="submit" value="Delete comment" name="submit" onclick="return confirm('Are you sure?')" />
</form>
    <div class="formtext">
<?php
if(isset($_POST["submit"])) {
if(isset($_POST['antispam']) && $_POST['antispam'] == ''){

	//connect with database
	include "connect_comments.php";
	
	//store users in variables
	$name=mysqli_real_escape_string($con,$_POST['name']);
    $id=mysqli_real_escape_string($con,$_POST['name']);
	
	$query=mysqli_query($con,"SELECT * FROM comments WHERE name='".$name."' OR id='".$id."'");
	$numrows=mysqli_num_rows($query);
	if(!$numrows==0) {
		//$encrypt = password_hash($pass, PASSWORD_DEFAULT); (add $encrypt below)
		$sql="DELETE FROM comments WHERE name = '$name' OR id = '$id'";
		$result=mysqli_query($con,$sql);
if($result){

	//Makes page refresh
	echo "<meta http-equiv='refresh' content='0'>";
	exit;
echo "<div class=\"errorMessage\">Reply successfully removed.</div>";
} else {
echo "<div class=\"errorMessage\">Failed to delete reply.</div>";
}
} else {
echo "<div class=\"errorMessage\">That name or id doesn't exist. Please try again.</div>";
}
} else {
echo  "<div class=\"errorMessage\">Spam detected.</div>";
}
}
?>

<br>

<!--Show Comments-->
<?php
	//connect with database
	include "connect_comments.php";
	$sql = "SELECT * FROM comments ORDER BY date DESC";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo "<hr>" . "<strong><a>id:</a>" . htmlspecialchars($row["id"]) . "<strong> <a>name:</a>" . htmlspecialchars($row["name"]) .  "</strong> <br> " .  " <a>reply:</a>" . htmlspecialchars($row["comment"]) . "<br>";
	 //like button
	 //echo '<input type="submit" name="like" value="like"/>';
	 }
} else {
    echo "<h2>No replies yet.</h2>";
}
?>
</div>
<?php include "admin-footer.php" ?>
<?php } ?>