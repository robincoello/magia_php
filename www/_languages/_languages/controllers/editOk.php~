<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
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

if (!_languages_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    _languages_edit(
            $id, $language, $name, $order_by, $status
    );
    header("Location: index.php?c=_languages&a=details&id=$id");
}

$_languages = _languages_details($id);

include view("_languages", "index");
