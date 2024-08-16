<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('expenses_form_add', $data, 'expenses');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=add#2");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view('home', 'pageError');
}







