<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$panels = null;
$panels = panels_list();
//
include view("panels", "export_pdf");
if ($debug) {
    include "www/panels/views/debug.php";
}