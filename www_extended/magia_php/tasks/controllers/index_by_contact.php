<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$tasks = null;

// Creados por mi
// o 
// asignados a mi 
// 
################################################################################
$pagination = new Pagination($page, tasks_search_by_contact_id($u_id));
// puede hacer falta
//$pagination->setUrl($url);
//$tasks = tasks_list($pagination->getStart(), $pagination->getLimit());
$tasks = tasks_search_by_contact_id($u_id, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$tasks = tasks_list(10, 5);


include view("tasks", "index");

if ($debug) {
    include "www/tasks/views/debug.php";
}