<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//
//$error = array();
//$contacts = null;
////$contacts = contacts_list(10, 5);
//
//################################################################################
//$pagination = new Pagination($page, contacts_list());
//// puede hacer falta
////$pagination->setUrl($url);
//$contacts = contacts_list($pagination->getStart(), $pagination->getLimit());
//################################################################################    
//


include view("contacts", "index");

