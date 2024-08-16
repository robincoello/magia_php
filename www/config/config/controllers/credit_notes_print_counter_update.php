<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$update_now = (isset($_REQUEST["update_now"])) ? clean($_REQUEST["update_now"]) : false;
$sms = (isset($_REQUEST["sms"])) ? clean($_REQUEST["sms"]) : false;

$m = array();

switch ($sms) {
    case 1:
        array_push($m, "Update");
        break;

    default:
        break;
}

include view("config", "credit_notes_print_counter_update");
