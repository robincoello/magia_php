<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$controller = (isset($_POST["controller"])) ? clean($_POST["controller"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;

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

if (!controllers_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    controllers_edit(
            $id, $controller, $title, $description
    );
    header("Location: index.php?c=controllers&a=details&id=$id");
}

$controllers = controllers_details($id);

include view("controllers", "index");
