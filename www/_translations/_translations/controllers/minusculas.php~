<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$_translations = null;
$_translations = _translations_minusculas();

include view("_translations", "minusculas");

if ($debug) {
    include "www/_translations/views/debug.php";
}