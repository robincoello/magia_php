<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$rol = null;

$rol = (isset($_GET["rol"]) && $_GET["rol"] != '' ) ? clean($_GET["rol"]) : false;
$controller = (isset($_GET["controller"]) && $_GET["controller"] != '' ) ? clean($_GET["controller"]) : false;

include view("permissions", "add");
