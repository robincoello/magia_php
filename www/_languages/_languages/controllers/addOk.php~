<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$language) {
    array_push($error, '$language is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

#************************************************************************
// Busca si uya existe el texto en la BD

if (_languages_search_by_unique("id", "language", $language)) {
    array_push($error, 'language already exists in data base');
}


if (_languages_search_by_unique("id", "name", $name)) {
    array_push($error, 'name already exists in data base');
}



if (_languages_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _languages_add(
            $language, $name, $order_by, $status
    );

    header("Location: index.php?c=_languages&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

include view("_languages", "index");
