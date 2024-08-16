<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
$type = (isset($_POST["type"])) ? clean($_POST["type"]) : false;
$title = ($_POST["title"] != '') ? clean($_POST["title"]) : null;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$lastname = (isset($_POST["lastname"])) ? clean($_POST["lastname"]) : false;
$birthdate = (isset($_POST["birthdate"])) ? clean($_POST["birthdate"]) : false;
$tva = (isset($_POST["tva"])) ? clean($_POST["tva"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$owner_id) {
    array_push($error, '$owner_id is mandatory');
}
if (!$type) {
    array_push($error, '$type is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$lastname) {
    array_push($error, '$lastname is mandatory');
}
if (!$birthdate) {
    array_push($error, '$birthdate is mandatory');
}
if (!$tva) {
    array_push($error, '$tva is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (contacts_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = contacts_add(
            $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $order_by, $status
    );

    header("Location: index.php?c=contacts&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/contacts/views/index.php";   
include view("contacts", "index");
