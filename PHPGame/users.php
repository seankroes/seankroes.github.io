<!--Include stylesheet-->
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<?php
//Include template header
include 'template/template-header.php';

//Include and prevent form resubmission
include 'js/no_form_resubmission.php';

if (isset($_SESSION['id'])) {
	$logout_button = "<form action='logout.php' method='POST'> <button href='logout.php'>Logout</button>";
	echo $logout_button;
}

//Include and initialize variables
include 'var/var.php';

//Include and display pimp
include 'modules/interfaces/users.php';

//Include template footer
include 'template/template-footer.php';
?>