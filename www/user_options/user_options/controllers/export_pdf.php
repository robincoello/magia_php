<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$user_options = null;
$user_options = user_options_list();
//
include view("user_options", "export_pdf");
if ($debug) {
    include "www/user_options/views/debug.php";
}