<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

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




#************************************************************************
// Busca si uya existe el texto en la BD


if (gallery_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = gallery_add(
            $owner_id, $name, $title, $description, $alt, $url, $date_registre, $order_by, $status
    );

    header("Location: index.php?c=gallery&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/gallery/views/index.php";   
include view("gallery", "index");
