<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $modules["id"] =  false ;
$modules["label"] = false;
$modules["father"] = false;
$modules["module"] = false;
$modules["description"] = false;
$modules["author"] = false;
$modules["author_email"] = false;
$modules["url"] = false;
$modules["version"] = false;
$modules["order_by"] = false;
$modules["status"] = false;

include view("modules", "add");
