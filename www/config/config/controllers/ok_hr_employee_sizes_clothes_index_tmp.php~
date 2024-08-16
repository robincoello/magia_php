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
    _options_push('config_hr_employee_sizes_clothes_index_tmp', $data, 'system');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=hr_employee_sizes_clothes#1");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}







