<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
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
if (!panels_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    panels_delete(
            $id
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=panels");
            break;

        case 2:
            header("Location: index.php?c=panels&a=edit&id=$id");
            break;

        case 5: // custom
            header("Location: index.php?c=xxx&a=yyy");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view("home", "pageError");
}  
