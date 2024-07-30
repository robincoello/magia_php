<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] != "" && $_POST["father_id"] != "null" ) ? clean($_POST["father_id"]) : false;
$category = (isset($_POST["category"]) && $_POST["category"] != "" && $_POST["category"] != "null" ) ? clean($_POST["category"]) : false;
$color = (isset($_POST["color"]) && $_POST["color"] != "" && $_POST["color"] != "null" ) ? clean($_POST["color"]) : false;
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = tasks_categories_add(
            $father_id, $category, $color, $icon, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=tasks_categories&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=tasks_categories");
            break;
    }
} else {

    include view("home", "pageError");
}


