<?php

include './config.php';
include './campos.php';
include './v2.php';
include './bd.php';

################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- Tablas por crear el plugin\n" . "\n";
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




echo "Deseas ejecutar en todos s/n?\n";
do {

    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion != "s");

################################################################################
################################################################################

for ($i = 0; $i <= count($plugins); $i++) {

    $plugin = $plugins[$i];

    echo "\n";
    echo $i;
    echo "\n";

    crear_plugin($plugin);
    crear_clase($plugin);
    echo "###########################################################\n";
    echo "Registro del plugin como controlador en la base de datos\n";
    echo var_dump(bdd_add_controllers($plugin));
    echo "###########################################################\n";
    echo "Agrego los permisos para el root" . "\n";
    bdd_add_permissions($plugin, "admin", 1111);
    echo "Agrego los permisos para admin \n";
    bdd_add_permissions($plugin, "root", 1111);

    echo "agrego al menu \n";
    bdd_add_en_menu("top", "config", $plugin, "index.php?c=$plugin", "far fa-folder", "0");

    echo "Registro en la tabla magia\n";
    magia_registrar_en_tabla($plugin);

    echo "############################################################\n";
    echo "Registro en Magia";
    echo "\n";
}




################################################################################
################################################################################


