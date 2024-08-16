<?php

include './config.php';
include './campos.php';
include './v2.php';

################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "Nombre del plugin?\n";
do {
    $plugin = trim(fgets(STDIN)); // lee una línea de STDIN    
} while ($plugin == "");
echo "Creation del plugin $plugin \n";
################################################################################
################################################################################


crear_plugin($plugin);
echo "###########################################################\n";
echo "Registro del plugin como controlador en la base de datos\n";
echo var_dump(bdd_add_controllers($plugin));
echo "###########################################################\n";
echo "Agrego los permisos para el root" . "\n";
bdd_add_permissions($plugin, "admin", 1111);
echo "Agrego los permisos para admin \n";
bdd_add_permissions($plugin, "root", 1111);

echo "agrego al menu \n";
echo var_dump(bdd_add_en_menu("top", "config", $plugin, "?c=$plugin", "far fa-folder", "0"));

echo "Registro en la tabla magia\n";
magia_registrar_en_tabla($plugin);

echo "############################################################\n";
echo "Registro en Magia";
echo "\n";
