<?php

/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$content = (isset($_POST["content"])) ? clean($_POST["content"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;

$error = array();

if (!$content) {
    array_push($error, '$content is mandatory');
}
if (!$language) {
    array_push($error, '$language is mandatory');
}
if (!$translation) {
    array_push($error, '$translation is mandatory');
}

#************************************************************************
// Busca si uya existe el texto en la BD

if (_translations_search_by_lang($content, $language) ) {
    array_push($error, "That content has translation");
}

if (!$error) {
    
    $lastInsertId = _translations_add(
            $content, $language, $translation
    );
    
    
    
    header("Location: index.php?c=_content&a=search&w=hasNotTranslation&language=$language");

     
} else {
    include view("home", "pageError");
}
 * 
 */



