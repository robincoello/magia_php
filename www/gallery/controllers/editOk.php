<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$alt = (isset($_POST["alt"])) ? clean($_POST["alt"]) : false;
$url = (isset($_POST["url"])) ? clean($_POST["url"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!gallery_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    gallery_edit(
            $id, $owner_id, $name, $title, $description, $alt, $url, $date_registre, $order_by, $status
    );
    header("Location: index.php?c=gallery&a=details&id=$id");
}

$gallery = gallery_details($id);

include view("gallery", "index");
