<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

//$data = intval($data);
################################################################################
################################################################################
################################################################################


if (!$error) {

    // si no existe lo crea
    _options_push('config_public_html_theme', $data, 'public_html');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=config&a=public_html_theme#1");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}







