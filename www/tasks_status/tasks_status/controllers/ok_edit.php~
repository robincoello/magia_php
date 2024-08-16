<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$color = (isset($_REQUEST["color"]) && $_REQUEST["color"] != "") ? clean($_REQUEST["color"]) : false;
$icon = (isset($_REQUEST["icon"]) && $_REQUEST["icon"] != "") ? clean($_REQUEST["icon"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!tasks_status_is_code($code)) {
    array_push($error, '$code format error');
}
if (!tasks_status_is_name($name)) {
    array_push($error, '$name format error');
}
if (!tasks_status_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!tasks_status_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (tasks_status_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}


//if( tasks_status_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    tasks_status_edit(
            $id, $code, $name, $color, $icon, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=tasks_status&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
