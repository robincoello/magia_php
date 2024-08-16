<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array("Disabled");

if ($data == '') {
    array_push($error, 'All fields required');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_contacts_pics_in_search', $data, 'contacts');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts");
            break;

        default:
            header("Location: index.php?c=config&a=contacts_pics_in_search&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}







