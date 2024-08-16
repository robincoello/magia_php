<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$contacts_list = contacts_list();

include view("contacts", "check_tva");

if ($debug) {

    include view("contacts", "debug");
}
