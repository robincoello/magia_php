<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$rols = null;
$rols = rols_list_order_by("rango");

include view("rols", "index");

if ($debug) {

    include "www/rols/views/debug.php";
}