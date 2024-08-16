<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_content = null;
$view_tmp = null;
$w = (isset($_GET["w"]) && $_GET["w"] != '') ? clean($_GET["w"]) : false;
$l = (isset($_GET["l"]) && $_GET["l"] != '') ? clean($_GET["l"]) : 'a';
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $_content = _content_search_by_id($txt);
        $view_tmp = "index";
        break;

    case "hasNotTranslation":
        $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;
        $tmp = (isset($_GET["tmp"])) ? clean($_GET["tmp"]) : 1;

        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        $pagination = new Pagination($page, _content_search_hasNotTranslation($language));
        $pagination->setUrl('index.php?c=_content&a=search&w=hasNotTranslation&language=' . $language);
        $_content = _content_search_hasNotTranslation($language, $pagination->getStart(), $pagination->getLimit());
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        //    $_content = _content_search_hasNotTranslation($language);
//        vardump($tmp);
        switch ($tmp) {
            case 1:
                $view_tmp = "index_hasNotTranslations";
                break;
            case 2:
                $view_tmp = "index_hasNotTranslationsToSendGoogle";
                break;

            default:
                $view_tmp = "index_hasNotTranslations";
                break;
        }


        break;

    case "exportToTranslate":
        $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;
        $languageTo = (isset($_GET["languageTo"])) ? clean($_GET["languageTo"]) : false;
        //
        $start = (isset($_GET["start"])) ? clean($_GET["start"]) : 0;
        $end = (isset($_GET["end"])) ? clean($_GET["end"]) : 100;
        $_content = _content_exportLanguage($language, $start, $end);
        $view_tmp = "tr";
        break;

    case "exportLanguage":
        $languageFrom = (isset($_GET["languageFrom"])) ? clean($_GET["languageFrom"]) : false;
        $languageTo = (isset($_GET["languageTo"])) ? clean($_GET["languageTo"]) : false;
        $_content = _content_search_exportLanguage($languageFrom);
        $view_tmp = "exportLanguage";
        break;

    case "start_with":
        $l = (isset($_GET["l"])) ? clean($_GET["l"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _content_search_starts_with($l));
        // puede hacer falta
        $pagination->setUrl('index.php?c=_content&a=search&w=start_with&l=' . $l);
        $_content = _content_search_starts_with($l, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $_content = _content_search_starts_with($l);
        $view_tmp = "index";
        break;

    case "start_with_same_case":
        $l = (isset($_GET["l"])) ? clean($_GET["l"]) : false;
        $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _content_search_starts_with($l));
        // puede hacer falta
        $pagination->setUrl('index.php?c=_content&a=search&w=start_with&l=' . $l);
        $_content = _content_search_starts_with($l, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $_content = _content_search_starts_with($l);
        $view_tmp = "start_with_same_case";
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        // $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
        $pagination = new Pagination($page, _content_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=_content&a=search&w=all&txt=" . $txt);
        $_content = _content_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //$_content = _content_search($txt);
        $view_tmp = "index";
        break;
}


include view("_content", $view_tmp);
