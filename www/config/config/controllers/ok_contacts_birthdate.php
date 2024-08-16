<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

if ($data == '') {
    array_push($error, 'All fields required');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_contacts_birthdate', $data, 'contacts');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=config&a=contacts_birthdate&sms=1");
            break;

        case 2:
            header("Location: index.php?c=contacts");
            break;

        default:
            header("Location: index.php?c=config&a=contacts_birthdate&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}







