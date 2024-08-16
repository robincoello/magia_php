<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$contacts_titles = null;
$contacts_titles = contacts_titles_list(10, 5);

//include "www/contacts_titles/views/index.php";
include view("contacts_titles", "index");
if ($debug) {
    include "www/contacts_titles/views/debug.php";
}