<!--Include stylesheet-->
<link rel="stylesheet" type="text/css" href="template/css/style.css">

<?php
//Include template header
include 'template/template-header.php';

//Include and prevent form resubmission
include 'js/no_form_resubmission.php';

//Include and initialize variables
include 'var/var.php';

//Include and display onlinemarket
include 'modules/repositories/onlinemarket.php';

//Include template footer
include 'template/template-footer.php';
?>