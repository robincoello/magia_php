<?php

/**
 * Agrega un campo de la base de datos a los archivos 
 */
include './config.php';
include './campos.php';
include './v2.php';
include './bd.php';

$config_destino = "www";

################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- Add field -----\n" . "\n";

echo "Folder: $config_destino \n";

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

echo "Escoja una tabla ----:\n";
do {
    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion > count($plugins) || $opcion <= -1);

$plugin = $plugins[$opcion];

################################################################################
# pido de cojer una tabla
# pido de cojer una columna que no este en los formularios 
# agrego el campo al formuario 
# abrego el campo en 
# 
# Crea temporal 
# copia $option desde el inicio hasta $opcion
# crear data desde la DB
# sigue copiando el resto 
# borra temporal 
################################################################################
// crea en consola/tmp.php
//crear_archivo('tmp.php', '<?php');

busca_y_borra_parte_de_documento('../www/test/views/form_add.php', 'number', '/number');

echo "\n";
echo "\n";
echo "\n";
