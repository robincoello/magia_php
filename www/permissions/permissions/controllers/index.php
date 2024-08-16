<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

$permissions = null;
$pag = 0;
$rol = null;

//$permissions = permissions_list($pag);
//// pagination
//$totalItems = count($permissions);
//
//$url = "index.php?c=$c&a=$a";
################################################################################
$pagination = new Pagination($page, permissions_list());
// puede hacer falta
//$pagination->setUrl($url);
$permissions = permissions_list($pagination->getStart(), $pagination->getLimit());
################################################################################

if (!$error) {
    include view("permissions", "index");
} else {
    include view("home", 'pageError');
}
