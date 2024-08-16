<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST)) ? json_encode($_POST) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config_user_options_show_col_from_table", $data, 'user_options');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=user_options");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}

