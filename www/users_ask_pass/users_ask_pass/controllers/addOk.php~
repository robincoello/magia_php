<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (users_ask_pass_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = users_ask_pass_add(
            $contact_id, $code, $date, $status
    );

    header("Location: index.php?c=users_ask_pass&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/users_ask_pass/views/index.php";   
include view("users_ask_pass", "index");
