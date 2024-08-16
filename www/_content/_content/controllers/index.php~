<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$language = null;
################################################################################
// $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
$pagination = new Pagination($page, _content_list());
// puede hacer falta
//$pagination->setUrl($url);
//$_content = _content_list($pagination->getStart(), $pagination->getLimit());
$_content = _content_list($pagination->getStart(), $pagination->getLimit());
################################################################################
//$_content = _content_list(100, 0);
$l = "a";

if (!$error) {
    include view("_content", "index");
} else {
    include view("home", "pageError");
}

if ($debug) {
    include "www/_content/views/debug.php";
}