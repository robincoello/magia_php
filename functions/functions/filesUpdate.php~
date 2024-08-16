<?php

class fileUpdate {

    private $_ext_acepted = array(
        "text/x.gcode",
        ".stl",
        "model/stl",
        "model/x.stl-ascii",
        "model/x.stl-binary",
        "application/stl",
        "application/x.stl-ascii",
        "application/x.stl-binary",
        "application/stl-geometry",
        //  "application/json", 
        "text/plain",
        //  "application/zip",
        "application/octet-stream",
        "application/netfabb",
    );
    // https://en.wikipedia.org/wiki/Media_type
    // https://en.wikipedia.org/wiki/STL_(file_format)
    // MIME Type: application/octet-stream;
    // https://stackoverflow.com/questions/13355742/upload-form-only-works-in-firefox-when-uploading-ascii-stl-3d-files
    //  <form action="upload_file.php" method="post" enctype="multipart/form-data" encoding="multipart/form-data" >



    private $_max_size = 99999991; // Peso máximo. MAX_FILE_SIZE sobrescribe este valor  
    private $_path = "www/gallery/img/scan/";
    private $_formatedName = "FILE.lat";
    //
    private $_name;
    private $_type;
    private $_tmp_name;
    private $_errors = array();
    private $_size;

    public function __set($var, $value) {
        $this->$var = $value;
    }

    public function set_ext_acepted($value) {
        array_push($this->_ext_acepted, $value);
    }

    public function __get($var) {
        return $this->$var;
    }

    public function __construct($file) {

        if (($file) && $file != '') {

            $this->_name = ($file['name']);
            $this->_type = ($file['type']);
            $this->_tmp_name = ($file['tmp_name']);
            $this->_size = ($file['size']);

            if ($file['error'] != 0) {
                array_push($this->_errors, $file['error']);
            }
        }
    }

    public function sendFile($newName) {

        if (!$this->checkFileType()) {
            array_push($this->_errors, "File extension not accepted");
            array_push($this->_errors, "File extension: $this->_type");
        }

        if (!$this->checkFileSize()) {
            array_push($this->_errors, "Size file is too big");
        }

        if (!$this->changeName($newName)) {
            array_push($this->_errors, "Could not change name");
            // array_push($this->_errors ,   "new name:  $newName"); 
        }

        if (!$this->checkPath()) {
            mkdir($this->_path, 0775);
        }

        // si no hay erroes mando 
        if (empty($this->_errors)) {

            if (!$this->movefile()) {
                array_push($this->_errors, "Could not send file");
            }
        }

        return $this->_errors;
    }

    public function movefile() {
        $origen = $this->_tmp_name;
        $destino = $this->_path . $this->_formatedName;

        if (move_uploaded_file($origen, $destino)) {
            return true;
        }

        return false;
    }

    public function changeName($newName) {
        // si no hay nuevo nombre
        if (!$newName) {
            return false;
        }

        switch ($this->_type) {

            case "application/octet-stream":
            //    case ".stl":
            case"model/stl":
            case"model/x.stl-ascii":
            case"model/x.stl-binary":
            case"application/stl":
            case"application/x.stl-ascii":
            case"application/x.stl-binary":
            case"application/stl-geometry":


                $this->_formatedName = strtoupper($newName . ".stl");
                return true;
                break;
            case "text/x.gcode":
                $this->_formatedName = strtoupper($newName . ".gcode");
                return true;
                break;
            case "application/json":
                $this->_formatedName = strtoupper($newName . ".json");
                return true;
                break;
            case "text/plain":
                $this->_formatedName = strtoupper($newName . ".txt");
                return true;
                break;
            case "application/zip":
                $this->_formatedName = strtoupper($newName . ".zip");
                return true;
                break;
            default :
                return false;
                break;
        }
    }

    public function checkFileType() {
        // Verifica que la extensión sea permitida, según el arreglo $_extentions
        return (in_array(strtolower($this->_type), $this->_ext_acepted)) ? true : false;
    }

    // verifica que el peso del fichero 
    public function checkFileSize() {
        return ($this->_size <= $this->_max_size) ? true : false;
    }

    public function checkPath() {

        if ($this->_path == '') {
            $this->_errors = "Empty path";
            return false;
        }

        if (!is_dir($this->_path)) {
            $this->_errors = "it s not a directory";
            return false;
        }
        return true;
    }

    public function checkDownloadCorrectly() {
        return ( file_exists($this->_path . $this->_formatedName) ) ? true : false;
    }

    public function checkDigitControl($fileName) {
        // separamos por partes: 
        // id de la order
        // side
        // fecha (14 digitos despues del SIDE        
        // el ultimo antes del guion es el digito de control         
        // gion
        // Uniqueid()
        // punto
        // extencion 
        // Debo saber el valor del side
        // contar cuentos digitos hay antes del guion
        // el ultimo es el digito de control s
        // largo antes del guion
        $l = strpos($fileName, "L");
        $r = strpos($fileName, "R");
        $s = strpos($fileName, "S");

        $digitcontrol = $fileName[strpos($fileName, "-") - 1];

        return $digitcontrol;
    }

    public function get_Error() {
        return $this->_errors;
    }

    public function get_ExtentionAceptedOnly() {
        return $this->_ext_acepted;
    }

    public function get_path() {
        return $this->_path;
    }

    public function get_formatedName() {
        return $this->_formatedName;
    }

    public function get_max_size() {
        return $this->_max_size;
    }
}
