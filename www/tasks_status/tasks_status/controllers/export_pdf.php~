<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$tasks_status = null;
$tasks_status = tasks_status_list();
//
include view("tasks_status", "export_pdf");
if ($debug) {
    include "www/tasks_status/views/debug.php";
}