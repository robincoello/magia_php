<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "" && $_POST["category_id"] != "null" ) ? clean($_POST["category_id"]) : ' false ';
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : ' false ';
$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : ' false ';
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : ' false ';
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : ' false ';
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "" && $_POST["doc_id"] != "null" ) ? clean($_POST["doc_id"]) : ' false ';
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : 'date("Y-m-d G:i:s")';
$date_update = (isset($_POST["date_update"]) && $_POST["date_update"] != "" && $_POST["date_update"] != "null" ) ? clean($_POST["date_update"]) : ' false ';
$color = (isset($_POST["color"]) && $_POST["color"] != "" && $_POST["color"] != "null" ) ? clean($_POST["color"]) : ' false ';
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : '1';
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : '1';
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = tasks_add(
            $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status
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
            // ejemplo index.php?c=tasks&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


