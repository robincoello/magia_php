<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
$type = (isset($_POST["type"])) ? clean($_POST["type"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$lastname = (isset($_POST["lastname"])) ? clean($_POST["lastname"]) : false;
$birthdate = (isset($_POST["birthdate"])) ? clean($_POST["birthdate"]) : false;
$tva = (isset($_POST["tva"])) ? clean($_POST["tva"]) : false;
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

if (!contacts_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    contacts_edit(
            $id, $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $order_by, $status
    );
    header("Location: index.php?c=contacts&a=details&id=$id");
}

$contacts = contacts_details($id);

include view("contacts", "index");
