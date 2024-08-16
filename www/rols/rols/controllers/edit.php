<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################

if ($a != "edit") {
    array_push($error, "Action format error");
}
if (!rols_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {
    $rols = rols_details($id);

    include view("rols", "edit");
} else {
    array_push($error, "Check your form");

    include view("rols", "index");
}

