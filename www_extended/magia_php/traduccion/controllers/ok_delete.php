<?php
/**
 * Delete
 */
if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] != "" ) ? clean($_REQUEST["contact_id"]) : false;
//
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
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
if (!api_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

//    api_delete(
//            $id
//    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=api");
            break;

        case 2:
            header("Location: index.php?c=api&a=edit&id=$id");
            break;

        case 5: // custom
            header("Location: index.php?c=contacts&a=api&id=$contact_id#5");
            break;

        case 6: // 
            header("Location: index.php?c=xxx&a=yyy");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view("home", "pageError");
}  
 
