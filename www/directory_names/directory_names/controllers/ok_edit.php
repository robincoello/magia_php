<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
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
if (!$error) {

    directory_names_edit(
            $id, $name, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=directory_names&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
