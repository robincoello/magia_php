<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$pagination = null;
################################################################################
$pagination = new Pagination($page, logs_list());
// puede hacer falta
//$pagination->setUrl($url);
$logs = logs_list($pagination->getStart(), $pagination->getLimit());
################################################################################

include view("logs", 'index');

