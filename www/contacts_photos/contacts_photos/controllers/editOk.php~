<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$photo = (isset($_POST["photo"])) ? clean($_POST["photo"]) : false;
$principal = (isset($_POST["principal"])) ? clean($_POST["principal"]) : false;
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

if (!contacts_photos_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    contacts_photos_edit(
            $id, $contact_id, $photo, $principal, $order_by, $status
    );
    header("Location: index.php?c=contacts_photos&a=details&id=$id");
}

$contacts_photos = contacts_photos_details($id);

include view("contacts_photos", "index");
