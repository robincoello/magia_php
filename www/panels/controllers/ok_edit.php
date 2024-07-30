<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] != "") ? clean($_REQUEST["action"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$panel = (isset($_REQUEST["panel"]) && $_REQUEST["panel"] != "") ? clean($_REQUEST["panel"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$controller) {
    array_push($error, 'Controller is mandatory');
}
if (!$action) {
    array_push($error, 'Action is mandatory');
}
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$panel) {
    array_push($error, 'Panel is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!panels_is_controller($controller)) {
    array_push($error, 'Controller format error');
}
if (!panels_is_action($action)) {
    array_push($error, 'Action format error');
}
if (!panels_is_name($name)) {
    array_push($error, 'Name format error');
}
if (!panels_is_panel($panel)) {
    array_push($error, 'Panel format error');
}
if (!panels_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!panels_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( panels_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    panels_edit(
            $id, $controller, $action, $name, $panel, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=panels");
            break;

        default:
            header("Location: index.php?c=panels&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
