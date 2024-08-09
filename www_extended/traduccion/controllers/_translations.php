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
################################################################################
################################################################################

function api_extract_quoted_text($input) {
    if (preg_match('/"([^"]+)"/', $input, $matches)) {
        return $matches[1];
    }
    return null;
}
function api_curl_request($url, $i, $attempts) {
    $i++;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);


    if (false === $result || 200 !== $httpcode) {
        if ($i >= $attempts) {
            return null;
        } else {
            usleep(1500000); 
            return api_curl_request($url, $i, $attempts);
        }
    } else {
        return $result;
    }
}


function api_getSentencesFromJSON($json) {
    $arr = json_decode($json, true);
    $sentences = '';


    if (isset($arr['sentences'])) {
        foreach ($arr['sentences'] as $s) {
            $sentences .= isset($s['trans']) ? $s['trans'] : '';
        }
    }

    return $sentences;
}



function api_fieldsString($fields) {
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key.'='.urlencode($value).'&';
    }
    return rtrim($fields_string, '&');
}

function api_curl_request_for_translate($url, $fields, $fields_string, $i, $attempts) {
    $i++;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (false === $result || 200 !== $httpcode) {
        if ($i >= $attempts) {
            return null;
        } else {
            usleep(1500000); // timeout 1.5 sec
            return api_curl_request_for_translate($url, $fields, $fields_string, $i, $attempts);
        }
    } else {
        return $result;
    }
    curl_close($ch);
}


function api_requestTranslation($source, $target, $text, $attempts) {
    $url = 'https://translate.google.com/translate_a/single?client=at&dt=t&dt=ld&dt=qca&dt=rm&dt=bd&dj=1&hl=uk-RU&ie=UTF-8&oe=UTF-8&inputm=2&otf=2&iid=1dd3b944-fa62-4b55-b330-74909a99969e';
    $fields = [
        'sl' => urlencode($source),
        'tl' => urlencode($target),
        'q'  => urlencode($text),
    ];
    
    if (strlen($fields['q']) >= 5000) {
        echo 'Maximum number of characters exceeded: 5000';
    }
    
    $fields_string = api_fieldsString($fields);


    $content_ = api_curl_request_for_translate($url, $fields, $fields_string, 0, $attempts);
 
    return api_getSentencesFromJSON($content_);

   
}


function api_translate($source, $target, $text, $attempts = 5) {
    return api_requestTranslation($source, $target, $text, $attempts);
   
}


function api_translations_search_by_content($content) {
    
    global $db;
    $attempts = 5;
    $base_url = 'https://coop.factuz.com/index.php';
    $params['c'] = 'api'; 
    $params['api_key'] = isset($_GET['api_key']) ? $_GET['api_key'] : 'demo';  
    $params['a'] = isset($_GET['a']) ? $_GET['a'] : '_translations'; 
    $params['function'] = isset($_GET['function']) ? $_GET['function'] : 'search'; 
    $params['content'] = $content; 
    $word = isset($_GET['content']) ? $_GET['content'] : '';


    
    $query_string = http_build_query($params); 
    
    $url = $base_url . '?' . $query_string;
    
    $response = api_curl_request($url, 0, $attempts);
    

    if(api_extract_quoted_text($response) == 'Not find'){
        $source = 'es';
        $target = 'fr';
        $language  = $_GET['language'];


        $resp_translate = api_translate($source, $target, $word, $attempts);
        
        $sql = "
        SELECT id, content, language, translation 
        FROM `_translations` 
        WHERE `content` = '".$word."'
        ORDER BY id DESC LIMIT 1";
        


        $query = $db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();


        if (empty($data)) {


            $parts = explode('_', $language);
            $lang = $parts[0]; 

            $sql_check = "SELECT * FROM _content WHERE frase LIKE :word";

            $query_check = $db->prepare($sql_check);
            $query_check->bindValue(':word', '%' . $word . '%', PDO::PARAM_STR);
            $query_check->execute();
            $data_content = $query_check->fetchAll();
            
            if (empty($data_content)) {
                $sql_insert_content = "
                INSERT INTO _content (id, frase, contexto) 
                VALUES (NULL, :word, NULL)";
            
                $query_insert_content = $db->prepare($sql_insert_content);
                $query_insert_content->bindValue(':word', $word, PDO::PARAM_STR);

                if ($query_insert_content->execute()) {
                    $lastInsertId = $db->lastInsertId();
                } 
            } 


            
            $sql_insert = "
            INSERT INTO _translations (id,content, language, translation) 
            VALUES (null,:word, :language, :translation)";
            
            $query = $db->prepare($sql_insert);
            
            $query->bindValue(':word', $content, PDO::PARAM_STR); 
            $query->bindValue(':language', $language, PDO::PARAM_STR);
            $query->bindValue(':translation', $resp_translate, PDO::PARAM_STR);
            $query->execute();
        }
        
    }


    return api_curl_request($url, 0, $attempts);

}

function api_search_word_in_table($content){
    global $db;
    
    $sql = "SELECT * FROM _content WHERE frase LIKE '%".$content."%'";

    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();

    return json_encode($data);


}
function api_search_word_in_table_translations($content){
    global $db;
    
    $sql = "SELECT * FROM _translations WHERE content LIKE '%".$content."%'";

    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();

    return json_encode($data);


}
api_translations_search_by_content($content);
echo '<pre>';
echo api_search_word_in_table($content);
echo '<br>';
echo api_search_word_in_table_translations($content);
echo '</pre>';



// if ($response !== null) {
//     echo "Respuesta de la API: " . $response;
//     echo json_encode($a);
// } else {
//     echo "No se pudo obtener una respuesta de la API después de varios intentos.";
// }





################################################################################
include view('api', '_translations');
