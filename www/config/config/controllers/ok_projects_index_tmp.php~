<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;

$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('projects_index_tmp', $data, 'projects');

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=projects&a=details&id=$redi[id]");
            break;

        default:
            header("Location: index.php?c=projects");
            break;
    }
} else {

    include view('home', 'pageError');
}







