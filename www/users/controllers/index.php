<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


################################################################################
$pagination = new Pagination($page, users_list());
// puede hacer falta
//$pagination->setUrl("");
$users = users_list($pagination->getStart(), $pagination->getLimit());
################################################################################

include view("users", "index");
