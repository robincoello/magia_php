<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$language = ( ($_POST["language"]) != "" ) ? clean($_POST["language"]) : false;

$error = array();

if (!$language) {
    array_push($error, '$language is mandatory');
}

if (!$error) {

    users_update_language($u_id, $language);

    header("Location: index.php?c=my_info&a=language");
} else {
    include view('home', 'pageError');
}
