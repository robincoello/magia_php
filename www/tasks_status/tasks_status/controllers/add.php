<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $tasks_status["id"] =  false ;
$tasks_status["code"] = false;
$tasks_status["name"] = false;
$tasks_status["color"] = false;
$tasks_status["icon"] = false;
$tasks_status["order_by"] = 1;
$tasks_status["status"] = 1;

include view("tasks_status", "add");
