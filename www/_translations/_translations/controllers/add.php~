<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

//include "www/_translations/views/add.php";
include view("_translations", "add");
