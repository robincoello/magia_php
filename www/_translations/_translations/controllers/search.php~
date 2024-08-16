<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_translations = null;
$w = (isset($_GET["w"]) && $_GET['w'] != '') ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
if ($w) {
    switch ($w) {
        case "id":
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
            $description = "Search by id [$txt]";
            $_translations = ( $txt ) ? _translations_search_by_id($txt) : null;
            include view("_translations", "search");
            break;

        case "byContent":
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
            ################################################################################
            $pagination = new Pagination($page, _content_search_by_frase_contexto($txt));
            // puede hacer falta
            $pagination->setUrl('index.php?c=_translations&a=search&w=byContent&txt=' . $txt);
            $_translations = _content_search_by_frase_contexto($txt, $pagination->getStart(), $pagination->getLimit());
            ################################################################################
            $description = "Search by content [$txt]";
//            $_translations = ( $txt ) ? _translations_search_by_content($txt) : null;
            include view("_translations", "search");
            break;

//        case "byContent":
//            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//            ################################################################################
//            $pagination = new Pagination($page, _translations_search_by_content($txt));
//            // puede hacer falta
//            $pagination->setUrl('index.php?c=_translations&a=search&w=byContent&txt='.$txt);
//            $_translations = _translations_search_by_content($txt, $pagination->getStart(), $pagination->getLimit());
//            ################################################################################
//            $description = "Search by content [$txt]";
////            $_translations = ( $txt ) ? _translations_search_by_content($txt) : null;
//            include view("_translations", "search");
//            break;

        case "byTranslation":
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
            // logs
            $description = "Search by translation [$txt]";
            $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;
            $_translations = ( $txt ) ? _translations_search_traduction_in_lang($txt, $language) : null;
            include view("_translations", "search_byTranslation");
            break;

        case "toFix":
            $_translations = _translations_to_fix(users_field_contact_id("language", $u_id));
            $description = "To fix in [lang: " . users_field_contact_id("language", $u_id) . "]";
            include view("_translations", "toFix");
            break;

        case "minusculas":

            //$_translations = _translations_to_fix(users_field_contact_id("language", $u_id));
            //$description = "To fix in [lang: " . users_field_contact_id("language", $u_id) . "]";
            include view("_translations", "minusculas");
            break;

        default:
            $content = (isset($_GET["content"])) ? clean($_GET["content"]) : false;
            $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;

            $_translations = ( $content && $language ) ? _translations_search_extended($content, $language) : null;
            include view("_translations", "search");
            break;
    }
}





