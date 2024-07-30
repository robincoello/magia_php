<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $user_options = new User_options();
    $user_options->setUser_options($id);

    include view("user_options", "export_json");
} else {
    include view("home", "pageError");
}    
