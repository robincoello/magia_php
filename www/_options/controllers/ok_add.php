<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$option = (isset($_POST["option"]) && $_POST["option"] != "") ? clean($_POST["option"]) : false;
$description = (isset($_POST["description"]) && $_POST["description"] != "") ? clean($_POST["description"]) : false;
$data = (isset($_POST["data"]) && $_POST["data"] != "") ? clean($_POST["data"]) : false;
$group = (isset($_POST["group"]) && $_POST["group"] != "") ? clean($_POST["group"]) : false;
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "") ? clean($_POST["controller"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = _options_add(
            $option, $description, $data, $group, $controller, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=_options&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=_options");
            break;
    }
} else {

    include view("home", "pageError");
}


