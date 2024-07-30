<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$contacts = null;

$contacts = contacts_list();

//include "www/contacts/views/export_json.php";
include view("contacts", "export_json");
if ($debug) {
    include "www/contacts/views/debug.php";
}