<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $tasks_categories["id"] =  false ;
$tasks_categories["father_id"] = false;
$tasks_categories["category"] = false;
$tasks_categories["color"] = false;
$tasks_categories["icon"] = false;
$tasks_categories["order_by"] = 1;
$tasks_categories["status"] = 1;

include view("tasks_categories", "add");
