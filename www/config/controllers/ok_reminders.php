<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$r1 = (isset($_POST["r1"])) ? intval(clean($_POST["r1"])) : false;
$r2 = (isset($_POST["r2"])) ? intval(clean($_POST["r2"])) : false;
$r3 = (isset($_POST["r3"])) ? intval(clean($_POST["r3"])) : false;
$min = (isset($_POST["min"])) ? intval(clean($_POST["min"])) : false;
$max = (isset($_POST["max"])) ? intval(clean($_POST["max"])) : false;
$tax = (isset($_POST["tax"])) ? intval(clean($_POST["tax"])) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if ($r1 < 1 || $r1 > 100) {
    array_push($error, 'Must be between 1 and 100');
}
if ($r2 < 1 || $r2 > 100) {
    array_push($error, 'Must be between 1 and 100');
}
if ($r3 < 1 || $r3 > 100) {
    array_push($error, 'Must be between 1 and 100');
}
if ($min < 1) {
    array_push($error, 'Must be between 1 and 100');
}
if ($min >= $max) {
    array_push($error, 'Must be less than max');
}
if ($max < 1) {
    array_push($error, 'Must be greater than 0');
}
if ($max <= $min) {
    array_push($error, 'Must be greater than min');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_invoices_r1', $r1, 'invoices');
    _options_push('config_invoices_r2', $r2, 'invoices');
    _options_push('config_invoices_r3', $r3, 'invoices');
    _options_push('config_invoices_reminders_min', $min, 'invoices');
    _options_push('config_invoices_reminders_max', $max, 'invoices');
    _options_push('config_invoices_reminders_tax', $tax, 'invoices');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=invoices_reminders&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







