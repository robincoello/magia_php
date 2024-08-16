<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$option = (isset($_REQUEST["option"]) && $_REQUEST["option"] != "") ? clean($_REQUEST["option"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$data = (isset($_REQUEST["data"]) && $_REQUEST["data"] != "") ? clean($_REQUEST["data"]) : false;
$group = (isset($_REQUEST["group"]) && $_REQUEST["group"] != "") ? clean($_REQUEST["group"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$option) {
    array_push($error, '$option is mandatory');
}
if (!$data) {
    array_push($error, '$data is mandatory');
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
if (!_options_is_option($option)) {
    array_push($error, '$option format error');
}
if (!_options_is_data($data)) {
    array_push($error, '$data format error');
}
if (!_options_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!_options_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (_options_search_by_unique("id", "option", $option)) {
    array_push($error, 'option already exists in data base');
}


//if( _options_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    _options_edit(
            $id, $option, $description, $data, $group, $controller, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=_options&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
