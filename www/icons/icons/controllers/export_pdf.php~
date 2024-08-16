<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$icons = null;
$icons = icons_list();
//
include view("icons", "export_pdf");
if ($debug) {
    include "www/icons/views/debug.php";
}