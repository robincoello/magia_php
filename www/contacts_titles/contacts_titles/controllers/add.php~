<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//include "www/contacts_titles/views/add.php";
include view("contacts_titles", "add");
