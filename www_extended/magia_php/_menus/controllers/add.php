<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$location = (isset($_GET["location"]) && $_GET["location"] != "") ? clean($_GET["location"]) : 'top';
$father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "") ? clean($_GET["father_id"]) : false;
$label = (isset($_GET["label"]) && $_GET["label"] != "") ? clean($_GET["label"]) : false;
$controller = (isset($_GET["controller"]) && $_GET["controller"] != "") ? clean($_GET["controller"]) : 'home';
$url = (isset($_GET["url"]) && $_GET["url"] != "") ? clean($_GET["url"]) : 'index.php?c=xxxx';
$target = (isset($_GET["target"]) && $_GET["target"] != "") ? clean($_GET["target"]) : false;
$icon = (isset($_GET["icon"]) && $_GET["icon"] != "") ? clean($_GET["icon"]) : 'glyphicon glyphicon-folder';
$order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "") ? clean($_GET["order_by"]) : 1;
$status = (isset($_GET["status"]) && $_GET["status"] != "") ? clean($_GET["status"]) : 1;

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
