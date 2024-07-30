<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */
//
$pc = $_SERVER['SERVER_NAME'];
//
switch ($pc) {
    case $pc:
    case "http://" . $pc:
    case "https://" . $pc:
        include "config_$pc.php";
        break;
    default:
        //Por defecto  
        break;
}
//
//
try {

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4');

    $db = new PDO("mysql:host=$config_server;dbname=$config_db", $config_login, $config_pass, $options);
} catch (Exception $e) {

    die($pc . " 1 - ) Data base conection error... ");
}

