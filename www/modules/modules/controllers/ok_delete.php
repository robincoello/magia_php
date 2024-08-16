<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
$error = array();
###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!modules_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    modules_delete(
            $id
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=" . $redi["c"] . "&a=" . $redi["a"] . " ");
            break;

        default:
            header("Location: index.php?c=modules");
            break;
    }
} else {

    include view("home", "pageError");
}  
