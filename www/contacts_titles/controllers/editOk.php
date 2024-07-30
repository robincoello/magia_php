<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$abbreviation = (isset($_POST["abbreviation"])) ? clean($_POST["abbreviation"]) : false;
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

if (!contacts_titles_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    contacts_titles_edit(
            $id, $title, $abbreviation, $order_by, $status
    );
    header("Location: index.php?c=contacts_titles&a=details&id=$id");
}

$contacts_titles = contacts_titles_details($id);

include view("contacts_titles", "index");
