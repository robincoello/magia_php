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
    _options_push('config_doc_models_debug_color_working_element', $data, 'doc_models');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=hr_employee_worked_days#1");
            break;

        case 4:
            header("Location: index.php?c=doc_models_lines&a=details_by_modele_doc&doc=$data#4");
            break;

        case 5:
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}







