<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$directory = null;

################################################################################
// $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
$pagination = new Pagination($page, directory_list());
// puede hacer falta
//$pagination->setUrl($url);
$directory = directory_list($pagination->getStart(), $pagination->getLimit());
################################################################################

include view("directory", "index");
if ($debug) {
    include "www/directory/views/debug.php";
}