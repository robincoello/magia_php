<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$position = (isset($_POST["position"])) ? clean($_POST["position"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!contacts_positions_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    contacts_positions_edit(
            $contact_id, $company_id, $position
    );
    header("Location: index.php?c=contacts_positions&a=details&id=$id");
}

$contacts_positions = contacts_positions_details($id);

include view("contacts_positions", "index");
