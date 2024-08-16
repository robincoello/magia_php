<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();
// RE FO CO
################################################################################
# Requeridos
if (!$data) {
    array_push($error, "Data is mandatory");
}
################################################################################
# Formato 
if ($data) {
    $data_json = json_encode($data);
}
################################################################################
# Condicional
# 
################################################################################


if (!$error) {

    // si no existe lo crea
    _options_push('config_hr_payroll_by_month_fix_date', $data_json, 'hr');

    switch ($redi['redi']) {

        case 4:
            header("Location: index.php?c=hr_payroll_by_month&a=by_month#1");
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







