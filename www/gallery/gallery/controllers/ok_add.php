<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$owner_id = (isset($_POST["owner_id"]) && $_POST["owner_id"] != "" && $_POST["owner_id"] != "null" ) ? clean($_POST["owner_id"]) : null;
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : null;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "" && $_POST["doc_id"] != "null" ) ? clean($_POST["doc_id"]) : null;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : null;
$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : null;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$alt = (isset($_POST["alt"]) && $_POST["alt"] != "" && $_POST["alt"] != "null" ) ? clean($_POST["alt"]) : null;
$url = (isset($_POST["url"]) && $_POST["url"] != "" && $_POST["url"] != "null" ) ? clean($_POST["url"]) : null;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : null;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$owner_id) {
    array_push($error, '$owner_id is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$alt) {
    array_push($error, '$alt is mandatory');
}
if (!$url) {
    array_push($error, '$url is mandatory');
}
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
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
if (!gallery_is_owner_id($owner_id)) {
    array_push($error, '$owner_id format error');
}
if (!gallery_is_name($name)) {
    array_push($error, '$name format error');
}
if (!gallery_is_title($title)) {
    array_push($error, '$title format error');
}
if (!gallery_is_description($description)) {
    array_push($error, '$description format error');
}
if (!gallery_is_alt($alt)) {
    array_push($error, '$alt format error');
}
if (!gallery_is_url($url)) {
    array_push($error, '$url format error');
}
if (!gallery_is_date_registre($date_registre)) {
    array_push($error, '$date_registre format error');
}
if (!gallery_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!gallery_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (gallery_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}


//if( gallery_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = gallery_add(
            $owner_id, $controller, $doc_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=gallery&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=gallery");
            break;
    }
} else {

    include view("home", "pageError");
}


