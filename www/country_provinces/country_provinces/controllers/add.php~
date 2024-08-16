<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $country_provinces["id"] =  false ;
$country_provinces["country"] = false;
$country_provinces["code"] = false;
$country_provinces["province"] = false;
$country_provinces["order_by"] = 1;
$country_provinces["status"] = 1;

include view("country_provinces", "add");
