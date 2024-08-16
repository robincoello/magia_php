<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

$data = intval($data);

if ($data < 1 || $data > 250) {
    array_push($error, 'The value must be between 1 and 250');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_credit_notes_description_maxlength', $data, 'credit_notes');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=credit_notes");
            break;

        default:
            header("Location: index.php?c=config&a=credit_notes_description_maxlength&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







