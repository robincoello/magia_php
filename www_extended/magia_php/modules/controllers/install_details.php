<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$module = ( isset($_GET["module"]) ) ? clean($_GET["module"]) : 1;

$error = array();

$url = "https://cloud.gestionmanager.com/index.php?c=api&a=modules_details&module=$module";
//https://cloud.gestionmanager.com/index.php?c=api&a=modules_details&module=api


$json = file_get_contents($url);

$module = json_decode($json, true);

include view("modules", "install_details");

