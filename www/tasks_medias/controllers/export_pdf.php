<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$tasks_medias = null;
$tasks_medias = tasks_medias_list();
//
include view("tasks_medias", "export_pdf");
if ($debug) {
    include "www/tasks_medias/views/debug.php";
}