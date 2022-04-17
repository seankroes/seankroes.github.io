<!--Include stylesheet-->
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<?php
//Include template header
include 'template/template-header.php';

 if (!isset($_SESSION['id'])) {
	 echo "Welcome!";
	 echo "<br><br>";
	 $signin = "<form action='login.php' method='POST'>
		  <input type='text' name='name' value='' placeholder='Username' required>
		  <input type='password' name='password' value='' placeholder='Password' required><br/>
		  <button>SIGN IN</button></form>";
		 
			 echo "$signin";
			 
			 include 'register.php';

 }
 
 
 
 if (isset($_SESSION['id'])) {
 $session = $_SESSION['id'];
//Logout button
 $logout_button = "<form action='logout.php' method='POST'> <button href='logout.php'>Logout</button><br><br>";
 echo $logout_button;
 
//Include and prevent form resubmission
include 'js/no_form_resubmission.php';

//Include and initialize variables
include 'var/var.php';

//Include and display variables
include 'var/var_display.php';

 } else {
	echo '<audio id="musicSource" src="https://www.chosic.com/wp-content/uploads/2020/07/the-epic-2-by-rafael-krux.mp3" align="baseline" border="0" width="145" height="60" autostart="true" volume="0.5" loop="true" autoplay></audio><script>var audio = document.getElementById("musicSource"); audio.volume = 0.2;</script';
 }
 

//Include template footer
include 'template/template-footer.php';
?>