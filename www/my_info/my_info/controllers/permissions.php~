<?php

if (!permissions_has_permission($u_rol, $c, "rsssead")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

if (!$error) {
    //  include view("my_info", "permissions");
} else {
    include view('home', 'pageError');
}
