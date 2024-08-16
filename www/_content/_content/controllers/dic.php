<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_content = null;
$_content = _content_list(0, 999);

include view("_content", "dic");
if ($debug) {
    include "www/_content/views/debug.php";
}