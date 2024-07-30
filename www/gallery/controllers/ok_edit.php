<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$owner_id = (isset($_REQUEST["owner_id"]) && $_REQUEST["owner_id"] != "") ? clean($_REQUEST["owner_id"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$doc_id = (isset($_REQUEST["doc_id"]) && $_REQUEST["doc_id"] != "") ? clean($_REQUEST["doc_id"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") ? clean($_REQUEST["title"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$alt = (isset($_REQUEST["alt"]) && $_REQUEST["alt"] != "") ? clean($_REQUEST["alt"]) : false;
$url = (isset($_REQUEST["url"]) && $_REQUEST["url"] != "") ? clean($_REQUEST["url"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!$error) {

    gallery_edit(
            $id, $owner_id, $controller, $doc_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=gallery&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
