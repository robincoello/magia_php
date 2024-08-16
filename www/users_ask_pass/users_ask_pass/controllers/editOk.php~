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
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
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

if (!users_ask_pass_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    users_ask_pass_edit(
            $id, $contact_id, $code, $date, $status
    );
    header("Location: index.php?c=users_ask_pass&a=details&id=$id");
}

$users_ask_pass = users_ask_pass_details($id);

include view("users_ask_pass", "index");
