<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$address_id = (isset($_POST["address_id"])) ? clean($_POST["address_id"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$code = magia_uniqid();

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id not send');
}
if (!$address_id) {
    array_push($error, '$address_id not send');
}
if (!$name) {
    array_push($error, '$name not send');
}
if (!$data) {
    array_push($error, '$data not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (directory_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    directory_add(
            $contact_id, $address_id, $name, $data, $code, $order_by, $status
    );

    $lastInsertId = directory_field_id($field, $id);

    header("Location: index.php?c=directory&a=details&id=$lastInsertId");
} else {

    include view("directory", "index");
}



