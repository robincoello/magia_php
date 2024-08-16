<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if (!$status) {
    array_push($error, "status is mandatory");
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    if ($status == "true") {
        // change to false
        _options_push('debug_lang', 0, 'home');
    } else {
        // change to true
        _options_push('debug_lang', 1, 'home');
    }

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location index.php?c=config&a=debug_lang&sms=1");
            break;
    }
}








