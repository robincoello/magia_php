<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_REQUEST["controller"])) ? clean($_REQUEST["controller"]) : false;
$title = (isset($_REQUEST["title"])) ? clean($_REQUEST["title"]) : '';
$description = (isset($_REQUEST["description"])) ? clean($_REQUEST["description"]) : '';
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : '';

$error = array();

if (!$controller) {
    array_push($error, '$controller is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}

#************************************************************************
// Busca si uya existe el texto en la BD

if (controllers_search($description)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = controllers_add(
            $controller, $title, $description
    );

    switch ($redi) {
        case 1:
        case 2:
            header("Location: index.php?c=controllers&a=search&w=folders");
            break;

        default:
            header("Location: index.php?c=controllers&a=details&id=$lastInsertId");
            break;
    }
    //
} else {

    array_push($error, "Check your form");
}

include view("controllers", "index");
