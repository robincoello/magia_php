<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$category_id = (isset($_REQUEST["category_id"]) && $_REQUEST["category_id"] != "") ? clean($_REQUEST["category_id"]) : false;
$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] != "") ? clean($_REQUEST["contact_id"]) : false;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") ? clean($_REQUEST["title"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$doc_id = (isset($_REQUEST["doc_id"]) && $_REQUEST["doc_id"] != "") ? clean($_REQUEST["doc_id"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$date_update = (isset($_REQUEST["date_update"]) && $_REQUEST["date_update"] != "") ? clean($_REQUEST["date_update"]) : false;
$color = (isset($_REQUEST["color"]) && $_REQUEST["color"] != "") ? clean($_REQUEST["color"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, 'Contact_id is mandatory');
}
if (!$title) {
    array_push($error, 'Title is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
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
if (!tasks_is_contact_id($contact_id)) {
    array_push($error, 'Contact_id format error');
}
if (!tasks_is_title($title)) {
    array_push($error, 'Title format error');
}
if (!tasks_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!tasks_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!tasks_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( tasks_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    tasks_edit(
            $id, $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks");
            break;

        case 2:
            header("Location: index.php?c=tasks&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
