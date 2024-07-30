<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $tasks["id"] =  false ;
$tasks["category_id"] = false;
$tasks["contact_id"] = false;
$tasks["title"] = false;
$tasks["description"] = false;
$tasks["controller"] = false;
$tasks["doc_id"] = false;
$tasks["date_registre"] = date("Y-m-d");
$tasks["date_update"] = false;
$tasks["color"] = false;
$tasks["order_by"] = 1;
$tasks["status"] = 1;

include view("tasks", "add");
