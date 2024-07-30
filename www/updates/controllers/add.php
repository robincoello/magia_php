<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $updates["id"] =  false ;
$updates["code"] = false;
$updates["date"] = date("Y-m-d");
$updates["version"] = false;
$updates["name"] = false;
$updates["description"] = false;
$updates["code_install"] = false;
$updates["code_uninstall"] = false;
$updates["code_check"] = false;
$updates["installed"] = false;
$updates["pass"] = false;
$updates["order_by"] = false;
$updates["status"] = false;

include view("updates", "add");
