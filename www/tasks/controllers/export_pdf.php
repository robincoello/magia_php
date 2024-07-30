<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$tasks = null;
$tasks = tasks_list();
//
include view("tasks", "export_pdf");
if ($debug) {
    include "www/tasks/views/debug.php";
}