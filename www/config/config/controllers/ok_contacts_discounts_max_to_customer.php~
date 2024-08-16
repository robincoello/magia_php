<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

if ($data == '') {
    array_push($error, 'All fields required');
}

if ($data < 0 || $data > 100) {
    array_push($error, 'Values ​​must be between 0 and 100');
}

################################################################################
################################################################################
################################################################################
if (!$error) {


    _options_push('config_discounts_max_to_customer', $data, 'contacts');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=config&a=contacts_discounts_max_to_customer&sms=1#1");
            break;

        case 2:
            header("Location: index.php?c=config&sms=1");
            break;

        default:
            header("Location: index.php&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}







