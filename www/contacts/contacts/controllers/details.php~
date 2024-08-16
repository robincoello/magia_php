<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
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

if (!contacts_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!contacts_field_id("id", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {

    $contacts = contacts_details($id);

    // cada vez que se muestra un contacto, se agrega 1 a order by
    contacts_update_order_by($id, contacts_field_id('order_by', $id) + 1);

    include view("contacts", "details");
} else {

    include view("home", "pageError");
}

