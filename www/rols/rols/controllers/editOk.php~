<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$rango = (isset($_POST["rango"])) ? clean($_POST["rango"]) : false;
$order = (isset($_POST["order"])) ? clean($_POST["order"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$rol) {
    array_push($error, "Rol Don't send");
}
//
################################################################################

if (!is_id($id)) {
    array_push($error, "ID format error");
}

if ($rol == "root") {
    array_push($error, "Please don t edit root rol");
}


if ($rango >= rols_rango_by_rol('root')) {
    array_push($error, 'You must add a rank lower than the rank of the root');
}




################################################################################

if (!$error) {

    rols_edit(
            $id, $rol, $rango, $order
    );
    header("Location: index.php?c=rols&a=details&id=$id");
}

include view("home", "pageError");
