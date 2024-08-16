<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

$data = intval($data);

if ($data < 1 || $data > 1000) {
    array_push($error, "Must be between 1 and 1000");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config__pagination_items_limit", $data, "");

    switch ($redi) {
        case 1:
            header("Location: index.php?c=");
            break;

        default:
            header("Location: index.php?c=config&a=_pagination_items_limit&sms=1");
            break;
    }
} else {

    include view("home", "pageError");
}
