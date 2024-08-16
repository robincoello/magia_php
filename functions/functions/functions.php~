<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */
/* * *
 * Para mostrar el contenido de algo de una forma mas clara
 */
function vardump($value) {

    ini_set("highlight.keyword", "#a50000;  font-weight: bolder");
    ini_set("highlight.string", "#5825b6; font-weight: lighter; ");

    ob_start();
    highlight_string("<?php\n" . var_export($value, true) . "?>");
    $highlighted_output = ob_get_clean();

    $highlighted_output = str_replace(["&lt;?php", "?&gt;"], '', $highlighted_output);

    //echo "<pre>";
    echo $highlighted_output;
    //echo "</pre>";
    //die();
}

/**
 * Genera un conjunto de caracteres validos para una clave
 * @return type
 */
function passwordRandom() {
    // pongo en 4 partes 
//    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890&@#(!)*';
//    $pass = array(); //remember to declare $pass as an array
//    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//    for ($i = 0; $i < 15; $i++) {
//        $n = rand(0, $alphaLength);
//        $pass[] = $alphabet[$n];
//    }
    $min = 'abcdefghijklmnopqrstuvwxyz';
    $may = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
//    $esp = '*@#()!';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($min) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $min[$n]);
    }
    $alphaLength = strlen($may) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $may[$n]);
    }
    $alphaLength = strlen($num) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $num[$n]);
    }
//    $alphaLength = strlen($esp) - 1; //put the length -1 in cache
//    for ($i = 0; $i < 3; $i++) {
//        $n = rand(0, $alphaLength);
//        array_push($pass, $esp[$n]);
//    }

    return (implode($pass)); //turn the array into a string
}

function passwordIsGood($password) {

    $error = array();
    if (strlen($password) <= '8') {
        array_push($error, 'The password must have more than 8 characters');
    }

    if (!preg_match("#[0-9]+#", $password)) {
        array_push($error, "The key must have a number");
    }

    if (!preg_match("#[A-Z]+#", $password)) {
        array_push($error, "The password must have a capital letter");
    }

    if (!preg_match("#[a-z]+#", $password)) {
        array_push($error, "The password must have a lowercase letter");
    }

    return $error;
}

/**
 * Calcula la edad pasandole una fecha
 * @param type $fechanacimiento Fecha en formato (aaaa-mm-dd) 
 * @return type 42
 */
function calculaedad($fechanacimiento) {
    if (!$fechanacimiento) {
        return false;
    }

    list($ano, $mes, $dia) = explode("-", $fechanacimiento);
    $ano_diferencia = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}

/**
 * Mustra el logo
 * @global type $config_company_logo
 */
function logo($w = null, $h = null, $class = null) {
    global $config_company_logo;

//    if (isset($config_company_logo) && file_exists(PATH_GALLERY . "$config_company_logo")) {
//        if ($w) {
//            echo '<img src="' . PATH_GALLERY . $config_company_logo . '" alt="" width="' . $w . '" class="' . $class . '"/>';
//        } else {
//            echo '<img src="' . PATH_GALLERY . $config_company_logo . '" alt="" class="' . $class . '"/>';
//        }
//    } else {
//        echo '<img src="www/gallery/img/logos/factux.jpg" alt="" width=150/>';
//    }

    if (file_exists(logo_img())) {
        if ($w) {
            echo '<img src="' . logo_img() . '" alt="" width="' . $w . '" class="' . $class . '" >';
        } else {
            echo '<img src="' . logo_img() . '" alt="" width="" class="' . $class . '" >';
        }
    } else {
        echo '<img src="www/gallery/img/logos/factux.jpg" alt="" width=150/>';
    }
}

function logo_img() {
    // Factux logo por defecto 
    $logo_factux = "www/gallery/img/logos/factux.jpg";

    // mi logo 
    $my_logo = PATH_GALLERY_IMG_SUBDOMAIN . _options_option('config_company_logo');

    // verificacion 
    if (file_exists($my_logo)) {
        $logo = $my_logo;
    } else {
        $logo = $logo_factux;
    }

//    $logo = PATH_GALLERY . "$config_company_logo";
//
//    if (file_exists($logo) == 2) {
//        return $logo;
//    } else {
//        return $logo_factux;
//    }
    return $logo;
}

/**
 * Verifica si la valor de $u_id es diferente de null, 
 * en ese caso esta logueado
 * @global type $u_id
 * @return type
 */
function is_logued() {
    global $u_id;
    return ($u_id) ? true : false;
}

function logout() {
    session_destroy();
}

/**
 * Verifica si un rol tiene acceso 
 * @param type $u_rol
 * @return type
 */
function has_access($u_rol = false) {
    return ($u_rol == "admin") ? true : false;
}

/**
 * Verifica si es Admin
 * @param type $u_rol
 * @return type
 */
function is_admin($u_rol = false) {
    return ($u_rol == "admin") ? true : false;
}

function day_add($d = false) {
    for ($i = 1; $i < 32; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function month_add($m = false) {
    for ($i = 1; $i < 13; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function year_add($y = false) {
    for ($i = 1900; $i < 2019; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function is_only_letters($value) {
    $res = true;
    //compruebo que los caracteres sean los permitidos
    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($i = 0; $i < strlen($value); $i++) {
        if (strpos($allowed, substr($value, $i, 1)) === false) {
            return false;
        }
    }
    return $res;
}

function is_only_letters_numbers($value) {
    $res = true;
    //compruebo que los caracteres sean los permitidos
    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";
    for ($i = 0; $i < strlen($value); $i++) {
        if (strpos($allowed, substr($value, $i, 1)) === false) {
            return false;
        }
    }
    return $res;
}

function is_good_tva($tva) {
    $res = true;
    //compruebo que los caracteres sean los permitidos
    $allowed = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for ($i = 0; $i < strlen($tva); $i++) {
        if (strpos($allowed, substr($tva, $i, 1)) === false) {
            return false;
        }
    }
    return $res;
}

/**
 * Regresa el numero de tva de letras y numeros en mayuscula
 * 
 * @param type $tva
 * @return type
 */
function tva_formated($tva) {
    if ($tva === null) {
        return false;
    } else {
        // lo paso a mayuscula
        $tva = strtoupper($tva);
        $new_tva = "";
        $allowed = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $j = 0;
        $i = 0;
        // solo copio letras y numeros 
        // el resto de caracteres no copio
        while ($i < strlen($tva)) {
            if (in_array($tva[$i], $allowed)) {
                $new_tva[$j] = $tva[$i];
                $j++;
            }
            $i++;
        }
        return ($new_tva);
    }
}

//htmlentities

function clean($value) {

    if (
            is_null($value) ||
            is_array($value) ||
            $value == '' ||
            $value == "null"
    ) {
        return $value;
    } else {
        // delete all html tags

        $value = trim($value); //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne  
        $value = strip_tags($value);  // strip_tags — Supprime les balises HTML et PHP d'une chaîne    
        $value = htmlspecialchars($value); // htmlspecialchars — Convertit les caractères spéciaux en entités HTML   

        return $value;
    }
}

function is_name($name) {
    $name = clean($name);
    return (is_only_letters($name) && strlen($name) > 3) ? TRUE : FALSE;
}

function is_lastname($lastname) {
    $lastname = clean($lastname);
    return (is_only_letters($lastname) && strlen($lastname) > 3) ? TRUE : FALSE;
}

function is_address($address) {
    $address = clean($address);
    return (is_only_letters_numbers($address) && strlen($address) > 3) ? TRUE : FALSE;
}

function is_postalcode($postcode) {
    $postcode = clean($postcode);
    return (is_only_letters_numbers($postcode) ) ? TRUE : FALSE;
}

function is_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL) ) ? TRUE : FALSE;
}

function is_login($login) {


    if ($login == '' || $login == null || $login == ' ') {
        return false;
    }


    $login = clean($login);

    // largo x carateres
    // letras, numeros, '-', '_'
    $res = true;

    //compruebo que los caracteres sean los permitidos
    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_@.";
    for ($i = 0; $i <= strlen($login) - 1; $i++) {
        if (!empty($login)) {
            if (strpos($allowed, substr($login, $i, 1)) === false) {
                //echo $login . " no es válido<br>";
                return false;
            }
        }
    }

    $res = (strlen($login) > 3) ? true : false;

    return $res;
}

/**
 * 
 * @param type $password
 * @return boolean
 */
function is_password($password) {

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        return false;
    }

    return true;
}

function is_good_password($password) {
    return 0;
}

function is_id($id) {
    return ( is_numeric($id) && $id > 0 ) ? true : false;
}

function is_date($date) {

    if ($date == '' || $date == false || $date == null) {
        return false;
    }

    $tempDate = explode('-', $date);
    // mm dd yy 
    return checkdate((int) $tempDate[1], (int) $tempDate[2], (int) $tempDate[0]);
}

function is_price($price) {
    return ( is_numeric($price) && $price >= 0 ) ? true : false;
}

function is_quantity($quantity) {
    return ( is_numeric($quantity) && $quantity >= 0 ) ? true : false;
}

function is_description($description) {
    return 1;
}

function is_code($code) {
    return 1;
}

//
function is_order_by($order_by) {
    return ( is_numeric($order_by) && $order_by > 0 ) ? true : false;
}

//
function is_status($status) {
//    return ( is_numeric($status) && ($status == 0 || $status == 1) ) ? true : false;
    return ( is_numeric($status) ) ? true : false;
}

////////////////////////////////////////////////////////////////////////////////
function format_id($id) {
    if (!$id) {
        return false;
    }

    $id = intval($id);
    return $id;
}

function after($x, $inthat) {
    if (!is_bool(strpos($inthat, $x)))
        return substr($inthat, strpos($inthat, $x) + strlen($x));
}

;

function after_last($x, $inthat) {
    if (!is_bool(strrevpos($inthat, $x)))
        return substr($inthat, strrevpos($inthat, $x) + strlen($x));
}

;

function before($x, $inthat) {
    return substr($inthat, 0, strpos($inthat, $x));
}

;

function before_last($x, $inthat) {
    return substr($inthat, 0, strrevpos($inthat, $x));
}

;

function between($x, $that, $inthat) {
    return before($that, after($x, $inthat));
}

;

function between_last($x, $that, $inthat) {
    return after_last($x, before_last($that, $inthat));
}

;

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle) {
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos === false)
        return false;
    else
        return strlen($instr) - $rev_pos - strlen($needle);
}

function moneda_value($val = 0.00): float {
    $val = (float) $val;

    if ($val == null || $val == '') {
        $val = (float) 0;
    }

    return round($val, 2);
}

/**
 * Solo se usa para mostrar no para hacer calculos 
 * 
 * @global type $config_empresa_moneda_simbolo
 * @param type $cantidad
 * @return type
 */
function moneda($cantidad = "0.00") {
    global $config_empresa_moneda_simbolo;

    $cantidad = (float) $cantidad;

    if ($cantidad == null || $cantidad == '') {
        $cantidad = (float) 0;
    }

    $c = round($cantidad, 2); // echo round(1.95583, 2);  // 1.96

    return number_format($c, 2, ".", " ");
}

function monedaf($cantidad) {
    global $config_empresa_moneda_simbolo;

    $cantidad = (float) $cantidad;

    if ($cantidad == null || $cantidad == '') {
        $cantidad = 0;
    }

    if ($cantidad < 0) {
        //  return "<span style=\"color:red;\">" . moneda($cantidad) . " EUR</span>" ;
        return moneda($cantidad) . " $config_empresa_moneda_simbolo";
    } else {
        return moneda($cantidad) . " $config_empresa_moneda_simbolo";
    }
}

function pagination($url, $totalItems, $itemsByPage, $page = null, $view = 'pagination') {

    if ($itemsByPage == 0) {
        $itemsByPage = 50;
    }

    $totalPages = ceil($totalItems / $itemsByPage);
    $lastPage = $totalPages;
    $actualPage = (isset($page)) ? $page : 1;
    include view("home", $view);
}

function reglaDeTres($x, $y) {
    // x    = 100%
    // y    = ?

    return ($x * 100) / $y;
}

function get_user_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    } return $ip;
}

function get_user_ip6() {
    return false;
}

function get_user_browser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    return array(
        'userAgent' => $u_agent,
        'name' => $bname,
        'version' => $version,
        'platform' => $platform,
        'pattern' => $pattern
    );
}

function farra_progreso($actual, $total_pasos) {
    echo '<div class="progress">
            <div class="progress-bar"
                 role="progressbar" aria-valuenow="33"
                 aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: ' . (100 / $total_pasos) * $actual . '%;">
                <span class="sr-only">2</span>
            </div>
        </div>';
}

/**
 * 
 * @param type $que
 * @param type $donde
 * @return boolean
 */
function write_in_file($que, $donde) {

    if (!$donde) {
        return false;
    }

    $myfile = fopen($donde, 'a') or die("Unable to open file! $donde");
    $txt = "$que";
    fwrite($myfile, $txt . PHP_EOL);

    //$txt = "Jane Doe\n";    
    //fwrite($myfile, $txt);

    fclose($myfile);
}

//function icon($icon) {
//
//    switch ($icon) {
//        case 'new-window':
//            $i = 'glyphicon glyphicon-new-window';
//            break;
//
//        default:
//            break;
//    }
//
//    echo '<span class="' . $i . '"></span>';
//}
