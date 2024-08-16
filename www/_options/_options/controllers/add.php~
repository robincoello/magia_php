<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $_options["id"] =  false ;
$_options["option"] = false;
$_options["description"] = false;
$_options["data"] = false;
$_options["group"] = false;
$_options["controller"] = false;
$_options["order_by"] = 1;
$_options["status"] = 1;

include view("_options", "add");
