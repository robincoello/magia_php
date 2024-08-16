<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$contacts_positions = null;
$contacts_positions = contacts_positions_list(10, 5);

//include "www/contacts_positions/views/index.php";
include view("contacts_positions", "index");
if ($debug) {
    include "www/contacts_positions/views/debug.php";
}