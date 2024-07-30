<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$sms = (isset($_REQUEST["sms"])) ? clean($_REQUEST["sms"]) : false;

$m = array();

switch ($sms) {
    case 1:
        array_push($m, "Update");
        break;

    default:
        break;
}



$_content = null;

$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;

$error = array();

################################################################################

switch ($w) {

    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        // $_content = _content_search_by_id($txt) ;
        break;

    case "section":
        $s = (isset($_GET["s"])) ? clean($_GET["s"]) : false;
        $d = (isset($_GET["d"])) ? clean($_GET["d"]) : false;
        //  $_content = _content_search_by_id($txt) ;
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        //    $_content = _content_search($txt) ;
        break;
}




include view("config", "index");

