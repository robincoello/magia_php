<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$location = (isset($_REQUEST["location"]) && $_REQUEST["location"] != "") ? clean($_REQUEST["location"]) : false;
$father_id = (isset($_REQUEST["father_id"]) && $_REQUEST["father_id"] != "") ? clean($_REQUEST["father_id"]) : false;
$label = (isset($_REQUEST["label"]) && $_REQUEST["label"] != "") ? clean($_REQUEST["label"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$url = (isset($_REQUEST["url"]) && $_REQUEST["url"] != "") ? clean($_REQUEST["url"]) : false;
$target = (isset($_REQUEST["target"]) && $_REQUEST["target"] != "") ? clean($_REQUEST["target"]) : false;
$icon = (isset($_REQUEST["icon"]) && $_REQUEST["icon"] != "") ? clean($_REQUEST["icon"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$location) {
    array_push($error, '$location is mandatory');
}
if (!$label) {
    array_push($error, '$label is mandatory');
}
if (!$url) {
    array_push($error, '$url is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!_menus_is_location($location)) {
    array_push($error, '$location format error');
}
if (!_menus_is_label($label)) {
    array_push($error, '$label format error');
}
if (!_menus_is_url($url)) {
    array_push($error, '$url format error');
}
if (!_menus_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( _menus_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    _menus_edit(
            $id, $location, $father_id, $label, $controller, $url, $target, $icon, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=_menus&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
