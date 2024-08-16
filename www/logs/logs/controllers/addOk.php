<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$level = (isset($_POST["level"])) ? clean($_POST["level"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$u_id = (isset($_POST["u_id"])) ? clean($_POST["u_id"]) : false;
$u_rol = (isset($_POST["u_rol"])) ? clean($_POST["u_rol"]) : false;
$c = (isset($_POST["c"])) ? clean($_POST["c"]) : false;
$a = (isset($_POST["a"])) ? clean($_POST["a"]) : false;
$w = (isset($_POST["w"])) ? clean($_POST["w"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$doc_id = (isset($_POST["doc_id"])) ? clean($_POST["doc_id"]) : false;
$crud = (isset($_POST["crud"])) ? clean($_POST["crud"]) : false;
$error = (isset($_POST["error"])) ? clean($_POST["error"]) : false;
$val_get = (isset($_POST["val_get"])) ? clean($_POST["val_get"]) : false;
$val_post = (isset($_POST["val_post"])) ? clean($_POST["val_post"]) : false;
$val_request = (isset($_POST["val_request"])) ? clean($_POST["val_request"]) : false;
$ip4 = (isset($_POST["ip4"])) ? clean($_POST["ip4"]) : false;
$ip6 = (isset($_POST["ip6"])) ? clean($_POST["ip6"]) : false;
$broswer = (isset($_POST["broswer"])) ? clean($_POST["broswer"]) : false;

$error = array();

if (!$level) {
    array_push($error, '$level is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$u_id) {
    array_push($error, '$u_id is mandatory');
}
if (!$u_rol) {
    array_push($error, '$u_rol is mandatory');
}
if (!$c) {
    array_push($error, '$c is mandatory');
}
if (!$a) {
    array_push($error, '$a is mandatory');
}
if (!$w) {
    array_push($error, '$w is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$doc_id) {
    array_push($error, '$doc_id is mandatory');
}
if (!$crud) {
    array_push($error, '$crud is mandatory');
}
if (!$error) {
    array_push($error, '$error is mandatory');
}
if (!$val_get) {
    array_push($error, '$val_get is mandatory');
}
if (!$val_post) {
    array_push($error, '$val_post is mandatory');
}
if (!$val_request) {
    array_push($error, '$val_request is mandatory');
}
if (!$ip4) {
    array_push($error, '$ip4 is mandatory');
}
if (!$ip6) {
    array_push($error, '$ip6 is mandatory');
}
if (!$broswer) {
    array_push($error, '$broswer is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (logs_search($broswer)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w, $description, $doc_id, $crud, $error, $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );

    header("Location: index.php?c=logs&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/logs/views/index.php";   
include view("logs", "index");
