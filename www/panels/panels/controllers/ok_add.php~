<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : false;
$action = (isset($_POST["action"]) && $_POST["action"] != "" && $_POST["action"] != "null" ) ? clean($_POST["action"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : false;
$panel = (isset($_POST["panel"]) && $_POST["panel"] != "" && $_POST["panel"] != "null" ) ? clean($_POST["panel"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = panels_add(
            $controller, $action, $name, $panel, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=panels");
            break;

        case 2:
            header("Location: index.php?c=panels&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=panels&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=panels&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


