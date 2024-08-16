<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$abbreviation = (isset($_POST["abbreviation"])) ? clean($_POST["abbreviation"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$abbreviation) {
    array_push($error, '$abbreviation is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (contacts_titles_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = contacts_titles_add(
            $title, $abbreviation, $order_by, $status
    );

    header("Location: index.php?c=contacts_titles&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/contacts_titles/views/index.php";   
include view("contacts_titles", "index");
