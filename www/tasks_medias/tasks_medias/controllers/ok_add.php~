<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$task_id = (isset($_POST["task_id"]) && $_POST["task_id"] != "" && $_POST["task_id"] != "null" ) ? clean($_POST["task_id"]) : null;
$type = (isset($_POST["type"]) && $_POST["type"] != "" && $_POST["type"] != "null" ) ? clean($_POST["type"]) : null;
$url = (isset($_POST["url"]) && $_POST["url"] != "" && $_POST["url"] != "null" ) ? clean($_POST["url"]) : null;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = tasks_medias_add(
            $task_id, $type, $url, $description, $order_by, $status
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
            // ejemplo index.php?c=tasks_medias&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


