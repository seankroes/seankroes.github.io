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
	
		if (isset($_POST['deposit'])){
			if ($health > 0) {
			
			//Deposit
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$cashvalue = $_POST['deposit-value'];
			
			if ($cash < 1 || $cashvalue < 1 || $cashvalue > $cash) {
				echo "<a style='color:red'>You don't have enough cash to deposit.</a>";
			} else {
			//Get remove cash
			
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$cashvalue = $_POST['deposit-value'];
				$sql = "UPDATE users SET cash = cash - $cashvalue where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				
				
			//add cash
				$sql = "UPDATE users SET bank = bank + $cashvalue where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				header("refresh:0;"); 
			
		 }
		 } else {
	  echo "<a style='color:red'> You cant deposit money, you are dead.</a>";
  }
		}
		 
		 if (isset($_POST['withdraw'])){
			 if ($health > 0) {
			 //Withdraw
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$bankvalue = $_POST['withdraw-value'];
			
			//$bankvalue_no_negative = $_POST['withdraw-value'];
			//$cashvalue = max($bankvalue_no_negative,0);
			
			if ($bank <= 0 || $bankvalue < 1 || $bankvalue > $bank) {
				echo "<a style='color:red'>You don't have enough money to withdraw.</a>";
			} else {
			//Get remove cash
			
			$sql = "SELECT cash, bank FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$cash = $row["cash"];
			$bank = $row["bank"];
			$bankvalue = $_POST['withdraw-value'];
				$sql = "UPDATE users SET bank = bank - $bankvalue where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				
				
			//add cash
				$sql = "UPDATE users SET cash = cash + $bankvalue where id='$session'";
				//$sql = "UPDATE users SET rankprogress = rankprogress + 5 where name='$name'";
				$result = mysqli_query($connection, $sql);
				header("refresh:0;"); 
		 }
		 } else {
	  echo "<a style='color:red'> You cant withdraw money, you are dead.</a>";
  }
		 }
  ?>

<h3>Bank</h3>
<?php if (isset($session)) {
$sql = "SELECT * FROM users where id='$session'";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();

//Init vars
$cash = $row["cash"];
$bank = $row["bank"];
echo "You have $";
echo number_format($cash, 0, '.', ',');
echo " cash.";
echo $br;
echo $hr;
echo "You have $";
echo number_format($bank, 0, '.', ',');
echo " in the bank.";
echo "<br><br>";
?>


<form method="POST" action=''>
    <input type="number" min="0" name="deposit-value" value="<?php echo $cash;?>">
	<input type="submit" name="deposit" value="Deposit" class="button">
</form>
<hr>
<form method="POST" action=''>
    <input type="number" min="0" name="withdraw-value" value="<?php echo $bank;?>">
    <input type="submit" name="withdraw" value="Withdraw" class="button">
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