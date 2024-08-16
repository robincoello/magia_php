<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$countries = null;

################################################################################
$pagination = new Pagination($page, countries_list());
// puede hacer falta
//$pagination->setUrl($urlcountries_list);
$countries = countries_list($pagination->getStart(), $pagination->getLimit());
################################################################################
//$countries = countries_list(10, 5);
//include "www/countries/views/index.php";
include view("countries", "index");
if ($debug) {
    include "www/countries/views/debug.php";
}