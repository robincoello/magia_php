<?php

// read the blog 
// Blog
// https://blog.factuz.com/index.php?c=public_html&a=details&id=15
define("API_URL", "");
// c = api & a = invoices & api_key = demo & function = list
// c = api & a = invoices & function = details & id = 10
// 
$function = (isset($_GET["function"])) ? clean($_GET["function"]) : null;
// api_ke que se le da al usuario
//
$api_key = (isset($_GET["api_key"])) ? clean($_GET["api_key"]) : null;
// para registrar los errores
//
$error = array();
//
##########################################################################
# MANDATORY
# Aca se controlla las variables obligatorias son enviadas
if ($api_key == "" || $api_key == null || $api_key == false) {
    array_push($error, "api_key is manatory");
}
//
###########################################################################
# FORMAT
# Aca controlamos el formato de las variables enviadas por el usuario
# si no es formato adecuado da error 
# 
##########################################################################
# CONDICIONES
# Aca verificamos las condiciones de control de las variables 
// La api_key es valida ? 
// puede hacer u crud ?
// Limite de request?
// No es mandatory pero si no manda la funcion mostramos todas las funciones disponibles
if ($function == "" || $function == null || $function == false) {
    //array_push($error, "function is manatory");
    $function = "functions_list";
}
////////////////////////////////////////////////////////////////////////////////
$function_list = array(
    "functions_list", // lista de todas las funciones disponibles
    "add",
    "details",
    "update",
    "delete",
    "push",
    "search",
);
//
if (!in_array($function, $function_list)) {
    array_push($error, "function name incorrect");
}
################################################################################
################################################################################
################################################################################

$content = (isset($_GET["content"])) ? clean($_GET["content"]) : null;
$language = (isset($_GET["language"])) ? clean($_GET["language"]) : null;

switch ($function) {

    case "functions_list":
        $data = array(
            "a" => '_translations',
            "functions" => $function_list,
            "examples" => array(
                "function_list" => API_URL . "index.php?c=api&api_key=demo&a=_translations&function=functions_list",
                "search[]" => API_URL . "index.php?c=api&api_key=demo&a=_translations&function=search&content=home",
                "search[language]" => API_URL . "index.php?c=api&api_key=demo&a=_translations&function=search&content=home&language=fr_BE",
//                "details" => API_URL . "index.php?c=api&api_key=demo&a=_translations&function=details&content=",
            ),
        );
        break;

    case "add":
        break;

    //   http://localhost/factux_46/index.php?c=api&a=_translations&api_key=demo&function=details&id=8
    case 'details':
        $content = (isset($_GET["content"])) ? clean($_GET["content"]) : null;
        $translations = api_translations_search_by_content($content);
        $resp = array();
        foreach ($translations as $key => $tr) {
            $resp[$key] = $tr;
        }

    case 'search':
        // 
        // http://localhost/factux_46/index.php?c=api&a=_translations&api_key=demo&function=search&content=home&language=fr_BE
        // http://localhost/factux_46/index.php?c=api&a=_translations&api_key=demo&function=search&content=invoices&language=fr_BE
        // http://localhost/factux_46/index.php?c=api&a=_translations&api_key=demo&function=search&content=budget&language=es_ES

    

        if ($language) {
            // si se envia idioma se presenta ese idioma
            $resp = _translations_search_by_content_language($content, $language);
            $data = array(
                "content" => $resp['content'],
                "translations" => array(
                    $language => $resp['translation']
                ),
            );
        } else {
            // si no todo lo que se encuentre
            $resp = api_translations_search_by_content($content);

            $data = array(
                "content" => $content,
                "translations" => array(
                ),
            );

            foreach ($resp as $key => $value) {
                $data['translations'][$value['language']] = $value['translation'];
            }
        } // fin if

        if (!$resp) {
            array_push($error, "Not find");
        }

        break;

    default:
        break;
}


################################################################################
################################################################################
################################################################################
if (!$error) {
    $json = json_encode($data, JSON_PRETTY_PRINT);
} else {
    $json = json_encode($error, JSON_PRETTY_PRINT);
}





################################################################################
include view('api', '_translations');
