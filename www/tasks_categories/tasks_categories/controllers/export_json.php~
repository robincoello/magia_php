<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();
$tasks_categories = null;
$tasks_categories = tasks_categories_list();
//
include view("tasks_categories", "export_json");

if ($debug) {
    include "www/tasks_categories/views/debug.php";
}