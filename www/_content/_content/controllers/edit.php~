<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################
if (!_content_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {
    $_content = _content_details($id);

    include view("_content", "edit");
} else {
    include view("home", "pageError");
}