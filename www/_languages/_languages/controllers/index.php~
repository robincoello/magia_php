<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_languages = null;
//$_languages = _languages_list(10, 5);
$_languages = _languages_list_by_status(1);

//include "www/_languages/views/index.php";
include view("_languages", "index");
if ($debug) {
    include "www/_languages/views/debug.php";
}