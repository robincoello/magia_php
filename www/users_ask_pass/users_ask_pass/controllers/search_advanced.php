<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/users_ask_pass/views/search_advanced.php";
include view("users_ask_pass", "search_advanced");
