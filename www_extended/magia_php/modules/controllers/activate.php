<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################

if (!modules_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {

    $modules = modules_details($id);

    include view("modules", "activate");
} else {
    array_push($error, "Check your form");

    include view("modules", "index");
}

