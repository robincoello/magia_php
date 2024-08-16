<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

//include "www/users_ask_pass/views/add.php";
include view("users_ask_pass", "add");
