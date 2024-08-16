<?php

include './config.php';
include './campos.php';
include './v2.php';
include './bd.php';

$config_destino = "www";

################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- All table in DB\n" . "\n";
echo "$config_destino \n";
$plugins = array();

$i = 1;
foreach (bd_tablas($config_db) as $key => $value) {
    $ti = "Tables_in_$config_db";
    //if (file_exists("../$config_destino/$value[$ti]")) {
    array_push($plugins, $value[$ti]);
    // }
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

echo "\n";
echo "## ANALISIS ###########################################################\n";
echo "Table: $plugin \n";
magia_analiza_tabla($plugin);
echo "## FIN ############################################################\n";
echo "\n";
