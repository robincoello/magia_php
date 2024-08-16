<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$position = (isset($_POST["position"])) ? clean($_POST["position"]) : false;

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$company_id) {
    array_push($error, '$company_id is mandatory');
}
if (!$position) {
    array_push($error, '$position is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (contacts_positions_search($position)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = contacts_positions_add(
            $contact_id, $company_id, $position
    );

    header("Location: index.php?c=contacts_positions&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/contacts_positions/views/index.php";   
include view("contacts_positions", "index");
