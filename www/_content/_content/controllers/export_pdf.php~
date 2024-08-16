<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
include view("home", "disabled");
die();

$error = array();
$_content = null;
$_content = _content_list();

//include "www/_content/views/export_pdf.php";
include view("_content", "export_pdf");
if ($debug) {
    include "www/_content/views/debug.php";
}