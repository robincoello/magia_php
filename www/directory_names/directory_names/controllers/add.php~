<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $directory_names["id"] =  false ;
$directory_names["name"] = false;
$directory_names["order_by"] = 1;
$directory_names["status"] = 1;

include view("directory_names", "add");
