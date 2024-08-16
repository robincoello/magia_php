<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$controllers = null;
$error = array();
################################################################################
// $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
$pagination = new Pagination($page, controllers_list());
// puede hacer falta
//$pagination->setUrl($url);
$controllers = controllers_list($pagination->getStart(), $pagination->getLimit());
################################################################################
//$controllers = controllers_list(10, 5);

include view("controllers", "index");

if ($debug) {
    include "www/controllers/views/debug.php";
}