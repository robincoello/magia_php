<?php

/*

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$action     = (isset($_REQUEST['action'])) ?    clean($_REQUEST['action']) : false;
$id         = (isset($_REQUEST['id'])) ?        clean($_REQUEST['id']) : false;


$error = array();

if (!is_numeric($id)) {
    array_push($error, "Id not numeric");
}


if ($action == "delete") {
    if (!$error) {
        users_del(
                $id
        );

        header("Location: index.php?c=users_list");
    } else {
        foreach ($error as $key => $value) {
            message("info", "<h2>$key - $value</h2>");
        }
    }
}

include "view/users_edit.php";
*/