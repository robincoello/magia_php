<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}


if (!is_id($id)) {
    array_push($error, 'Id format error');
}

if (intval(users_total_by_rol(rols_field_id("rol", $id))) > 0) {
    array_push($error, "There are users with this role, this role cannot be deleted");
}

if ($rol == "root") {
    array_push($error, "Please don t delete root rol");
}




if (!$error) {

    rols_delete(
            $id
    );

    header("Location: index.php?c=rols");
}

include view("home", "pageError");
