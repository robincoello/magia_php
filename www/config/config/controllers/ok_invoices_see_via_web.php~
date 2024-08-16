<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if ($data == '') {
    array_push($error, 'All fields required');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_invoices_see_via_web', $data, 'invoices');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices");
            break;

        default:
            header("Location: index.php?c=config&a=invoices_see_via_web&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







