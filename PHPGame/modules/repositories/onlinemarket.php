<?php
//Bank
/*
if (isset($_POST['bank'])) {

    //Bank system
    if () {
        //Deposit
    } else if () {
        // Win
        $cashWin = mt_rand(1,5000000);
        echo "<a style='color:green'> You stole $".number_format($cashWin, 0, '.', ',').".</a>";
        //Add cash to database
		
				//Connect with database
				include './dbhandler.php';
				
				// Start session
				//session_start();
				
				//Get id
				$sql = "SELECT name FROM users";
				$result = mysqli_query($connection, $sql);
				$row = $result->fetch_assoc();
				$cash = $row["cash"];
				$bank = $row["bank"];
				
				$sql = "UPDATE users SET cash = cash + $cashWin where name='$name'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:5;url=crimes.php"); 
					}
				}*/
				
					//include('./dbhandler.php');
					$session = $_SESSION['id'];
					//echo $session;
					//echo $name;
					//echo $session;
	
		if (isset($_POST['send'])){
			if ($health > 0) {
			
			//Deposit
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$sendValue = $_POST['send-value'];
			
			if ($bank < $sendValue) {
				echo "<a style='color:red'>You don't have enough money to send.</a>";
			} else {
			//Get remove cash
			
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$sendvalue = $_POST['send-value'];
			$sendusername = $_POST['send-username'];
				$sql = "UPDATE users SET bank = bank - $sendvalue where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				
				
			//add cash
				$sql = "UPDATE users SET bank = bank + $sendvalue where name='$sendusername'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				//header("refresh:0;");
				echo "<a style='color:green'>You successfully sent "; echo $sendvalue; echo "$ to "; echo $sendusername; echo "</a>";
			
		 }
		 } else {
	  echo "<a style='color:red'> You cant access the online market, you are dead.</a>";
  }
		}
  ?>

<h3>Online market</h3>
<?php if (isset($session)) {
	$sql = "SELECT * FROM users where id='$session'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	
	//Init vars
	$bank = $row["bank"];
	echo "You have $";
	echo number_format($bank, 0, '.', ',');
	echo " in the bank.";
	echo $br;
	echo $hr;
if ($bank < 1) {
	echo "<a style='color:red'>You don't have enough money in the bank to send to other users.</a>";
} else if ($bank > 1) {
	echo "Here you can send money to other users, just enter their username and the amount.";
}
echo "<br><br>";
?>


<form method="POST" action=''>
    <input type="text" id="username" name="send-username" value="" placeholder="Username" required>
    <input type="number" min="0" name="send-value" value="0">
	<input type="submit" name="send" value="Send" class="button" onclick="return confirm('<?php echo "Are you sure that you want to send money to this user?"?>')">
</form>

<!--Inlcude prevent minus values-->
<script>
var myInput = document.querySelectorAll("input[type=number]");

function keyAllowed(key) {
  var keys = [8, 9, 13, 16, 17, 18, 19, 20, 27, 46, 48, 49, 50,
    51, 52, 53, 54, 55, 56, 57, 91, 92, 93
  ];
  if (key && keys.indexOf(key) === -1)
    return false;
  else
    return true;
}

myInput.forEach(function(element) {
  element.addEventListener('keypress', function(e) {
    var key = !isNaN(e.charCode) ? e.charCode : e.keyCode;
    if (!keyAllowed(key))
      e.preventDefault();
  }, false);

  // Disable pasting of non-numbers
  element.addEventListener('paste', function(e) {
    var pasteData = e.clipboardData.getData('text/plain');
    if (pasteData.match(/[^0-9]/))
      e.preventDefault();
  }, false);
})
</script>

<?php } ?>