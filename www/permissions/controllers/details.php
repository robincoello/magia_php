<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
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

if (!permissions_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!permissions_field_id("*", $id)) {
    array_push($error, "id not exist");
}
##########################################################################
$permissions = permissions_details($id);

if (!$permissions) {
    array_push($error, "Permission id not found");
}

////////////////////////////////////////////////////////////////////////////////
if (!$error) {
    include view("permissions", "details");
} else {
    include view("home", "pageError");
}

