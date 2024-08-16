<?php

/**
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$content = (isset($_POST["content"])) ? clean($_POST["content"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

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


if (_translations_search($translation)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _translations_add(
            $content, $language, $translation
    );


    ############################################################################
    ############################################################################
    ############################################################################
    $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , 
    //$a , 
    $w = null;
    $description = "Add translations [id: $lastInsertId: content: $content, lang: $language, translation: $translation]";
    $doc_id = $lastInsertId;
    $crud = "create";
    $error = ($error) ? json_encode($error) : null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################


    switch ($redi) {
        case 2:
            header("Location: index.php?c=_content&a=search&w=hasNotTranslation&language=$language");
            break;

        default:
            header("Location: index.php?c=_translations&a=details&id=$lastInsertId");
            break;
    }

    
} else {

    array_push($error, "Check your form");
}

//include "www/_translations/views/index.php";   
include view("_translations", "index");
*/