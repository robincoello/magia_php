<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;

$error = array();

if ($data == '') {
    array_push($error, 'Data is required');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('contacts_index_cols_to_show', json_encode($data), 'contacts');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=config&a=contacts_view&sms=1");
            break;

        case 2:
            header("Location: index.php?c=contacts");
            break;

        case 3:
            header("Location: index.php?c=contacts&a=employees&id=" . $redi['id']);
            break;

        default:
            header("Location: index.php?c=config&a=contacts_view&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}







