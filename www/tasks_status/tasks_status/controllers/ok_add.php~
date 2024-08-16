<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : false;
$color = (isset($_POST["color"]) && $_POST["color"] != "" && $_POST["color"] != "null" ) ? clean($_POST["color"]) : false;
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = tasks_status_add(
            $code, $name, $color, $icon, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=tasks_status&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=tasks_status");
            break;
    }
} else {

    include view("home", "pageError");
}


