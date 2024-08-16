<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
################################################################################
$pagination = new Pagination($page, addresses_list());
//$pagination->setUrl($url);
$addresses = addresses_list($pagination->getStart(), $pagination->getLimit());
################################################################################
include view("addresses", "index");

if ($debug) {

    include "www/addresses/views/debug.php";
}