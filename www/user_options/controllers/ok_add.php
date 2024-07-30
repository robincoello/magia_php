<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$user_id = (isset($_POST["user_id"]) && $_POST["user_id"] != "" && $_POST["user_id"] != "null" ) ? clean($_POST["user_id"]) : false;
$option = (isset($_POST["option"]) && $_POST["option"] != "" && $_POST["option"] != "null" ) ? clean($_POST["option"]) : false;
$data = (isset($_POST["data"]) && $_POST["data"] != "" && $_POST["data"] != "null" ) ? clean($_POST["data"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$user_id) {
    array_push($error, '$user_id is mandatory');
}
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
if (!user_options_is_user_id($user_id)) {
    array_push($error, '$user_id format error');
}
if (!user_options_is_option($option)) {
    array_push($error, '$option format error');
}
if (!user_options_is_data($data)) {
    array_push($error, '$data format error');
}
if (!user_options_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!user_options_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( user_options_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = user_options_add(
            $user_id, $option, $data, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=user_options");
            break;

        case 2:
            header("Location: index.php?c=user_options&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=user_options&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=user_options&a=details&id=$lastInsertId");
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


