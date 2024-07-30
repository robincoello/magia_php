<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$users_ask_pass = null;
$users_ask_pass = users_ask_pass_list(10, 5);

//include "www/users_ask_pass/views/index.php";
include view("users_ask_pass", "index");
if ($debug) {
    include "www/users_ask_pass/views/debug.php";
}