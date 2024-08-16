<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$address_id = (isset($_POST["address_id"])) ? clean($_POST["address_id"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
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

if (!directory_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    directory_edit(
            $id, $contact_id, $address_id, $name, $data, $order_by, $status
    );
    header("Location: index.php?c=directory&a=details&id=$id");
}

$directory = directory_details($id);

include view("directory", "index");
