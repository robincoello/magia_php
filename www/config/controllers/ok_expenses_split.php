<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (($_POST["data"]) != "" ) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

$data = intval($data);

if ($data < 0 || $data > 1) {
    array_push($error, 'Must be 0 or 1');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_expenses_split', $data, 'expenses');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=expenses");
            break;

        default:
            header("Location: index.php?c=config&a=expenses_split&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







