<!--Include stylesheet-->
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<?php
//Include template header
include 'template/template-header.php';

//Include and prevent form resubmission
include 'js/no_form_resubmission.php';

//Include and initialize variables
include 'var/var.php';

//Include and display variables
include 'var/var_display.php';
?>

<hr>
<?php
/*Repositories*/

//Include and display gun store
include 'modules/repositories/gunstore.php';

//Include and display online market
include 'modules/repositories/onlinemarket.php';

//Include and display bullet factory
include 'modules/repositories/bulletfactory.php';

?>

<?php
/*Crimes and other stuff*/

//Include and display default crime
include 'modules/crime/crime.php';

//Include and display carjacking
include 'modules/crime/carjacking.php';

//Include and display pimp
include 'modules/pimp/pimp.php';

//Include and display jail
include 'modules/jail/jail.php';

//Include and display heist
include 'modules/crime/heist.php';

//Include and display shootout
include 'modules/crime/shootout.php';

//Include template footer
include 'template/template-footer.php';
?>