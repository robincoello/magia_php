<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$home_page = (isset($_REQUEST["home_page"])) ? clean($_REQUEST["home_page"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if (!$home_page) {
    array_push($error, "page is mandatory");
}


################################################################################
if (!$error) {

    _options_push("home_page", $home_page, 'home');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=home_page&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}

    