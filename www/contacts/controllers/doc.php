<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
//
//
//
//$error = array();
//$contacts = null;
//$contacts = contacts_list(10, 5);
//    
////include "www/contacts/views/index.php";
include view("contacts", "doc");
//if ($debug) {
//    include "www/contacts/views/debug.php";
//}