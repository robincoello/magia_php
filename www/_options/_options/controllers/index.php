<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$_options = null;

################################################################################
$pagination = new Pagination($page, _options_list());
// puede hacer falta
//$pagination->setUrl($url);
$_options = _options_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$_options = _options_list(10, 5);


include view("_options", "index");

if ($debug) {
    include "www/_options/views/debug.php";
}