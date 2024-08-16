<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    country_provinces_delete(
            $id
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=country_provinces");
            break;
    }
} else {

    include view("home", "pageError");
}  
