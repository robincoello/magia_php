<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $gallery["id"] =  false ;
$gallery["owner_id"] = false;
$gallery["controller"] = false;
$gallery["doc_id"] = false;
$gallery["name"] = false;
$gallery["title"] = false;
$gallery["description"] = false;
$gallery["alt"] = false;
$gallery["url"] = false;
$gallery["date_registre"] = date("Y-m-d");
$gallery["code"] = false;
$gallery["order_by"] = false;
$gallery["status"] = false;

include view("gallery", "add");
