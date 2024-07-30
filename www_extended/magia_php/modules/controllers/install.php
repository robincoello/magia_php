<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$modules = null;
//$url = "https://cloud.gestionmanager.com/index.php?c=api&a=modules";
$url = "https://cloud.factux.be/index.php?c=api&a=modules";

$json = file_get_contents($url);

$modules = json_decode($json, true);

include view("modules", "install");

