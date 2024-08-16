<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$task_id = (isset($_REQUEST["task_id"]) && $_REQUEST["task_id"] != "") ? clean($_REQUEST["task_id"]) : false;
$type = (isset($_REQUEST["type"]) && $_REQUEST["type"] != "") ? clean($_REQUEST["type"]) : false;
$url = (isset($_REQUEST["url"]) && $_REQUEST["url"] != "") ? clean($_REQUEST["url"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$type) {
    array_push($error, 'Type is mandatory');
}
if (!$url) {
    array_push($error, 'Url is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
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
if (!tasks_medias_is_type($type)) {
    array_push($error, 'Type format error');
}
if (!tasks_medias_is_url($url)) {
    array_push($error, 'Url format error');
}
if (!tasks_medias_is_description($description)) {
    array_push($error, 'Description format error');
}
if (!tasks_medias_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!tasks_medias_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( tasks_medias_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    tasks_medias_edit(
            $id, $task_id, $type, $url, $description, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_medias");
            break;

        case 2:
            header("Location: index.php?c=tasks_medias&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks_medias&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks_medias&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks_medias&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
