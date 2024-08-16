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
    array_push($error, "ID is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!user_options_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!user_options_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $user_options = new User_options();
    $user_options->setUser_options($id);

    include view("user_options", "edit");
} else {
    include view("home", "pageError");
}    


