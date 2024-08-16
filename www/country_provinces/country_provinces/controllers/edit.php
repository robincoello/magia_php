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
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!country_provinces_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!country_provinces_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $country_provinces = country_provinces_details($id);

    include view("country_provinces", "edit");
} else {

    include view("home", "pageError");
}

