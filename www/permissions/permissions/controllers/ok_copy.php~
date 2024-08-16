<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$rol_from = (isset($_POST["rol_from"])) ? clean($_POST["rol_from"]) : false;
$rol_to = (isset($_POST["rol_to"])) ? clean($_POST["rol_to"]) : false;

$error = array();
//
################################################################################
//
if (!$rol_from) {
    array_push($error, "Role from don't send");
}
if (!$rol_to) {
    array_push($error, "Role to don't send");
}
if (rols_details($rol_to)) {
    array_push($error, "Role to dont find");
}
//if ($rol_from == "root") {
//    array_push($error, "Copy root role disabled");
//}
################################################################################
//// no puedo copiar desde  roles q son superiores al mio 
if (rols_rango_by_rol($u_rol) < rols_rango_by_rol($rol_from)) {
    array_push($error, "You cannot copy a role with a higher rank");
}
//// no puedo copiar hacia roles que son superiores al mio
if (rols_rango_by_rol($u_rol) < rols_rango_by_rol($rol_to)) {
    array_push($error, "You cannot copy to a role with a higher rank");
}
////
################################################################################
if (!$error) {

    permissions_copy_from_to($rol_from, $rol_to);

    header("Location: index.php?c=permissions&a=search&w=byRol&rol=$rol_to");
}



include view("home", "pageError");
