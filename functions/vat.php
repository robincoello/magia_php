<?php

class Vat {

    //put your code here
    // var
    public $_vat = null;

    // set

    function __construct($vat_number) {
        $this->_vat = $vat_number;
    }

    // get
    function getVat() {
        return $this->_vat;
    }

    //
    function vat_formated($country) {
        // pone todo en mayusculas 
        // quita los espacio inicio y fin 
        // solo letras y numeros 
        // no lineas, no puntos
    }

    function vat_is_correct_format($country) {
        //
        return (check_format($this->_vat, $this->vat_format_by_country($country))) ? true : false;
    }

    // Formato que deb tener un tva segun el country
    private function vat_format_by_country($country) {
        // en este $country el formato es el siquietne 
        // BE:  
        // 
        $format = null;

        switch ($country) {
            case 'BE': // Belgica tiene 2 letras al inicio seguido de x numeros
                $format = "[A-Z]*2 [09]*10";
                break;

            default:
                break;
        }
        return $format;
    }
}

function vat_check_format($country_code, $tva) {
    if ($country_code == "BE") {
        // debe empezar por BE
        // seguido de 10 numeros
    }

    return true;
}
