<?php

include './config.php';
include './campos.php';
include './v2.php';
include './bd.php';

$config_destino = "www_extended/default";
################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- Tablas por crear el plugin\n";
echo "-- www_extended-- " . "\n";
echo "\n\n";
$plugins = array();
$i = 1;
foreach (bd_tablas($config_db) as $key => $value) {
    //echo var_dump($value);  
    $ti = "Tables_in_$config_db";
    if (!file_exists("../$config_destino/$value[$ti]")) {
        array_push($plugins, $value[$ti]);
        //echo "$i - $value[$ti] \n"; 
    }
    $i++;
}
$i = 0;
foreach ($plugins as $key => $p) {
    echo "$i) $p \n";
    $i++;
}
echo "Escoja un plugin?\n";
do {
    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion > count($plugins) || $opcion <= -1);
$plugin = $plugins[$opcion];
if ($plugin) {
    crear_mvc_esqueleto($plugin);
    echo "###########################################################\n";
    echo "############################################################\n";
    echo "\n";
}