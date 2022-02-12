<html>

<head>

  <link rel="stylesheet" type="text/css" href="style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

  <link href="hover.css" rel="stylesheet" media="all">

</head>

<body>

<!-- Cookie notice -->
<?php include 'cookie_notice.php';?>
<!-- End Cookie notice -->

<!--Show scroll up button-->
<?php include "scrollup.php";?>

<div class="headerwrapper">

      <div class="header">

    

      <div class="menuWrap">

        <div class="menu open">

          </div>

        </div>


          <a href="index.php" class="hvr-float-shadow">William Justice Bruehl</a>

      </div>

      </div>

    </div>

<div class="nav">

<ul>

  <li><a href="/"><i class="fas fa-home"></i> Home</a></li>
  
  <li><a href="blog.php"><i class="fab fa-blogger-b"></i> Blog</a></li>
  
  <li><a target="_blank" href="comments.php"><i class="fas fa-reply"></i> Reply</a></li>

  <li><a target="_blank" href="https://www.amazon.com/default/e/B001HO9K5O?redirectedFromKindleDbs=true"><i class="fas fa-shopping-basket"></i> Order</a></li>

  <li><a href="plays.php"><i class="fas fa-info-circle"></i> Plays</a></li>

  <li><a href="mailto:contact@billbruehl.com"><i class="fas fa-envelope"></i> Contact</a></li>

</ul>

  </div>

<!--<br>-->
    <div class="modal"> 
	<div class="formtext">
<form action="" method="POST">
<input type="text" name="name" placeholder="Name" required>
<p></p>
<textarea type="text" name="comment"  cols="30" rows="10" placeholder="Leave a reply" required></textarea>
<p></p>

<?php
//init captcha variables
	$min_number = 0;
	$max_number = 5;
	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>
<?php
	
//captcha form
	echo $random_number1 . ' + ' . $random_number2 . ' = ';
?>
<input type="number" style="margin-top: 0%;" name="captchaResult" class="captchaResult" type="text" size="2" placeholder="?" required>
<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
<p class="antispam" style="display:none;"><input type="text" name="antispam" /><a>(captcha)</a></p>
<p></p>
<input type="submit" value="Reply" name="submitcomment" />
</form>

  </div>
 <div class="error">
<?php
if(isset($_POST["submitcomment"])) {
if(isset($_POST['antispam']) && $_POST['antispam'] == ''){
if(!empty($_POST['name']) && !empty($_POST['comment'])) {

	
		//check captcha if the answer is valid
	$captchaResult = $_POST["captchaResult"];
	$firstNumber = $_POST["firstNumber"];
	$secondNumber = $_POST["secondNumber"];
	$checkTotal = $firstNumber + $secondNumber;
	
if ($captchaResult == $checkTotal) {
	
	

	//connect with database
	include "connect_comments.php";
	
	//store users in variables
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	
	$date = time();
	
	$query=mysqli_query($con,"SELECT * FROM comments WHERE name='".$name."'");
	$numrows=mysqli_num_rows($query);
if($numrows==0)
	{
		$sql="INSERT INTO comments(name,comment,date) VALUES('$name','$comment','$date')";
		$result = mysqli_query($con,$sql);
if($result){
//echo "Entry successfully added.";
	//Makes page refresh
	echo "<meta http-equiv='refresh' content='0'>";
} else {
//echo "Failed add entry.";
}
} else {
echo "That username already exists. Please try again.";
}
} else {
echo "Wrong captcha. Please try again.";
}
} else {
echo "Please fill out all the fields.";
}
}else {
echo "Spam detected.";	
}
}
?>

</div>

    <div class="formtext">

<!--Show Comments-->
<?php
	//connect with database
	include "connect_comments.php";
	$sql = "SELECT * FROM comments ORDER BY date DESC";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		
    while($row = mysqli_fetch_assoc($result)) {
    echo "<hr>" . "<strong>" . htmlspecialchars($row["name"]) .  "</strong> <br>" .  "" . htmlspecialchars($row["comment"]) . "<br>";
	 //like button
	 //echo '<input type="submit" name="like" value="like"/>';
	 
	 }
} else {
    echo "<h3>There are no replies yet.</h3>";
}

//like system
if($_POST['like']) {
	include "connect_comments.php";
	$sql = "UPDATE comments SET likes = 'likes+1' WHERE id='$id'";
	$result = mysqli_query($con, $sql);
}
?>
  </div>
  </div>
<br><br>
<br><br>

<div class="footer">

  Copyright 2018 - Bruehl

  </div>

</body>

</html>