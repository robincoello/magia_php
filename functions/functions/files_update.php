<?php

class updateImage {

    //private $_exts = array("image/jpg", "image/jpeg", "image/png", "image/gif"); // Tipos de archivos soportados
    private $_extentions = array("text/x.gcode", "application/json", "text/plain", "application/zip"); // Tipos de archivos soportados
    private $_width = 9999999999; // Ancho máximo por defecto
    private $_height = 9999999999; // Alto máximo por defecto
    private $_maxSize = 1; // Peso máximo. MAX_FILE_SIZE sobrescribe este valor
    //  private $_name = "File-"; // Nombre por defecto 
    private $_dest = "www/gallery/img/scan/";
    private $_img;
    private $_ext;
    private $_r = "";
    private $_file_extention = "";
    private $_name = "";
    private $_formatedName = "";
    private $_type = "";
    private $_tmp_name = "";
    private $_size = "";
    private $_errors = array();

    # Métodos mágicos #

    public function __set($var, $value) {
        $this->$var = $value;
    }

    public function __get($var) {
        return $this->$var;
    }

    public function __construct($img) {
        $this->_name = $img['name'];
        $this->_type = $img['type'];
        $this->_tmp_name = $img['tmp_name'];
        $this->_size = $img['size'];
        $this->_errors = $img['error']; // si ya viene con error;
    }

    public function send($newName) {


        if ($this->checkFileType()) {
            array_push($this->_errors, "File extension not accepted");
        }

        if ($this->_size > $this->_maxSize) {
            array_push($this->_errors, "Size file is too big");
        }

        if (!$this->changeName($newName)) {
            array_push($this->_errors, "no se pudo cambiar el nombre");
        }

        if ($this->_dest != "" and !is_dir($this->_dest)) {
            mkdir($this->_dest, 0775);
        }

        // si no hay erroes mando 
        if ($this->_errors == "") {

            $origen = $this->_tmp_name;

            $destino = $this->_dest . $this->_formatedName;

            move_uploaded_file($origen, $destino);
        }

        return $this->_errors;
    }

    public function changeName($newName) {
        // si no hay nuevo nombre
        if ($newName) {
            return false;
        }

        switch ($this->_type) {
            case "text/x.gcode":
                $this->_formatedName = $newName . ".gcode";
                return true;
                break;
            case "application/json":
                $this->_formatedName = $newName . ".json";
                return true;
                break;
            case "text/plain":
                $this->_formatedName = $newName . ".txt";
                return true;
                break;
            case "application/zip":
                $this->_formatedName = $newName . ".zip";
                return true;
                break;
            default :
                return false;
                break;
        }
    }

    public function checkFileType() {
        // Verifica que la extensión sea permitida, según el arreglo $_extentions
        return (in_array(strtolower($this->_type), $this->_extentions)) ? true : false;
    }

    public function get_Error() {
        return $this->_errors;
    }

    public function get_ExtentionAceptedOnly() {
        return $this->_ext;
    }

    public function get_exts() {
        return $this->_exts;
    }

    /**
     * Return the path where the file will be stocked
     * @return type
     */
    public function get_dest() {
        return $this->_dest;
    }
}
