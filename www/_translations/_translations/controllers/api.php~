<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
// https://github.com/vosfactures/api#token

$s = (isset($_GET["s"]) && isset($_GET["s"]) != '') ? clean($_GET["s"]) : false; // string
$l = (isset($_GET["l"]) && isset($_GET["l"]) != '') ? clean($_GET["l"]) : false; // lang

$translations = array();
$error = array();
$res = array();

################################################################################
# var obligatorias
// si no se envia $s da error
if (!$s) {
    array_push($error, "String dont send");
}
################################################################################
# var formato 
// si $l no se envia 
// se muestras todos los idiomas que presentan esta traduccio 
if (!_languages_is_language($l)) {
    array_push($error, "Languague format error");
}
################################################################################
# condiciones
# // idioma existe en los idiomas activados 
//if (!_languages_search_by_language($l)) {
//    array_push($error, "This language is not actived");
//}
################################################################################
################################################################################

if (!$error) {

    if ($l) {
        // traduccion segun el idioma 
        $res = _translations_by_content_language($s, $l);
        $translations[$l] = $res;
        //array_push($translations, array("translation"=>$res), array("language"=>$l ));
    } else {
        // traducciones en todos lo idiomas 
        $res = _translations_by_content($s);

        foreach ($res as $key => $value) {
            // echo "<p>$key - $value[language] - $value[translation]</p>"; 
            // array_push($translations, $value);
            $translations[$value['language']] = $value['translation'];
            // array_push($translations, array("translation"=>$value['translation'], "language"=>$value['language'], "content"=>$value['content'] ));
        }
    }
    // si hay error
} else {
    $res = $error;
}



include view("_translations", "api");

if ($debug) {

    include "www/_translations/views/debug.php";
}