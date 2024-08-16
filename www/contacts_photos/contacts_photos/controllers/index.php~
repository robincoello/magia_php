<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$contacts_photos = null;
$contacts_photos = contacts_photos_list(10, 5);

//include "www/contacts_photos/views/index.php";
include view("contacts_photos", "index");
if ($debug) {
    include "www/contacts_photos/views/debug.php";
}