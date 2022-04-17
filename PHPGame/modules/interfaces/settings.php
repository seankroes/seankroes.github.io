<?php

//Users 
?>
<h3>Settings</h3>
<hr>
<?php if (isset($_SESSION['id'])) {
	include('.../../dbhandler.php');
	
	if (isset($_POST['edit'])) {
		
		$PD = $_POST['profiled'];
		
		
		//$sql = "SELECT * FROM users where id='$session'";
	     //$result = mysqli_query($connection, $sql);
		//	$row = $result->fetch_assoc();
			
		$sql = "UPDATE users SET profiledescription = '$PD' where id='$session'";
		$result = mysqli_query($connection, $sql);
		$profiled = $PD;
		//$profiledescription = $profiledescriptionedit;
		
		//$sql = "SELECT * FROM users WHERE id='$session'";
		//$result = mysqli_query($connection, $sql);
		
		//$name = $row['name'];
		
	}
	
	echo "Here you can change your settings ";
	echo $name;
	echo ".";
	echo $br;
	echo $hr;
	echo "Toggle:";
	
	?>
	
	<!--Switch-->
	<label class="switch">
	<input type="checkbox" id="musicSwitch" onclick="save();" onmousedown="save();">
	<span class="slider"></span>
	</label>
	<?php
	echo $br;
	echo $br;
	echo "Edit your profile description:";
	?>
	
	<form method="POST" action=''>
    <textarea style="background:black;color:green;height:250px;" type="text" id="profiled" name="profiled" placeholder="Profile description" minlength="0" maxlength="250" size=250" required><?php echo $profiled ?></textarea>
	<input type="submit" name="edit" value="Edit" class="button" onclick="return confirm('<?php echo "Are you sure that you want to change your profile description?"?>')">
	</form>
<?php } ?>