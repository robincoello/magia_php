<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$home_page = (isset($_REQUEST["home_page"])) ? clean($_REQUEST["home_page"]) : false;

$error = array();

if (!$home_page) {
    array_push($error, "page is mandatory");
}


################################################################################
if (!$error) {
    // si existe lo actualiza, sino lo crea
    user_options_push_data(
            $u_id, "home_page", $home_page
    );

    header("Location: index.php?c=my_info&a=home_page&sms=1");
} else {
    include view('home', 'pageError');
}

    