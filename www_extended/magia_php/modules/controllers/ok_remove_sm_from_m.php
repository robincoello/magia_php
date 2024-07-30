<?php

/**
 * pone null al campo padre de u nmodulo
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$father = (isset($_REQUEST["father"])) ? clean($_REQUEST["father"]) : false;
//$module = (isset($_REQUEST["module"])) ? clean($_REQUEST["module"]) : false;
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

################################################################################
################################################################################
################################################################################
################################################################################
// lista de sub_modulos de un modulo, 
//$sm_list = modules_search_sub_modules_by_module($module); 
// agrego al final el sub_modulo, 
//$new_sm = $sm_list . ", " . $sm ; 
// actualizo los sub_modulos en la DB
################################################################################

if (!$error) {


    modules_update_field($id, 'father', null);

    switch ($redi['redi']) {

        case 1:
            header("Location: index.php?c=modules");
            break;

        case 2:
            header("Location: index.php?c=modules&a=details&id=$redi[id]");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {


    include view("home", "pageError");
}

