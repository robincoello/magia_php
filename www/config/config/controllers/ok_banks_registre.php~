<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Do you want to use bank statements to record receipts and payments in your system? 

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

//$data = intval($data);
################################################################################
################################################################################
################################################################################


if (!$error) {

    // si no existe lo crea
    _options_push('config_banks_registre', $data, 'banks');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=banks");
            break;

        case 2:
            header("Location: index.php?c=config&a=banks_registre&sms=1#2");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}







