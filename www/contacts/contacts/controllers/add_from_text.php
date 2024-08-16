<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$txt = (isset($_POST["txt"])) ? clean($_POST["txt"]) : false;

include view("contacts", "add_from_text");
