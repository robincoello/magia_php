<?php

// 
// 
//$timeout = (8 * 60 * 60);
//ini_set("session.gc_maxlifetime", $timeout);
//ini_set("session.cookie_lifetime", $timeout);
//session_start();
//Set a very long lifetime for the session cookie:
//$lifetime = 60 * 60 * 24 * 365 * 10; // 10 years in seconds
$lifetime = 60 * 60 * 24 * 30; // 30 days in seconds
ini_set("session.cookie_lifetime", $lifetime);
////
// Disable the session garbage collection by setting the gc_maxlifetime to a very high value:
ini_set("session.gc_maxlifetime", $lifetime);
//
//Use HTTPS to encrypt session cookies.
//Set the session.cookie_secure flag to ensure cookies are only sent over HTTPS:
ini_set("session.cookie_secure", 1);
//
//Use the session.cookie_httponly flag to help mitigate the risk of client-side script access to the session cookie:
//Start the session:
ini_set("session.cookie_httponly", 1);
//
session_start();
//
require "admin/conect_db.php";
if (file_exists("admin/config_cpanel.php")) {
    require "admin/config_cpanel.php";
}
$directory = 'functions';
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (!is_dir("functions/$archivo")) {
        require "functions/" . ($archivo);
    }
}
//
$directory = 'www';
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("www/$archivo")) {
        require "www/$archivo/functions.php";
    }
}
// Models
$directory = 'www';
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("www/$archivo")) {
        require "www/$archivo/models/" . ucfirst($archivo) . ".php";
    }
}
###############################################################################
# www_extended
###############################################################################
// functions
$directory = "www_extended/$config_theme";
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("www_extended/$config_theme/$archivo")) {
        require "www_extended/$config_theme/$archivo/functions.php";
    }
}
// Models
$directory = 'www_extended/' . $config_theme;
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("$directory/$archivo")) {
        require "$directory/$archivo/models/" . ucfirst($archivo) . ".php";
    }
}
/////////////////////////////////////////////////////////////////////////////////
require "admin/config.php";
include "www/contacts/models/Company.php";
//
//https://github.com/madorin/matex
include 'includes/matex-master/src/Evaluator.php';
//
//
$u_rol = ( isset($_SESSION['u_rol']) ) ? $_SESSION['u_rol'] : false;
$u_id = ( isset($_SESSION['u_id']) ) ? $_SESSION['u_id'] : false;
$u_language = users_field_contact_id('language', $u_id);
$u_owner_id = contacts_field_id("owner_id", $u_id);
//******************************************************************************
$smst = (isset($_REQUEST['smst'])) ? clean($_REQUEST['smst']) : false;
$smsm = (isset($_REQUEST['smsm'])) ? clean($_REQUEST['smsm']) : false;
$page = ( isset($_GET['page']) && !empty($_GET['page']) ) ? (int) strip_tags($_GET['page']) : 1;
// aca asigno por primera vez el c
$c = (isset($_REQUEST['c'])) ? clean($_REQUEST['c']) : "home";
$a = (isset($_REQUEST['a'])) ? clean($_REQUEST['a']) : "index";
// protjer a c y a 

$u_controller = $c;
#########################################################################
// si hay un controldor por defecto lo usamos 
// esto para evitar el usar 
// index.php?c=public_html&a=about y usar 
// index.php?a=about
// en miras de usar url amigables
//
$error = array();
$mensajes = array();
if (
        $_SERVER['SERVER_PORT'] == hexdec('0x50') &&
        (
        $_SERVER['SERVER_NAME'] != "localhost" &&
        $_SERVER['SERVER_NAME'] != "0.0.0.0" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.0" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.1" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.2" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.3" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.4" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.5" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.6" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.7" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.8" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.9" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.10" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.11" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.21" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.22" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.23" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.24" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.30" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.43" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.44" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.45" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.46" &&
        $_SERVER['SERVER_NAME'] != "127.0.0.50" &&
        $_SERVER['SERVER_NAME'] != "192.168.0.5" &&
        $_SERVER['SERVER_NAME'] != "192.168.0.2" &&
        $_SERVER['SERVER_NAME'] != "192.168.0.98"
        )
) {
    echo ' <meta http-equiv="refresh" content="0; URL=https://' . $_SERVER['SERVER_NAME'] . '"> ';
    die();
}


//vardump(modules_search_module_by_sub_module($c));
// Esto verifica si el modulo al que pertenece este modulo esta activo 
// sino esta da error 
//if (!modules_field_module('status', modules_search_module_by_sub_module($c))) { 
//if (!modules_field_module('status', modules_search_module_by_sub_module($c))) { 
//// // es el padre q dee estar activo
//// si el modulo o su padre estan inactivos
//    if (!modules_field_module('status', $c) || !modules_field_module('status', modules_field_module('father', $c))) {
//        // si el controlador es el inicio de pagina y tiene el plugin bloqueado 
//        // lo mandamos a contacts
//        if (_options_option('home_page') == $c) {
//            header("Location: index.php?c=contacts");
//        }
//
////        array_push($error, modules_search_module_by_sub_module($c));
//        array_push($error, "Module: $c");
//        array_push($error, "The module is inactive");
//        
//        include view('home', 'pageError');
//        die();
//    }
//}
//
// si el padre del modulo IS NOT NULL

$fatherModule = modules_field_module('father', $c);

if (!modules_field_module('status', $c)) {
    array_push($error, "$c");
    array_push($error, "The module is inactive");
}

if ($fatherModule && !modules_field_module('status', $fatherModule)) {
    array_push($error, "$c");
    array_push($error, "The father module is inactive");
}


if (!empty($error)) {
    include view('home', 'pageError');
} else {
    include controller($c, $a);
}
