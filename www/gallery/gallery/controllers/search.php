<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$gallery = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $gallery = gallery_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_owner_id":
        $owner_id = (isset($_GET["owner_id"]) && $_GET["owner_id"] != "" ) ? clean($_GET["owner_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("owner_id", $owner_id));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_owner_id&owner_id=" . $owner_id;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("owner_id", $owner_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_doc_id":
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("doc_id", $doc_id));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_doc_id&doc_id=" . $doc_id;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("doc_id", $doc_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_alt":
        $alt = (isset($_GET["alt"]) && $_GET["alt"] != "" ) ? clean($_GET["alt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("alt", $alt));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_alt&alt=" . $alt;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("alt", $alt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=gallery&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $gallery = gallery_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, gallery_search($txt));
        // puede hacer falta
        $url = "index.php?c=gallerya=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $gallery = gallery_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$gallery = gallery_search($txt);
        break;
}


include view("gallery", "index");
