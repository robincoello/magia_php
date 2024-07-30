<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$new_status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}

################################################################################
################################################################################
################################################################################

if (!modules_is_id($id)) {
    array_push($error, "ID format error");
}

if (!modules_is_status($new_status)) {
    array_push($error, "Sttaus format error");
}
// si em modulo es base no se puede desactivar
if (modules_field_id('module', $id) == 'base') {
    array_push($error, "You should not deactivate the base module");
}

################################################################################

if (!$error) {


    modules_change_status($id, $new_status);

    switch ($redi) {
        case 1:
            header("Location: index.php?c=modules&a=details&id=$id#1");
            break;

        case 2:
            header("Location: index.php?c=modules");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}

