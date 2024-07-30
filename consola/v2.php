<?php

function bdd_referencias($tabla, $columna) {

    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT 
             REFERENCED_TABLE_NAME, 
             REFERENCED_COLUMN_NAME 
             FROM 
             INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE Table_name = :tabla AND COLUMN_NAME = :columna
            ");
    $req->execute(array(
        "tabla" => $tabla,
        "columna" => $columna
    ));
    $data = $req->fetch();
    return $data;
}

function bdd_columnas_segun_tabla($tabla) {
    global $db;

    if (!$tabla) {
        return null;
    }
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM $tabla
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}

function bdd_total_columnas_segun_tabla($tabla) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT * FROM $tabla
            ");
    $req->execute();
    $data = $req->columnCount();
    return $data;
}

function bdd_add_controllers($plugin) {
    global $db;
    $req = $db->prepare("            
             INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, :plugin , :plugin, :plugin); 
            ");
    $req->execute(array(
        "plugin" => $plugin
    ));
    return $db->lastInsertId();
}

function bdd_add_module($plugin) {
    global $db;
    $req = $db->prepare("            
             INSERT INTO `modules` (`id`, `label`, `father`, `module`, `description`, `author`,`author_email`,`url`,`version`,`order_by`, `status`) 
             VALUES                (:id, :label , :father,  :module,  :description,  :author, :author_email, :url, :version, :order_by, :status); 
            ");
    $req->execute(array(
        "id" => null,
        "label" => $plugin,
        "father" => null,
        "module" => $plugin,
        "description" => $plugin,
        "author" => 'Róbinson Coello S.',
        "author_email" => 'robincoello@hotmail.com',
        "url" => 'https://coello.be',
        "version" => '0.0.1',
        "order_by" => 1,
        "status" => 1
    ));
    return $db->lastInsertId();
}

function bdd_is_controller_in_db($plugin) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `controllers` WHERE `controller`=:controller ; 
            ");
    $req->execute(array(
        "controller" => $plugin
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_is_module_in_db($plugin) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `modules` WHERE `module`=:module ; 
            ");
    $req->execute(array(
        "module" => $plugin
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_add_permissions($plugin, $rol, $permiso) {
    global $db;

    $req = $db->prepare("            
             INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, :rol, :plugin, :permiso);
            ");
    $req->execute(array(
        "rol" => $rol,
        "plugin" => $plugin,
        "permiso" => $permiso
    ));
}

function bdd_is_permission_in_db($plugin, $rol) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `permissions` WHERE `rol`=:rol AND `controller`=:controller ; 
            ");
    $req->execute(array(
        "controller" => $plugin,
        "rol" => $rol,
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_menu_search($location, $father_id, $label) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT * FROM _menus WHERE `location` = :location AND `father_id` = :father_id AND `label` = :label
            ");
    $req->execute(array(
        "location" => $location,
        "father_id" => $father_id,
        "label" => $label
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_add_en_menu($location, $father_id, $label, $controller, $url, $target = null, $icon = 'glyphicon glyphicon-file', $order_by = 1, $status = 1) {
    global $db;

    $req = $db->prepare("            
             INSERT INTO `_menus` (`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
                           VALUES (:id,  :location,  :father_id,  :label,  :controller,  :url,  :target,  :icon,  :order_by,  :status);
            ");
    $req->execute(array(
        "id" => null,
        "location" => $location,
        "father_id" => $father_id,
        "label" => $label,
        "controller" => $controller,
        "url" => $url,
        "target" => null,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status
    ));
    return $db->lastInsertId();
}

function bdd_add_en_magia($base_datos, $tabla, $campo, $accion, $label, $tipo, $tabla_externa, $columna_externa, $clase, $nombre, $identificador, $marca_agua, $valor, $solo_lectura = null, $obligatorio = null, $seleccionado = null, $desactivado = null, $orden = null, $estatus = null) {
    global $db;

    $req = $db->prepare("
           
            INSERT INTO `magia` (`id`, `base_datos`, `tabla`, `campo`, `accion`, `label`, `tipo`, `tabla_externa`, `columna_externa`, `clase`, `nombre`, `identificador`, `marca_agua`, `valor`, `solo_lectura`, `obligatorio`, `seleccionado`, `desactivado`, `orden`, `estatus`)                         
                         VALUES (:id,  :base_datos,  :tabla,  :campo,  :accion,  :label,  :tipo,  :tabla_externa,  :columna_externa,  :clase, :nombre, :identificador, :marca_agua, :valor, :solo_lectura, :obligatorio, :seleccionado, :desactivado, :orden, :estatus);
           

           ");
    $req->execute(array(
        "id" => null,
        "tabla" => $tabla,
        "base_datos" => $base_datos,
        "campo" => $campo,
        "accion" => $accion,
        "label" => $label,
        "tipo" => $tipo,
        "tabla_externa" => $tabla_externa,
        "columna_externa" => $columna_externa,
        "clase" => $clase,
        "nombre" => $nombre,
        "identificador" => $identificador,
        "marca_agua" => $marca_agua,
        "valor" => $valor,
        "solo_lectura" => $solo_lectura,
        "obligatorio" => $obligatorio,
        "seleccionado" => $seleccionado,
        "desactivado" => $desactivado,
        "orden" => $orden,
        "estatus" => $estatus
    ));
}

function contenido_controllers($plugin, $archivo) {

    switch ($archivo) {
        ## add.php
        case "add.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; ';

//            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
//
//                $field = $columna['Field'];
//
//                $default = ($columna['Default']) ? $columna['Default'] : " false ";
//
//                if ($default == 'current_timestamp()') {
//                    $default = 'date("Y-m-d")';
//                }
//
//                if ($default) {
//                    $contenido .= '$' . $plugin . '["' . $columna['Field'] . '"] = ' . $default . ';' . "\n";
//                }
//            }

            $contenido .= '
include view("' . $plugin . '", "add");                 
';

            break;

        ## details.php
        case "details.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" )      ? clean($_REQUEST["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (! $id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "details");
} else {
    include view("home", "pageError");
}    

';
            break;

        ## edit.php
        case "edit.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" ) ? clean($_REQUEST["id"]) : false;

$error = array();


###############################################################################
# REQUERIDO
################################################################################
if (! $id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "edit");
} else {
    include view("home", "pageError");
}    


';
            break;

        ## export_json.php
        case "export_json.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "export_json");
} else {
    include view("home", "pageError");
}    
';
            break;

        ## export_pdf.php
        case "export_pdf.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$' . $plugin . ' = null;
$' . $plugin . ' = ' . $plugin . '_list();
//
include view("' . $plugin . '", "export_pdf");      
if ($debug) {
    include "www/' . $plugin . '/views/debug.php";
}';
            break;

        ## delete.php
        case "delete.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]) && $_GET["id"] !="" )         ? clean($_GET["id"]) : false;


$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (! $id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
###############################################################################
# CONDICIONAL
################################################################################
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
################################################################################
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "delete");
} else {
    include view("home", "pageError");
}    

';
            break;

        ## index.php
        case "index.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_' . $plugin . '_order_col", $data, "' . $plugin . '");
}
################################################################################
$' . $plugin . ' = null;
    
################################################################################
$pagination = new Pagination($page, ' . $plugin . '_list());
// puede hacer falta
//$pagination->setUrl($url);
$' . $plugin . ' = ' . $plugin . '_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$' . $plugin . ' = ' . $plugin . '_list(10, 5);
    

include view("' . $plugin . '", "index");  
    
if ($debug) {
    include "www/' . $plugin . '/views/debug.php";
}';
            break;

        ## ok_add.php
        case "ok_add.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $field = $columna['Field'];

                if ($field != 'id') {

                    switch ($field) {
                        case 'date_registre':
                            $default = " date('Y-m-d G:i:s') ";
                            break;
                        case 'code':
                            $default = " magia_uniqid() ";
                            break;

                        case 'order_by':
                        case 'status':
                            $default = "1";
                            break;

                        default:
                            $default = ($columna['Default']) ? $columna['Default'] : ' null ';
                            break;
                    }




                    $check_null = ($columna['Default'] === NULL) ? ' && $_POST["' . $field . '"] !="null" ' : "";

                    $contenido .= '$' . $field . ' = (isset($_POST["' . $field . '"]) && $_POST["' . $field . '"] !="" ' . $check_null . ') ? clean($_POST["' . $field . '"]) : ' . $default . ' ;' . "\n";
                }
            }
            $contenido .= '$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;';
            $contenido .= '  
$error = array();
################################################################################
# REQUIRED
################################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (!$' . $columna['Field'] . ') {
    array_push($error, \'' . ucfirst($columna['Field']) . ' is mandatory\');
}' . "\n";
                }
            }
            $contenido .= '
###############################################################################
# FORMAT
###############################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (! ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ') ) {
    array_push($error, \'' . ucfirst($columna['Field']) . ' format error\');
}' . "\n";
                }
            }
            $contenido .= '
###############################################################################
# CONDITIONAL
################################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Key'] == 'UNI') {
                    $contenido .= '
if( ' . $plugin . '_search_by_unique("id","' . $columna['Field'] . '", $' . $columna['Field'] . ')){
    array_push($error, \'' . ucfirst($columna['Field']) . ' already exists in data base\');
}
' . "\n";
                }
            }



            $contenido .= '  
//if( ' . $plugin . '_search($' . $columna['Field'] . ')){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = ' . $plugin . '_add(
        ';
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
                if ($columna['Field'] != 'id') {
                    $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
                }

                $i++;
            }
            $contenido .= ' 
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


';
            break;

        ## ok_edit.php
        case "ok_edit.php":
            $contenido = '<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
';
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
                $field = $columna['Field'];
                $default = ($columna['Default']) ? $columna['Default'] : '';
                if ($field != 'id') {
                    $contenido .= '$' . $field . ' = (isset($_REQUEST["' . $field . '"]) && $_REQUEST["' . $field . '"] !="") ? clean($_REQUEST["' . $field . '"]) : false;' . "\n";
                }
                //$contenido .= '$' . $columna['Field'] . ' = (isset($_POST["' . $columna['Field'] . '"]) && $_POST["' . $columna['Field'] . '"] !="" ) ? clean($_POST["' . $columna['Field'] . '"]) : false;' . "\n";
                $i++;
            }
            $contenido .= '$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false;';
            $contenido .= ' 
$error = array();
################################################################################
# REQUIRED
################################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (!$' . $columna['Field'] . ') {
    array_push($error, \'' . ucfirst($columna['Field']) . ' is mandatory\');
}' . "\n";
                }
            }
            $contenido .= '
###############################################################################
# FORMAT
###############################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (! ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ') ) {
    array_push($error, \'' . ucfirst($columna['Field']) . ' format error\');
}' . "\n";
                }
            }
            $contenido .= '
###############################################################################
# CONDITIONAL
################################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                if ($columna['Key'] == 'UNI') {
                    $contenido .= '
if( ' . $plugin . '_search_by_unique("id","' . $columna['Field'] . '", $' . $columna['Field'] . ')){
    array_push($error, \'' . ucfirst($columna['Field']) . ' already exists in data base\');
}
' . "\n";
                }
            }



            $contenido .= '  
//if( ' . $plugin . '_search($' . $columna['Field'] . ')){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    ' . $plugin . '_edit(
        ';
            $i = 1;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
                $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
                $i++;
            }
            $contenido .= ' 
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
';
            break;

        ## delete.php
        case "ok_delete.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id   = (isset($_REQUEST["id"])   && $_REQUEST["id"]   !="" )  ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] !="" ) ? ($_REQUEST["redi"]) : false;
$error = array();
###############################################################################
# REQUERIDO
################################################################################
if (! $id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if ( !$error) {
    
        ' . $plugin . '_delete(
                $id
        );
        
    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_delete&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}  
';
            break;

        ## delete.php
        case "ok_pagination_items_limit.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

$data = intval($data);

if ($data < 1 || $data > 1000) {
    array_push($error, "Must be between 1 and 1000");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config_' . $plugin . '_pagination_items_limit", $data, "' . $plugin . '");

switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_pagination_items_limit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;



        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
';
            break;

        ## delete.php
        case "ok_show_col_from_table.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST)) ? json_encode($_POST) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config_' . $plugin . '_show_col_from_table", $data, \'' . $plugin . '\');

switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;



        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_show_col_from_table&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;
            

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}

';
            break;

        case 'ok_index_cols_to_show.php':
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;


$error = array();

if ($data == "") {
    array_push($error, "Data is mandatory");
}

################################################################################
################################################################################
################################################################################
if (!$error) {
    
    _options_push("' . $plugin . '_index_cols_to_show", json_encode($data), "' . $plugin . '");

    switch ($redi[\'redi\']) {
        case 1:
            header("Location: index.php");
            break;
        
        case 2:
            header("Location: index.php?c=' . $plugin . '");
            break;
        
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=details&id=" . $redi[\'id\']);
            break;        

        default:
            header("Location: index.php");

            break;
    }
} else {

    include view("home", "pageError");
}







';
            break;

        ## search.php
        case "search.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$' . $plugin . ' = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $' . $plugin . ' = ' . $plugin . '_search_by_id($txt);
        break;
        

    #### --- ####################################################################
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $field = $columna['Field'];
                $default = ($columna['Default']) ? $columna['Default'] : false;

                if ($field != 'id') {
                    $contenido .= '    case "by_' . $field . '":
        $' . $field . ' = (isset($_GET["' . $field . '"]) && $_GET["' . $field . '"] != "" ) ? clean($_GET["' . $field . '"]) : false;
        ################################################################################
        $pagination = new Pagination($page, ' . $plugin . '_search_by("' . $field . '", $' . $field . '));
        // puede hacer falta
        $url = "index.php?c=' . $plugin . '&a=search&w=by_' . $field . '&' . $field . '=" . $' . $field . ';
        $pagination->setUrl($url);
        $' . $plugin . ' = ' . $plugin . '_search_by("' . $field . '", $' . $field . ', $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
';
                }
            }
            $contenido .= '
        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, ' . $plugin . '_search($txt));
        // puede hacer falta
        $url = "index.php?c=' . $plugin . 'a=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $' . $plugin . ' = ' . $plugin . '_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$' . $plugin . ' = ' . $plugin . '_search($txt);
        break;
}


include view("' . $plugin . '", "index");      
';
            break;

        ## search_advanced.php
        case "search_advanced.php":
            $contenido = '<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
include view("' . $plugin . '", "search_advanced");      
';
            break;

        default:
            $contenido = "------------";
            break;
    }

    return "$contenido";
}

function contenido_clase($plugin) {

    $contenido = '<?php
 // ' . $plugin . '
 // Date: ' . date('Y-m-d') . '    
################################################################################

class ' . ucfirst($plugin) . ' {

';

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        // if ($columna['Field'] != 'id') {

        $contenido .= "    /** \n";
        $contenido .= "    * " . $columna['Field'] . "\n";
        $contenido .= "    */ \n";
        $contenido .= "    public \$_" . $columna['Field'] . ";\n";

        //  }
    }


    $contenido .= '   

    function __construct() {
        //' . "\n";

    $contenido .= '}

################################################################################
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        // if ($columna['Field'] != 'id') {
        //$contenido .= '$' . $columna['Field'] . ' = (isset($_POST["' . $columna['Field'] . '"])) ? clean($_POST["' . $columna['Field'] . '"]) : false;' . "\n" ;
        $contenido .= "    function get" . ucfirst($columna['Field']) . " () {" . "\n";
        $contenido .= "        return \$this->_$columna[Field]; " . "\n";
        $contenido .= '    }' . "\n";
        //  }
    }
    $contenido .= '
################################################################################
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= "    function set" . ucfirst($columna['Field']) . " ($" . ($columna['Field']) . ") {" . "\n";
        $contenido .= "        \$this->_$columna[Field] = $" . ($columna['Field']) . "; " . "\n";
        $contenido .= '    }' . "\n";
    }
    $contenido .= '   
    function set' . ucfirst($plugin) . '($id) {
        $' . $plugin . ' = ' . $plugin . '_details($id);
        //' . "\n";

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= '        $this->_' . $columna['Field'] . ' = $' . $plugin . '["' . $columna['Field'] . '"];' . "\n";
    }


    $contenido .= '';

    $contenido .= '

}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return ' . $plugin . '_field_id($field, $id);
    }

    function field_code($field, $code) {
        return ' . $plugin . '_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return ' . $plugin . '_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return ' . $plugin . '_list($start, $limit);
    }

    function details($id) {
        return ' . $plugin . '_details($id);
    }

    function delete($id) {
        return ' . $plugin . '_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return ' . $plugin . '_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return ' . $plugin . '_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return ' . $plugin . '_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return ' . $plugin . '_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return ' . $plugin . '_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return ' . $plugin . '_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return ' . $plugin . '_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return ' . $plugin . '_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return ' . $plugin . '_function($col_name, $value);
        $res = null;
        switch ($col_name) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        echo "Field: " . $columna['Field'] . " \n";
        $tipo = campos_tipo($columna['Type']);
        $te = bdd_referencias($plugin, $columna['Field']);
        //echo var_dump($tabla_externa);
        //REFERENCED_TABLE_NAME, 
        //REFERENCED_COLUMN_NAME 
        $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
        $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
        $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
        //
        if ($bdd_ref_tabla_externa) {
            $contenido .= '        case "' . $columna['Field'] . '":
                return ' . $bdd_ref_tabla_externa . '_field_id("' . $bdd_col_externa . '", $value);
                break;
        ';
        }
    }
    $contenido .= '       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= '    function is_' . $columna['Field'] . '($' . $columna['Field'] . ') {' . "\n";
        $contenido .= '        return ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ');' . "\n";
        $contenido .= '    }' . "\n\n";
    }
    $contenido .= '
}
';

    return "$contenido";
}

function contenido_views($plugin, $archivo) {
    global $config_destino;
    switch ($archivo) {

        ## add.php
        case "add.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php include view("' . $plugin . '", "izq_add"); ?>' :
                    '       <?php include "izq.php"; ?>';
            $contenido .= '</div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?> 
            <?php _t("Add"); ?>
        </h1>
        ';

            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_add", $arg = ["redi" => 1]); ?>' :
                    '<?php  include "form_add.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            ';
            $contenido .= ($config_destino == "www") ?
                    '<?php  include view("' . $plugin . '", "der_add"); ?>' :
                    '<?php  include "der.php"; ?>';
            $contenido .= '
        
    </div>
</div>

<?php include view("home", "footer"); ?>

';
            break;

        ## delete.php
        case "delete.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq_delete"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?> 
           <?php _t("Delete ' . $plugin . '"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_delete" , $arg = ["redi" => 1] ); ?>' :
                    '<?php include "form_delete.php"; ?>';
            $contenido .= '

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "der_delete"); ?>' :
                    '<?php include "der.php"; ?>';
            $contenido .= '
    </div>
</div>
<?php include view("home", "footer"); ?>
';
            break;

        ## details.php
        case "details.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '<?php  include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php // include view("' . $plugin . '", "izq_details"); ?>' :
                    '       <?php // include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
           <?php _t("' . ucfirst($plugin) . ' details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php include view("' . $plugin . '", "form_details"  , $arg = ["redi" => 1]  ); ?>' :
                    '       <?php include "form_details.php"; ?>';
            $contenido .= '
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php  // include view("' . $plugin . '", "der_details"); ?>' :
                    '       <?php // include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## edit.php
        case "edit.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">      
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php  //include view("' . $plugin . '", "izq_edit"); ?>' :
                    '<?php // include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php _t("Edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_edit"  , $arg = ["redi" => 1] ); ?>' :
                    '<?php include "form_edit.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php //  include view("' . $plugin . '", "der_edit"); ?>' :
                    '<?php // include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## export_json.php
        case "export_json.php":
            $contenido = '<?php
//
header("Content-type: application/json");
echo json_encode($' . $plugin . ');

';
            break;

        ## export_pdf.php
        case "export_pdf.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '<?php
require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("P");
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"' . $plugin . ' !", 1,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(40,10,"Edit file: ' . $plugin . '/views/export_pdf.php !");
$pdf->Output();
';
            break;

        ## form_add.php
        case "form_add.php":
            $contenido = "<?php \n";
            $contenido .= "# MagiaPHP \n";
            $contenido .= "# file date creation: " . date("Y-m-d") . " \n";
            $contenido .= "?>\n";
            $contenido .= '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">
    
';
            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);

                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
                echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;

                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                $valor = ($columna['Default']) ? $columna['Default'] : "";

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];

//                campos_crear_campo($tipo, $nombre, $id, $clase, $marca_agua, $valor, $desactivo)
                //--------------------------------------------------------------
                //--------------------------------------------------------------
                //--------------------------------------------------------------
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '""', false);
                // Campo

                if ($campos_tipo == 'boolean') {
                    $campo = campos_crear_campo('boolean_add', $nombre, $id, 'form-control', $marca_agua, $valor, false);
                } else {
                    $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, false);
                }

                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";

                    // si es diferente a date_registre
                    if ($columna['Field'] != 'date_registre') {

                        $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                        $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                        $contenido .= "\n        </div>	
    </div>" . "\n";

                        $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                        echo "\n\n";
                    }
                }
            }

            ####################################################################
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
';

            break;

        ## form_delete.php
        case "form_delete.php":
            $contenido = '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    ';

            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";

//                $valor = ($columna['Default']) ? $columna['Default'] : "";


                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

//                $valor = '$' . $plugin . '[\'' . $columna['Field'] . '\']';
                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', true);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, true);
                //*************************************************************
                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

';
            break;

        ## form_details.php
        case "form_details.php":
            $contenido = '<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">
    ';

            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            /**
              foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
              // $contenido .= 'echo "<td>$' . $plugin . '[' . $columna['Field'] . ']</td>";' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n";
              $contenido .= '<div class="form-group">
              <label class="control-label col-sm-2" for="contact_id"><?php _t("' . ucfirst($columna['Field']) . '"); ?></label>
              <div class="col-sm-8">
              <input type="' . $columna['Field'] . '" name="' . $columna['Field'] . '" class="form-control"  id="' . $columna['Field'] . '" placeholder="' . $columna['Field'] . '" value="<?php echo "$' . $plugin . '[' . $columna['Field'] . ']"; ?>" disabled="" >
              </div>
              </div>' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n\n";
              }
             * 
             */
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                //$valor = ($columna['Default']) ? $columna['Default'] : "";

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', true);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, true);
                //*************************************************************
                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################



            $contenido .= '
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

';
            break;

        ## form_edit.php
        case "form_edit.php":
            $contenido = '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    ';
            /**
              foreach (bdd_columnas_segun_tabla($plugin) as $columna) {


              if ($columna['Field'] != 'id') {
              // $contenido .= 'echo "<td>$' . $plugin . '[' . $columna['Field'] . ']</td>";' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n";
              $contenido .= '<div class="form-group">
              <label class="control-label col-sm-2" for="' . $columna['Field'] . '"><?php _t("' . ucfirst($columna['Field']) . '"); ?></label>
              <div class="col-sm-8">
              <input type="text" name="' . $columna['Field'] . '" class="form-control"  id="' . $columna['Field'] . '" placeholder="' . $columna['Field'] . '" value="<?php echo "$' . $plugin . '[' . $columna['Field'] . ']"; ?>" >
              </div>
              </div>' . "\n";
              $contenido .= '<?php # /' . $columna['Field'] . ' ?>' . "\n\n";
              }
              }
             * 
             */
            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                $valor = ($columna['Default']) ? $columna['Default'] : "";
                $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', false);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, false);
                //*************************************************************
                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

';
            break;

        ## form_search.php
        case "form_search.php":

            $contenido = '<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">
    
    <div class="form-group">
        <input type="text" name="txt" class="form-control" placeholder="">
    </div>
    
    <button type="submit" class="btn btn-default"><?php echo icon("search");  ?> <?php _t("Save"); ?></button>
    
</form>';

            $contenido .= '';
            break;

        ## modal_index_cols_to_show.php
        case "modal_index_cols_to_show.php":

            $contenido = '<a href="#"
   data-toggle="modal" data-target="#myModal_' . $plugin . '_index_cols_to_show"
   >
       <?php echo icon("wrench"); ?>
</a>

<div class="modal fade" id="myModal_' . $plugin . '_index_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="myModal_' . $plugin . '_index_cols_to_showLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_' . $plugin . '_index_cols_to_showLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_index_cols_to_show.php"; ?>
            </div>
        </div>
    </div>
</div>

';

            $contenido .= '';
            break;

        ## form_index_cols_to_show.php
        case "form_index_cols_to_show.php":

            $contenido = '<form method="post" action="index.php">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $' . $plugin . '_db_col_list_from_table = ' . $plugin . '_db_col_list_from_table($c);

    //Agrego a las columnas las de l directroy
    $array_btn = array(
        "button_details",
        //"button_pay",
        "button_edit",
        "modal_edit",
        "button_delete",
        "modal_delete",
        "button_print",
        "button_save",
    );
    foreach ($array_btn as $key => $button) {
        array_push($' . $plugin . '_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($' . $plugin . '_db_col_list_from_table as $key => $cdbcts) {

        $' . $plugin . '_index_cols_to_show_array = json_decode(_options_option("' . $plugin . '_index_cols_to_show"), true);

        if ($' . $plugin . '_index_cols_to_show_array) {
            $checked = ( in_array($cdbcts, $' . $plugin . '_index_cols_to_show_array) ) ? " checked " : "";
        } else {
            $checked = "";
        }
        echo \'
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="\' . $cdbcts . \'" \' . $checked . \' > \' . _tr(ucfirst($cdbcts)) . \'
                                    </label>
                                  </div>                              
                            </div>
                        </div>
                        
\';
    }
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>';

            $contenido .= '';
            break;

        ## form_search_advanced.php.php
        case "form_search_advanced.php":
            $contenido = '<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    ';

            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                //REFERENCED_TABLE_NAME, 
                //REFERENCED_COLUMN_NAME 
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);

                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
                echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;

                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                $valor = ($columna['Default']) ? $columna['Default'] : "";
                $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//                campos_crear_campo($tipo, $nombre, $id, $clase, $marca_agua, $valor, $desactivo)
                //--------------------------------------------------------------
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', false);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, false, false);

                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    echo "\n\n";
                }
            }

            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
';
            break;

        ## form_pagination_items_limit.php
        case "form_pagination_items_limit.php":
            $contenido = '

<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_push">                                                         
    <input type="hidden" name="option" value="' . $plugin . '_pagination_items_limit">                                                         
    <input type="hidden" name="redi[redi]" value="5">                                                          
    <input type="hidden" name="redi[c]" value="' . $plugin . '">                                                          
    <input type="hidden" name="redi[a]" value="index">                                                          

    <div class="form-group">
        <label class="sr-only" for="data"><?php _t("Data"); ?></label>
        <div class="input-group">                    
            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo user_options("' . $plugin . '_pagination_items_limit", $u_id); ?>"> 

            <div class="input-group-addon"><?php _t("items / page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>
</form>





';

            break;

        ## form_show_col_from_table.php
        case "form_show_col_from_table.php":
            $contenido = '
<form method="post" action="index.php">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_' . $plugin . '_show_col_from_table"), true);
//            foreach (' . $plugin . '_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo \'<tr><td><input \' . $checked . \' type="checkbox" name="\' . $th . \'" id="\' . $th . \'"> \' . $th . \' </td></tr>\';
//            }


        $cols_to_show = array(';
            ####################################################################
            ####################################################################
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $field = $columna['Field'];

                $contenido .= " '$field', \n";

                $i++;
            }
            ####################################################################
            ####################################################################
            $contenido .= '
            "button_details",
            "button_pay",
            "button_edit",
            "modal_edit",
            "button_delete",
            "modal_delete",
//            "button_print",
//            "button_save",
        );
        
        $checked_array = json_decode(_options_option("config_' . $plugin . '_show_col_from_table"), true)[\'cols\'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo \'<tr><td><input \' . $checked . \' type="checkbox" name="cols[\' . $th . \']" id="\' . $th . \'"> \' . _tr(ucfirst(\'Id\')) . \' </td><tr>\';
                    break;
                    
';
            ####################################################################
            ####################################################################
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $field = $columna['Field'];
                if ($field != 'id') {
                    $contenido .= '                 case "' . $field . '": ' . "\n";
                    $contenido .= '                     echo \'<tr><td><input \' . $checked . \' type="checkbox" name="cols[\' . $th . \']" id="\' . $th . \'"> \' . _tr(ucfirst($th)) . \' </td><tr>\'; ' . "\n";
                    $contenido .= '                     break;' . "\n\n";
                }
                $i++;
            }
            ####################################################################
            ####################################################################
            $contenido .= '

                default:
                    echo \'<tr><td><input \' . $checked . \' type="checkbox" name="cols[\' . $th . \']" id="\' . $th . \'"> \' . _tr(ucfirst($th)) . \' </td><tr>\';
                    break;
            }
        }
        
       

            ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk");  ?> <?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>
';

            break;

        ## index.php
        case "index.php":
            $contenido = '<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "nav"); ?>' :
                    '<?php include "nav.php"; ?>';
            $contenido .= '


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("' . $plugin . '", "top"); ?>
';

            $contenido .= ($config_destino == "www") ?
                    '        <?php
        if ($' . $plugin . ') {
            include view("' . $plugin . '", "table_index");
        } else {
            message("info", "No items");
        }
        ?>' :
                    '<?php include "table_index.php"; ?>';

            $contenido .= '
                
    <div class="container-fluid">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php
                $pagination->createHtml();
            ?>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 text-right">
            <?php
            include view($c, "form_pagination_items_limit");
            ?>
        </div>
        </div>
    </div>
</div>

<?php include view("home", "footer"); ?> 
';
            break;

        ## izq.php.php
        case "izq.php":
            $contenido = '
                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

';

            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                //$coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
                $field = $columna['Field'];

                if ($field != 'id') {
                    $contenido .= '<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "' . $plugin . '"); ?>
        <?php echo _t("By ' . $field . '"); ?>
    </a>
    <?php
    foreach (' . $plugin . '_unique_from_col("' . $field . '") as $' . $field . ') {
        if ($' . $field . '[\'' . $field . '\'] != "") {
            echo \'<a href="index.php?c=' . $plugin . '&a=search&w=by_' . $field . '&' . $field . '=\' . $' . $field . '[\'' . $field . '\'] . \'" class="list-group-item">\' . $' . $field . '[\'' . $field . '\'] . \'</a>\';
        }
    }
    ?>
</div>

';
                }

                $i++;
            }
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------



            break;

        ## izq_add.php
        case "izq_add.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_delete.php
        case "izq_delete.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_details.php
        case "izq_details.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_edit.php
        case "izq_edit.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der.php
        case "der.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_add.php
        case "der_add.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_delete.php
        case "der_delete.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_details.php
        case "der_details.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_edit.php
        case "der_edit.php":
            $contenido = '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## MODAL
        case "modal_add.php":
            $contenido = '

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>">
    <?php echo icon("plus"); ?>
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>Label"> <?php _t("Add"); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        $redi = 1;
        include view("' . $plugin . '","form_add"   , $arg = ["redi" => 1]); 
        $redi = "";     
        ?>
      </div>
      

      
    </div>
  </div>
</div>


';
            break;
        ## MODAL
        case "modal_delete.php":
            $contenido = '
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_edit_Label"> <?php _t("Delete"); ?>
        <?php echo $' . $plugin . '_item[\'id\']?>    
        </h4>
      </div>
      
      <div class="modal-body">      
        <p>
            <?php _t("Are you sure you want to delete"); ?>?
        </p>      
      </div>
      
    <div class="modal-footer"> 
    
    
                <?php
                switch ($c) {
                    case "contacts":
                        $url_redi = "index.php?c=contacts&a=' . $plugin . '&id=id=$id";
                        break;

                    case "' . $plugin . '":
                        $url_redi = "index.php?c=' . $plugin . '&a=delete&id=$' . $plugin . '_item[id]&redi[redi]=1&";
                        break;

                    default:
                        $url_redi = "index.php?c=' . $plugin . '&a=delete&id=$' . $plugin . '_item[id]&redi[redi]=1&";
                        break;
                }
                ?>        
                <a class="btn btn-danger" href="<?php echo $url_redi; ?>"><?php echo icon("trash"); ?> <?php echo _t("Delete"); ?></a>


     </div>
      

    </div>
  </div>
</div>';

            break;
        ## MODAL
        case "modal_edit.php":
            $contenido = '
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_edit_">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_edit_" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_edit_Label"> <?php _t("Edit"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("' . $plugin . '","form_edit"   , $arg = ["redi" => 1]); ?>
      </div>
      

    </div>
  </div>
</div>';
            break;

        ## MODAL
        case "modal_search.php":
            $contenido = '
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#' . $plugin . '_search_">
    <?php echo icon("search");  ?>
    <?php _t("Search"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="' . $plugin . '_search_" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_search_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_search_Label"> <?php _t("Add"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("' . $plugin . '","form_search"  , $arg = ["redi" => 1]); ?>
      </div>
           
    </div>
  </div>
</div>';
            break;

        ## nav.php
        case "nav.php":
            $contenido = '
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation ' . $plugin . '</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php?c=' . $plugin . '">
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("' . ucfirst($plugin) . '"); ?>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module("status", "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>
                </li>
            </ul>
            

        
        <?php include view("' . $plugin . '", "form_search"   , $arg = ["redi" => 1]) ?>
            
            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="modal" 
                            data-target="#show_col_from_table_Modal"
                            href="#"                             
                            >
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>

                        <div class="modal fade" id="show_col_from_table_Modal" tabindex="-1" role="dialog" aria-labelledby="show_col_from_table_ModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="' . $plugin . '_addLabel">
                                            <?php _t("Columne to show"); ?>                
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <?php                                       
                                        include view("' . $plugin . '", "form_show_col_from_table");
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>                                       
                <?php } ?>

            </ul>
            
            
            <ul class="nav navbar-nav">
                <li><a href="index.php?c=' . $plugin . '&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
            
                <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=' . $plugin . '&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
                <?php } ?>    

            </ul>
            
            

            
<div class="collapse navbar-collapse" id="' . $plugin . '_add">
    

            <?php
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>

                <?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>     
                    
                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#' . $plugin . 'Modal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New ' . $plugin . '"); ?>
                    </button>

                    <div class="modal fade" id="' . $plugin . 'Modal" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . 'ModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="' . $plugin . '_addLabel">
                                        <?php _t("Add new ' . $plugin . '"); ?>                
                                    </h4>
                                </div>
                                
                                <div class="modal-body">
                                    <?php include view("' . $plugin . '", "form_add"); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>    
            </div>           
    </div>
  </div>
</nav>


';
            break;

        ## search.php
        case "search.php":
            $contenido = '<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-lg-10">
        <h1><?php _t("' . $plugin . '"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("' . $plugin . '","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## search_advanced.php
        case "search_advanced.php":
            $contenido = '
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php _t("Search advanced"); ?>
        </h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_search_advanced"   , $arg = ["redi" => 1]); ?>' :
                    '<?php include "form_search_advanced.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "der"); ?>' :
                    '<?php include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## xxxxxxx.php
        case "xxxxxxxxx.php":
            $contenido = '';
            break;

        ## table_index.php
        case "table_index.php":
            $contenido = '
<?php //Creation date:  ' . date('Y-m-d h:m:s') . ' ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_' . $plugin . '_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_' . $plugin . '_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php ' . $plugin . '_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php ' . $plugin . '_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
';

            $contenido .= '<tbody>
        
            <?php            
            if( ! $' . $plugin . ' ){
                message("info", "No items"); 
            }

            foreach ($' . $plugin . ' as $' . $plugin . '_item) {';

            $contenido .= ' echo \'<tr>\';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                    ';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . ($' . $plugin . '_item[$col]) . \'</td>\';
                        break;' . "\n";
            }

            $contenido .= 'case \'button_details\':
                echo \'<td><a class="btn btn-sm btn-default" href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("eye-open") . \' \' . _tr(\'Details\') . \'</a></td>\';
                break;

            case \'button_pay\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=details_payement&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("shopping-cart") . \' \' . _tr(\'Pay\') . \'</a></td>\';
                break;


            case \'button_edit\':
                echo \'<td><a class="btn btn-sm btn-default" href="index.php?c=' . $plugin . '&a=edit&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                break;
                
            case \'modal_edit\':
//                echo \'<td>\';
//                include view("' . $plugin . '", "modal_edit");
//                echo \'</td>\';
                break;
                
            case \'button_delete\':
                echo \'<td><a class="btn btn-sm btn-default" href="index.php?c=' . $plugin . '&a=delete&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("trash") . \' \' . _tr(\'Delete\') . \'</a></td>\';
                break;
                
            case \'modal_delete\':
                echo \'<td>\';
                include view("' . $plugin . '", "modal_delete");
                echo \'</td>\';
                break;
                                
            case \'button_print\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("print") . \'</a></td>\';
                break;


            case \'button_save\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&way=pdf&&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("floppy-save") . \'</a></td > \';
                break;
    ';

            $contenido .= '
    default:
    echo \'<td>\' . ($' . $plugin . '[$col]) . \'</td>\';
                break;
        }
    }
    
echo \'</tr>\'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("' . $plugin . '", "table_index_form_add"); ?>
    
</table>

';
            break;

        case 'table_index_form_add.php':
            $contenido = '<?php //Creation date:  ' . date('Y-m-d h:m:s') . ' ?>  ';

            $contenido .= '<tr>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_clothes">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="' . $plugin . '">
    <input type="hidden" name="redi[a]" value="details">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">
    




';

            $contenido .= '    <td>
        <div class="form-group">
            <label class="control-label col-sm-3" for=""></label>
            <div class="col-sm-8">    
                <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
            </div>      							
        </div>      							
    </td>
    <td></td>


</form>

<tr>';

            break;

        case 'top.php':
            $contenido = '<?php include "modal_index_cols_to_show.php"; ?>';
            break;

        default:
            $contenido = "";
            break;
    }


    return "$contenido";
}

function contenido_functions($plugin) {
    $contenido = '<?php
// plugin = ' . $plugin . '
// creation date : ' . date("Y-m-d") . '
// 
// 
function ' . $plugin . '_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= ' 
    FROM `' . $plugin . '` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(\':start\', (int) $start, PDO::PARAM_INT);
    $query->bindValue(\':limit\', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function ' . $plugin . '_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= ' 
    FROM `' . $plugin . '` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function ' . $plugin . '_edit(';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
        $i++;
    }


    $contenido .= ') {

    global $db;
    $req = $db->prepare(" UPDATE `' . $plugin . '` SET ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        if ($columna['Field'] != "id") {
//            $contenido .= '."' . $columna['Field'] . '=:' . $columna['Field'] . ' ' . $coma . ' "   ' . "\n";
            $contenido .= '`' . $columna['Field'] . '` =:' . $columna['Field'] . '' . $coma . ' ';
        }

        $i++;
    }
    $contenido .= ' WHERE `id`=:id ");
    $req->execute(array(
';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
        $contenido .= ' "' . $columna['Field'] . '" =>$' . $columna['Field'] . ' ' . $coma . '  ' . "\n";
        $i++;
    }

    $contenido .= '
));
}

function ' . $plugin . '_add(';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        if ($columna['Field'] != "id") {
            $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
            $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
        }
        $i++;
    }


    $contenido .= ') {
    global $db;
    $req = $db->prepare(" INSERT INTO `' . $plugin . '` (';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= ' `' . $columna['Field'] . '` ' . $coma . '  ';

        $i++;
    }


    $contenido .= ')
                                       VALUES  (';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= ':' . $columna['Field'] . ' ' . $coma . '  ';

        $i++;
    }

    $contenido .= ') ");

    $req->execute(array(

';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";

        if ($columna['Field'] == "id") {
            $contenido .= ' "' . $columna['Field'] . '" => null ' . $coma . '  ' . "\n";
        } else {
            $contenido .= ' "' . $columna['Field'] . '" => $' . $columna['Field'] . ' ' . $coma . '  ' . "\n";
        }

        $i++;
    }

    $contenido .= '                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function ' . $plugin . '_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= '  
            FROM `' . $plugin . '` 
            WHERE `id` = :txt ';

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= 'OR `' . $columna['Field'] . '` like :txt' . "\n";
    }
    $contenido .= ' 
    ORDER BY `order_by` , `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(\':txt\', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(\':start\', (int) $start, PDO::PARAM_INT);
    $query->bindValue(\':limit\', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function ' . $plugin . '_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (' . $plugin . '_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";        
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";        
        $val = ""; 
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show] ;  
        }              
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;     
}' . "\n";

    $contenido .= 'function ' . $plugin . '_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `' . $plugin . '` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function ' . $plugin . '_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= '  FROM `' . $plugin . '` 
    WHERE `$field` = \'$txt\' 
    ORDER BY `order_by` , `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(\':field\', "field", PDO::PARAM_STR);
//    $query->bindValue(\':txt\',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(\':start\', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(\':limit\', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function ' . $plugin . '_db_show_col_from_table($c) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM `$c`
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}
//
function ' . $plugin . '_db_col_list_from_table($c){
    $list = array();
    foreach (' . $plugin . '_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value[\'Field\']);   
    }
    return $list;
}
//
//
';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
//        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $contenido .= 'function ' . $plugin . '_update_' . $columna['Field'] . '($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `' . $plugin . '` SET `' . $columna['Field'] . '`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
';
        $i++;
    }

    $contenido .= '
//
function ' . $plugin . '_update_field($id, $field, $new_data) {
    switch ($field) {';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
//        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $contenido .= '
        case "' . $columna['Field'] . '":
            ' . $plugin . '_update_' . $columna['Field'] . '($id, $new_data);
            break;
';
        $i++;
    }
    $contenido .= '

        default:
            break;
    }
}
//
function ' . $plugin . '_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `' . $plugin . '` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/' . $plugin . '/functions.php
// and comment here (this function)
function ' . $plugin . '_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        echo "Field: " . $columna['Field'] . " \n";
        $tipo = campos_tipo($columna['Type']);
        $te = bdd_referencias($plugin, $columna['Field']);
        //echo var_dump($tabla_externa);
        //REFERENCED_TABLE_NAME, 
        //REFERENCED_COLUMN_NAME 
        $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
        $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
        $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
        //
        //if ($bdd_ref_tabla_externa) {
        $contenido .= '        case "' . $columna['Field'] . '":
            //return ' . $bdd_ref_tabla_externa . '_field_id("' . $bdd_col_externa . '", $value);
            return ($filtre) ?? $value;                
            break;' . " \n";
        //} // if ($bdd_ref_tabla_externa) {
    }
    $contenido .= '       

        default:
            return $value;
            break;
    }
}
//
//
//
';
    //$i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= 'function ' . $plugin . '_exists_' . $columna['Field'] . '($' . $columna['Field'] . '){' . "\n";

        $contenido .= '    global $db;
    $data = null;
    $req = $db->prepare("SELECT `' . $columna['Field'] . '` FROM `' . $plugin . '` WHERE   `' . $columna['Field'] . '` = ?");
    $req->execute(array($' . $columna['Field'] . '));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; ';

        $contenido .= '
}' . "\n\n";
    }

    $contenido .= '
//        
//        
//    

';
    //$i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        //$coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= 'function ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . '){' . "\n";

        if ($columna['Field'] == 'id' || $columna['Field'] == 'order_by' || $columna['Field'] == 'status') {
            $contenido .= '     return (is_' . $columna['Field'] . '($' . $columna['Field'] . ') )? true : false ;' . "\n";
        } else {
            $contenido .= '     return true;' . "\n";
        }
        $contenido .= '}' . "\n\n";
    }

    $contenido .= '
//
//
function ' . $plugin . '_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, ' . $plugin . '_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function ' . $plugin . '_is_field($field, $value) {
    $is = false;

    switch ($field) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        $contenido .= '     case "' . $columna['Field'] . '":
            $is = (' . $plugin . '_is_' . $columna['Field'] . '($value)) ? true : false;
            break;' . "\n";
    }
    $contenido .= '
        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function ' . $plugin . '_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case \'id\':
                echo \'<th><a href="index.php?c=' . $plugin . '&a=details&id=\'.$col_to_show.\'">\' . $col_to_show . \'</a></th>\';
                break;

';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        if ($columna['Field'] != 'id') {
            $contenido .= 'case \'' . $columna['Field'] . '\':
                echo \'<th>\' . _tr(ucfirst(\'' . $columna['Field'] . '\')) . \'</th>\';
                break;' . "\n";
        }
    }
    $contenido .= '
            case \'button_details\':
            case \'button_pay\':
            case \'button_edit\':
            case \'modal_edit\':
            case \'button_delete\':
            case \'modal_delete\':
            case \'button_print\':
            case \'button_save\':
                echo \'<th></th>\';
                break;

            default:
                echo \'<th>\' . _tr(ucfirst($col_to_show)) . \'</th>\';
                break;
        }
    }
}

function ' . $plugin . '_index_generate_column_body_td($' . $plugin . ', $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case \'id\':
                echo \'<td><a href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '[$col] . \'">\' . $' . $plugin . '[$col] . \'</a></td>\';
                break;
                


';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        $contenido .= 'case \'' . $columna['Field'] . '\':
                echo \'<td>\' . ($' . $plugin . '[$col]) . \'</td>\';
                break;' . "\n";
    }

    $contenido .= '            case \'button_details\':
                echo \'<td><a class="btn btn-sm btn-primary" href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("eye-open") . \' \' . _tr(\'Details\') . \'</a></td>\';
                break;

            case \'button_pay\':
                echo \'<td><a class = "btn btn-sm btn-primary" href = "index.php?c=' . $plugin . '&a=details_payement&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("shopping-cart") . \' \' . _tr(\'Pay\') . \'</a></td>\';
                break;


            case \'button_edit\':
                echo \'<td><a class="btn btn-sm btn-danger" href="index.php?c=' . $plugin . '&a=edit&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                break;
                

            case \'button_delete\':
                echo \'<td><a class="btn btn-sm btn-danger" href="index.php?c=' . $plugin . '&a=ok_delete&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                break;
                

            case \'button_print\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("print") . \'</a></td>\';
                break;

            case \'button_save\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&way=pdf&&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("floppy-save") . \'</a></td > \';
                break;

    ';

    $contenido .= '
    default:
    echo \'<td>\' . ($' . $plugin . '[$col]) . \'</td>\';
                break;
        }
    }
}




//
//        
';

    $contenido .= '################################################################################' . "\n";
    $contenido .= '################################################################################' . "\n";
    $contenido .= '################################################################################' . "\n";

    return $contenido;
}

function contenido_install($plugin) {

    $contenido = ' 
--
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`) ';

//    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
    //      $contenido .= " `" . $columna['Field'] . "`, ";
    // }

    $contenido .= ' VALUES (' . "\n";

    $contenido .= " (NULL, '" . $plugin . "_index_cols_to_show', NULL, '[ ";

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= ' \"' . $columna['Field'] . '\",';
    }

    $contenido .= " ]', '123456789', '$plugin', '1', '1' ";

    $contenido .= ');
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, \'' . $plugin . '\', NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'robinson coello\', \'robincoello@hotmail.com\', \'https://coello.be\', \'1\', \'1\', \'1\') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'' . $plugin . '\') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, \'root\', \'' . $plugin . '\', \'1111\'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, \'top\', NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'index.php?c=' . $plugin . '\', NULL, \'glyphicon glyphicon-file\', \'1\', \'1\');  
    

        
';

    return $contenido;
}

function contenido_readme($plugin) {
    $contenido = '#' . $plugin . '
## ' . $plugin . ' description
Here you can write a text

## ' . $plugin . ' help
Here you can write a text

## ' . $plugin . ' more info
Here you can write a text

## Data base: ' . $plugin . ' info' . "\n";
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? ", \n" : "\n";

        $contenido .= '' . $columna['Field'] . ' ' . $coma . '  ';

        $i++;
    }


    return $contenido;
}

function crear_carpeta($carpeta) {
    $cmd = "mkdir -p $carpeta";
    shell_exec($cmd);
}

function crear_archivo($archivo, $contenido) {
    $fh = fopen($archivo, 'w') or die("Se produjo un error al crear el archivo");
    fwrite($fh, $contenido) or die("No se pudo escribir en el archivo $archivo \n");
    fclose($fh);
    echo "file ok: '$archivo'  \n";
}

function copiar_archivo($archivo_origen, $archivo_destino = null, $crear = "0", $despues_de = null) {
    $file_array = file($archivo_origen);

    $new_lines = array();

    foreach ($file_array as $line) {
        echo "$line\n";
        array_push($new_lines, $line);

        if (stristr($line, $despues_de)) {
            //echo "*************************************************************\n";
            //echo "Aca copio el nuevo field\n";
            array_push($new_lines, crear_parte_de_formulario($crear));
            //echo "*************************************************************\n";
        }
    }

    // con esto creo el nuevo archivo 
    // paso de array a un string
    crear_archivo($archivo_destino, implode(" ", $new_lines));
}

/**
 * 
 * @param type $documento
 * @param type $inicio
 * @param type $fin
 */
function busca_y_borra_parte_de_documento($documento, $desde, $hasta) {
    $file_array = file($documento);
    $new_lines = array();
    $saltarse = false;
    // asi si no se manda hasta donde borrar, 
    // borra el bloque desde-hasta


    foreach ($file_array as $line) {

        if (stristr($line, $desde)) {
            $saltarse = true;
        }

        if (!$saltarse) {
            array_push($new_lines, $line);
        }
        if (stristr($line, $hasta)) {
            $saltarse = false;
        }
    }
    // con esto creo el nuevo archivo 
    // paso de array a un string
    crear_archivo($documento, implode(" ", $new_lines));
}

function crear_parte_de_formulario($new_field) {
    $data = '
    <?php # ' . $new_field . ' ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contexto"><?php _t("' . $new_field . '"); ?></label>
        <div class="col-sm-8">
            <input type="text"   name="titulo" class="form-control" id="titulo" placeholder="titulo" value="" >
        </div>	
    </div>
    <?php # /' . $new_field . ' ?>
    
';
    return $data;
}

function columna_info($plugin, $columna) {
    $info = array();
    //REFERENCED_TABLE_NAME, 
    //REFERENCED_COLUMN_NAME 
    $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
    $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
    $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
    //
    $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
    $valor = ($columna['Default']) ? $columna['Default'] : "";
    $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';
    $campos_tipo = campos_tipo($columna['Type']);
    $nombre = $columna['Field'];
    $id = $columna['Field'];

    $info = array(
        'bdd_referencias' => $bdd_referencias,
        'bdd_ref_tabla_externa' => $bdd_ref_tabla_externa,
        'bdd_col_externa' => $bdd_col_externa,
        'marca_agua' => $marca_agua,
        'valor' => $valor,
        'campos_tipo' => $campos_tipo,
        'nombre' => $nombre,
        "id" => $id,
    );

    return $info;
}

function crear_plugin($plugin) {
    global $config_destino;

    crear_carpeta("../$config_destino/$plugin");
    crear_carpeta("../$config_destino/$plugin/controllers");
    crear_carpeta("../$config_destino/$plugin/models");
    crear_carpeta("../$config_destino/$plugin/views");
    crear_carpeta("../$config_destino/$plugin/views/js");

    if ($config_destino == "www") {
        crear_archivo("../$config_destino/$plugin/functions.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_update.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_select.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_delete.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_insert.php", contenido_functions($plugin));
        crear_archivo("../$config_destino/$plugin/views/js/order_by.js", "// js order file create by magia_php");
    } else {
        crear_archivo("../$config_destino/$plugin/functions.php", "<?php");
    }

    crear_archivo("../$config_destino/$plugin/install.sql", contenido_install($plugin));

    crear_archivo("../$config_destino/$plugin/readme.md", contenido_readme($plugin));
////////////////////////////////////////////////////////////////////////////////
    // Creamos la classe     
    $archivo_clase = ucfirst($plugin) . '.php';
    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", contenido_clase($plugin));
////////////////////////////////////////////////////////////////////////////////


    $archivos = array(
        "add.php",
        "delete.php",
        "details.php",
        "edit.php",
        "export_json.php",
        "export_pdf.php",
        "index.php",
        "ok_add.php",
        "ok_delete.php",
        "ok_edit.php",
        "ok_index_cols_to_show.php",
        "ok_show_col_from_table.php",
        "search.php",
        "search_advanced.php",
    );

    $contenido = "<?php";

    foreach ($archivos as $archivo) {
        crear_archivo("../$config_destino/$plugin/controllers/$archivo", contenido_controllers($plugin, $archivo));
    }


    $archivos = array(
        "add.php",
        "delete.php",
        "details.php",
        "edit.php",
        "export_json.php",
        "export_pdf.php",
        "form_add.php",
        "form_edit.php",
        "form_details.php",
        "form_delete.php",
        "form_search.php",
        "modal_index_cols_to_show.php",
        "form_search_advanced.php",
        "form_pagination_items_limit.php",
        "form_show_col_from_table.php",
        "form_index_cols_to_show.php",
        "index.php",
        "izq.php",
        "izq_add.php",
        "izq_details.php",
        "izq_delete.php",
        "izq_edit.php",
        "der.php",
        "der_add.php",
        "der_details.php",
        "der_edit.php",
        "der_delete.php",
        "modal_add.php",
        "modal_edit.php",
        "modal_delete.php",
        "modal_search.php",
        "modal_index_cols_to_show.php",
        "nav.php",
        "search.php",
        "search_advanced.php",
        "table_index.php",
        "top.php",
        "table_index_form_add.php"
    );

    //echo "## VIEWS -- \n "; 

    foreach ($archivos as $archivo) {
        crear_archivo("../$config_destino/$plugin/views/$archivo", contenido_views($plugin, $archivo));
    }
}

//
function crear_clase($plugin, $preview = false) {
    global $config_destino;

    if ($preview) {
        print contenido_clase($plugin);
    } else {

        crear_carpeta("../$config_destino/$plugin");
        crear_carpeta("../$config_destino/$plugin/models");

        $class_file_name = ucfirst($plugin) . ".php";

        crear_archivo("../$config_destino/$plugin/models/$class_file_name", contenido_clase($plugin));
    }
}

function crear_mvc_esqueleto($plugin) {
    global $config_destino;
    crear_carpeta("../$config_destino/$plugin");
    crear_carpeta("../$config_destino/$plugin/controllers");
    crear_carpeta("../$config_destino/$plugin/models");
    crear_carpeta("../$config_destino/$plugin/views");
    if ($config_destino == "www") {
        crear_archivo("../$config_destino/$plugin/functions.php", contenido_functions($plugin));
    } else {
        crear_archivo("../$config_destino/$plugin/functions.php", "<?php ");
    }
    crear_archivo("../$config_destino/$plugin/readme.md", bdd_total_columnas_segun_tabla($plugin));

    ////////////////////////////////////////////////////////////////////////////////
    // Creamos la classe     
    $archivo_clase = ucfirst($plugin) . '.php';
//    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", contenido_clase($plugin));
    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", "<?php ");
////////////////////////////////////////////////////////////////////////////////
}

function magia_registrar_en_tabla($plugin) {
    global $config_db;

    foreach (bdd_columnas_segun_tabla($plugin) as $campo) {
        echo "Field: " . $campo['Field'] . " \n";

        $tipo = campos_tipo($campo['Type']);

        $te = bdd_referencias($plugin, $campo['Field']);
        //echo var_dump($tabla_externa);
        $tabla_externa = (isset($te['REFERENCED_TABLE_NAME'])) ? $te['REFERENCED_TABLE_NAME'] : false;
        $columna_externa = (isset($te['REFERENCED_COLUMN_NAME'])) ? $te['REFERENCED_COLUMN_NAME'] : false;

        echo ($tabla_externa) ? "La tabla externa es: $tabla_externa \n" : "No \n";
        echo ($columna_externa) ? "la columlna externa es: $columna_externa \n" : "No \n";

        foreach (array("ver", "crear", "editar", "borrar") as $crud) {
            bdd_add_en_magia($config_db, $plugin, $campo['Field'], $crud, $campo['Field'], $tipo, $tabla_externa, $columna_externa, "form-control", $campo['Field'], $campo['Field'], $campo['Field'], "valor");
        }
        //echo " \n";

        $tabla_externa = null;
        $columna_externa = null;
    }
}

function magia_analiza_tabla($plugin) {

    echo "COLS:\n";

    $i = 1;
    foreach (bdd_columnas_segun_tabla($plugin) as $col) {
        echo $i++ . ') ' . $col['Field'] . " \n";
        $tipo = campos_tipo($col['Type']);
        $te = bdd_referencias($plugin, $col['Field']);
        $tabla_externa = (isset($te['REFERENCED_TABLE_NAME'])) ? $te['REFERENCED_TABLE_NAME'] : false;
        $columna_externa = (isset($te['REFERENCED_COLUMN_NAME'])) ? $te['REFERENCED_COLUMN_NAME'] : false;
        echo ($tabla_externa) ? "La tabla externa es: $tabla_externa \n" : "";
        echo ($columna_externa) ? "la columna externa es: $columna_externa \n" : "";
        echo $tipo . "\n";
        echo " \n";
    }
}
