<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$contact = contacts_details($u_id);

if (!$contact) {
    array_push($error, "Contact not exist");
}


if (!$error) {
    include view("my_info", "language");
} else {
    include view("home", "pageError");
}
