<?php

//$config_server = "loccalhost";
////$config_db = "factuxeu_cloud";
//$config_db = "factcux_demo";
//$config_login = "rocot";
//$config_pass = 'rocot';

try {

//    $config_page = 'config_' . $_SERVER['SERVER_NAME'] . '.php';
    $config_page = '../admin/config_localhost.php';

    include $config_page;

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    $db = new PDO("mysql:host=$config_server;dbname=$config_db", "$config_login", "$config_pass", $options);
} catch (Exception $e) {

    die(" 1) Data base conection error... ");
}



