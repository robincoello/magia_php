<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$_content = _content_list();

$error = array();

if (!$error) {
    include view("_content", "po");
} else {
    include view("home", "pageError");
}
