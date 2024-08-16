<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!$u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$config_paypal_account = (isset($_POST["config_paypal_account"])) ? clean($_POST["config_paypal_account"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if ($config_paypal_account == '') {
    array_push($error, 'All fields required');
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_paypal_account', $config_paypal_account, 'home');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=paypal&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







