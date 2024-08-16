<?php

//function bdd_tipo_campo($Type) {    
function campos_tipo($SQL_Type) {
    /**
     * array(12) {
      ["Field"]=>
      string(6) "status"
      [0]=>
      string(6) "status"
      ["Type"]=>
      string(6) "int(1)"
      [1]=>
      string(6) "int(1)"
      ["Null"]=>
      string(2) "NO"
      [2]=>
      string(2) "NO"
      ["Key"]=>
      string(0) ""
      [3]=>
      string(0) ""
      ["Default"]=>
      string(1) "1"
      [4]=>
      string(1) "1"
      ["Extra"]=>
      string(0) ""
      [5]=>
      string(0) ""
      }
     * 
     * ALTER TABLE `test` ADD `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `description`; 
     * 
     */
    //echo "La function: " . __FUNCTION__ . "() regresa como tipo:  $SQL_Type " . "  \n";

    $t = false;

    if (strpos($SQL_Type, "int(1)") !== false) {
        $t = "boolean";
    }
    if (strpos($SQL_Type, "int(11)") !== false) {
        $t = "int";
    }
    if (strpos($SQL_Type, "varchar(") !== false) {
        $t = "text";
    }
    if (strpos($SQL_Type, "text") !== false) {
        $t = "textarea";
    }
    if (strpos($SQL_Type, "date") !== false) {
        $t = "date";
    }
    if (strpos($SQL_Type, "timestamp") !== false) {
        $t = "timestamp";
    }
    if (strpos($SQL_Type, "decimal(") !== false) {
        $t = "number";
    }
    //echo "entonces es un: $t  \n";
    return $t;
}

function campos_crear_campo($tipo, $nombre, $id, $clase = "form-control", $marca_agua = false, $valor = false, $desactivo = false) {
    global $plugin;
    $tabla_externa = '';
    $columna_externa = '';

    $te = bdd_referencias($plugin, $nombre);

    if ($te) {
        $tabla_externa = ( $te['REFERENCED_TABLE_NAME']) ? $te['REFERENCED_TABLE_NAME'] : "";
        $columna_externa = ( $te['REFERENCED_COLUMN_NAME']) ? $te['REFERENCED_COLUMN_NAME'] : "";
    }

    $disabled = ($desactivo) ? ' disabled="" ' : '';

    switch ($tipo) {
        case 'textarea':
            $campo = '<textarea name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" placeholder="' . $marca_agua . ' - textarea" ' . $disabled . '>' . $valor . '</textarea>';

            $campo .= "    <script>
        ClassicEditor
                .create(document.querySelector('#' . $id . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>";

            break;

        case 'select':

            if ($nombre == 'contact_id') {
                $campo = '<select name="' . $nombre . '" class="' . $clase . ' selectpicker" id="' . $id . '" data-live-search="true" ' . $disabled . '>
                <?php ' . $tabla_externa . '_select("' . $columna_externa . '", array("name", "lastname"), ' . $valor . ' , array()); ?>                        
                </select>';
            } else {
                $campo = '<select name="' . $nombre . '" class="' . $clase . ' selectpicker" id="' . $id . '" data-live-search="true" ' . $disabled . '>
                <?php ' . $tabla_externa . '_select("' . $columna_externa . '", array("' . $columna_externa . '"), ' . $valor . ' , array()); ?>                        
                </select>';
            }





            break;

        case 'boolean':
            $selected_1 = "";
            $selected_0 = "";

            if ($valor !== false) {
                $selected_1 = '<?php echo ($' . $plugin . '->get' . ucfirst($nombre) . '() == 1 )? " selected " : "" ;  ?>';
                $selected_0 = '<?php echo ($' . $plugin . '->get' . ucfirst($nombre) . '() == 0 )? " selected " : "" ;  ?>';
            }

            $campo = '<select name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" ' . $disabled . '>                
                <option value="1" ' . $selected_1 . ' ><?php echo _t("Actived"); ?></option>
                <option value="0" ' . $selected_0 . ' ><?php echo _t("Blocked"); ?></option>
                </select>';
            break;

        // solo para los add
        case 'boolean_add':

            $campo = '<select name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" ' . $disabled . '>                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>';
            break;

        case 'int':
        case 'number':
            $campo = '<input type="number" step="any" name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" placeholder="' . $marca_agua . '" value="' . $valor . '" ' . $disabled . '>';
            break;

        case 'date':
        case 'timestamp':
            $campo = '<input type="date" name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" placeholder="' . $marca_agua . '" value="' . $valor . '" ' . $disabled . '>';
            break;

        default:
            $campo = '<input type="text" name="' . $nombre . '" class="' . $clase . '" id="' . $id . '" placeholder="' . $marca_agua . '" value="' . $valor . '" ' . $disabled . '>';
            break;
    }

    return $campo;
}
