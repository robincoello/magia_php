<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $_menus["id"] =  false ;
$_menus["location"] = false;
$_menus["father_id"] = false;
$_menus["label"] = false;
$_menus["controller"] = false;
$_menus["url"] = #;
        $_menus["target"] = false;
$_menus["icon"] = false;
$_menus["order_by"] = 1;
$_menus["status"] = 1;

include view("_menus", "add");
