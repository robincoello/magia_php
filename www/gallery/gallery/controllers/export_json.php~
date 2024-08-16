<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();
$gallery = null;
$gallery = gallery_list();
//
include view("gallery", "export_json");

if ($debug) {
    include "www/gallery/views/debug.php";
}