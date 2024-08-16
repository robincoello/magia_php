<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!tasks_medias_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!tasks_medias_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $tasks_medias = new Tasks_medias();
    $tasks_medias->setTasks_medias($id);

    include view("tasks_medias", "edit");
} else {
    include view("home", "pageError");
}    


