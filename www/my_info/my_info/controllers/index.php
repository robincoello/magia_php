<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$contact = contacts_details($u_id);

if (!$contact) {
    array_push($error, "contact not exist");
}

if (!$error) {
    //include "www/my_info/views/index.php";

    include view('my_info', 'index');
} else {

    header("Location: index.php?c=home&a=pageError&smst=infi&smsm=Contact no exist");
}
