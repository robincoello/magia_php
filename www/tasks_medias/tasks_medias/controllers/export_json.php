<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $tasks_medias = new Tasks_medias();
    $tasks_medias->setTasks_medias($id);

    include view("tasks_medias", "export_json");
} else {
    include view("home", "pageError");
}    
