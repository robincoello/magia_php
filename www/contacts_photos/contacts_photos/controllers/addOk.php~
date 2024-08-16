<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$photo = (isset($_POST["photo"])) ? clean($_POST["photo"]) : false;
$principal = (isset($_POST["principal"])) ? clean($_POST["principal"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$photo) {
    array_push($error, '$photo is mandatory');
}
if (!$principal) {
    array_push($error, '$principal is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (contacts_photos_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = contacts_photos_add(
            $contact_id, $photo, $principal, $order_by, $status
    );

    header("Location: index.php?c=contacts_photos&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/contacts_photos/views/index.php";   
include view("contacts_photos", "index");
