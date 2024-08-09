<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Add
 */
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : false;
$api_key = (isset($_POST["api_key"]) && $_POST["api_key"] != "" && $_POST["api_key"] != "null" ) ? clean($_POST["api_key"]) : false;
$crud = (isset($_POST["crud"]) && $_POST["crud"] != "" && $_POST["crud"] != "null" ) ? clean($_POST["crud"]) : false;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : false;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, 'Contactcid is mandatory');
}
if (!$api_key) {
    array_push($error, 'Api key is mandatory');
}
if (!$date_start) {
    array_push($error, 'Date start is mandatory');
}
if (!$date_end) {
    array_push($error, 'Date end is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!api_is_contact_id($contact_id)) {
    array_push($error, 'Contact id format error');
}
if (!api_is_api_key($api_key)) {
    array_push($error, 'Api key format error');
}
if (!api_is_date_start($date_start)) {
    array_push($error, 'Date start format error');
}
if (!api_is_date_end($date_end)) {
    array_push($error, 'Date end format error');
}
if (!api_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!api_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( api_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    // Actions to do 
    // api_add($contact_id, $api_key, $crud, $date_start, $date_end, $requests_limit, $limit_period, $requests_made, $last_request, $order_by, $status)

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=api");
            break;

        case 2:
            header("Location: index.php?c=api&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=api&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=api&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.php?c=contacts&a=api&id=$contact_id#5");
            break;

        case 6: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}

