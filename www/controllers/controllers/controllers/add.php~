<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_GET["controller"])) ? clean($_GET["controller"]) : false;

include view("controllers", "add");
