<?php

if (!$_SESSION) {
    header("Location: index.php?c=home#2");
}





$smst = (isset($_REQUEST['smst'])) ? clean($_REQUEST['smst']) : false;
$smsm = (isset($_REQUEST['smsm'])) ? clean($_REQUEST['smsm']) : false;

//if (permissions_has_permission($u_rol, "shop", "read")) {
//    header("Location: index.php?c=shop");
//} else {
//
//    // opcion de la base de datos
//    // si el usuario tiene homepage lo pasamos sino el por defecto 
//    $start_home_page = user_options('home_page') ? user_options('home_page') : _options_option("home_page");
//
//    $home_page = ($start_home_page && controllers_is_controller($start_home_page)) ? $start_home_page : "home";
//
//    if ($home_page !== 'home') {
//        if (permissions_has_permission($u_rol, $home_page, "read")) {
//            header("Location: index.php?c=$home_page");
//        }
//    }
//}

include view('home', 'wellcome');

