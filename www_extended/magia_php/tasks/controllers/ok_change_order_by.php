<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "" ) ? clean($_REQUEST["order_by"]) : false;
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
if (!tasks_is_id($id)) {
    array_push($error, 'Id format error');
}
if (!tasks_is_order_by($order_by)) {
    array_push($error, "order_by format error");
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    tasks_change_order_by(
            $id, $order_by
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=tasks#1");
            break;
        case 2:
            header("Location: index.php?c=tasks&a=details&id=" . $redi['id'] . "#2");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view("home", "pageError");
}  
