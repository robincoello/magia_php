<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

if (!$data) {
    array_push($error, "Data is mandatory");
}
if (!is_numeric($data)) {
    array_push($error, "Data is not a number");
}
if ($data < 0) {
    array_push($error, "Data must be positive");
}
// les pasamos a un valor redondo, sin decimales
$data = intval($data);
################################################################################
if (!$error) {

    _options_push("config_invoices_expiration_days", $data, 'invoices');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices");
            break;

        default:
            header("Location: index.php?c=config&a=invoices_expiration_days&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}

                