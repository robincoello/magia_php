<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

echo vardump($_POST);
die();

include view("permissions", "addAll");

//permissions_search_by_rol_controller