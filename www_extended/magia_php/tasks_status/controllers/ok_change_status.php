<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$new_status = (isset($_REQUEST["new_status"]) && $_REQUEST["new_status"] != "" ) ? clean($_REQUEST["new_status"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
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
if (!tasks_status_is_id($id)) {
    array_push($error, 'Id format error');
}
if (!tasks_status_is_status($new_status)) {
    array_push($error, "new_status format error");
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    tasks_status_change_status(
            $id, $new_status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=tasks_status#1");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view("home", "pageError");
}  
