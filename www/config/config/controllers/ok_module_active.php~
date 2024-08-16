<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modules = (isset($_POST["module"])) ? clean($_POST["module"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$option = "employees";

$error = array();

################################################################################
if (!$error) {
    _options_push($option, 1, 'modules');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config");
            break;
    }
}
