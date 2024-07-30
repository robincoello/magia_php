<?php

/**
 * Agrega un modulo huerfano a un modulo
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$father = (isset($_REQUEST["father"])) ? clean($_REQUEST["father"]) : false;
$module = (isset($_REQUEST["module"])) ? clean($_REQUEST["module"]) : false;
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

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

//    if (modules_field_module('id', $module)) { // si modulo existe
//        // actualizamos father 
//        modules_update_father($module, $father);
//    } else { // sino, creamos modulo
//        modules_add(ucfirst($module), $father, $module, '', '', '', '', '', 1, 1);
//    }


    modules_add($module, $father, $module, '', '', '', '', '', 1, 1);

    header("Location: index.php?c=modules&a=details&id=$id");
} else {
    array_push($error, "Check your form");

    include view("home", "pageError");
}

