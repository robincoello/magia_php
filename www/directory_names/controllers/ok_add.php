<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"]) && $_POST["name"] != "") ? clean($_POST["name"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
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
if (!directory_names_is_name($name)) {
    array_push($error, '$name format error');
}
if (!directory_names_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!directory_names_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (directory_names_search_by_unique("id", "name", $name)) {
    array_push($error, 'name already exists in data base');
}


//if( directory_names_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = directory_names_add(
            $name, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=directory_names&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=directory_names");
            break;
    }
} else {

    include view("home", "pageError");
}


