<?php

include './config.php';
include './campos.php';
include './v2.php';
include './bd.php';
$config_destino = "../www_extended/default";
//$config_destino = "www";
################################################################################
echo "-=-------------=-" . "\n";
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- Data Base: $config_db \n";
echo "-- Path: $config_destino -- " . "\n";
echo "\n\n";
$plugins_ext = array();
$i = 1;
//foreach (bd_tablas($config_db) as $key => $table) {    
//    $ti = "Tables_in_$config_db";
//    $class_file = "../$config_destino/$table[$ti]/models/" . ucfirst($table[$ti]) . ".php";
//    if (!file_exists($class_file)) {
//        echo "$class_file\n";
//        
//        array_push($plugins_ext, $table[$ti]);
//
////        echo "$i) $p ($class_file) \n" ;
//        //echo "$i - $value[$ti] \n"; 
//    }
//    $i++;
//}
//
//// Models
//$directory = 'www_extended/' . $config_theme;
$scanned_directory = array_diff(scandir($config_destino), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    $archivo = "$config_destino/$archivo/models/" . ucfirst($archivo) . ".php";
    if (!is_dir($archivo) && !file_exists($archivo)) {
        //require "$directory/$archivo/models/" . ucfirst($archivo) . ".php";
        array_push($plugins_ext, $archivo);
    }
}

$plugins_ext = array("banks");

////////////////////////////////////////////////////////////////////////////////
$i = 0;
foreach ($plugins_ext as $key => $p) {
    echo "$i) $p  \n";
    $i++;
}
echo "Escoja un plugin?\n";
do {
    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion > count($plugins_ext) || $opcion <= -1);
$plugin = $plugins_ext[$opcion];
if ($plugin) {
    crear_clase($plugin, true);
    echo "###########################################################\n";
    echo "############################################################\n";
//echo "Registro en Magia";
    echo "\n";
}