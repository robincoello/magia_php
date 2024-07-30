<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$father_id = (isset($_REQUEST["father_id"]) && $_REQUEST["father_id"] != "") ? clean($_REQUEST["father_id"]) : false;
$category = (isset($_REQUEST["category"]) && $_REQUEST["category"] != "") ? clean($_REQUEST["category"]) : false;
$color = (isset($_REQUEST["color"]) && $_REQUEST["color"] != "") ? clean($_REQUEST["color"]) : false;
$icon = (isset($_REQUEST["icon"]) && $_REQUEST["icon"] != "") ? clean($_REQUEST["icon"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$category) {
    array_push($error, '$category is mandatory');
}
if (!$color) {
    array_push($error, '$color is mandatory');
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
if (!tasks_categories_is_category($category)) {
    array_push($error, '$category format error');
}
if (!tasks_categories_is_color($color)) {
    array_push($error, '$color format error');
}
if (!tasks_categories_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!tasks_categories_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (tasks_categories_search_by_unique("id", "category", $category)) {
    array_push($error, 'category already exists in data base');
}


//if( tasks_categories_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    tasks_categories_edit(
            $id, $father_id, $category, $color, $icon, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=tasks_categories&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
