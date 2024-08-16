<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$location = (isset($_POST["location"]) && $_POST["location"] != "" && $_POST["location"] != "null" ) ? clean($_POST["location"]) : null;
$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] != "" && $_POST["father_id"] != "null" ) ? clean($_POST["father_id"]) : null;
$label = (isset($_POST["label"]) && $_POST["label"] != "" && $_POST["label"] != "null" ) ? clean($_POST["label"]) : null;
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : null;
$url = (isset($_POST["url"]) && $_POST["url"] != "" ) ? clean($_POST["url"]) : null;
$target = (isset($_POST["target"]) && $_POST["target"] != "" && $_POST["target"] != "null" ) ? clean($_POST["target"]) : null;
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : null;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : null;
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
################################################################################
if (!$error) {
    $lastInsertId = _menus_add(
            $location, $father_id, $label, $controller, $url, $target, $icon, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=_menus&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=_menus");
            break;
    }
} else {

    include view("home", "pageError");
}


