<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_menus = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $_menus = _menus_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_location":
        $location = (isset($_GET["location"]) && $_GET["location"] != "" ) ? clean($_GET["location"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("location", $location));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_location&location=" . $location;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("location", $location, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("father_id", $father_id));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_target":
        $target = (isset($_GET["target"]) && $_GET["target"] != "" ) ? clean($_GET["target"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("target", $target));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_target&target=" . $target;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("target", $target, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("icon", $icon));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=_menus&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $_menus = _menus_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _menus_search($txt));
        // puede hacer falta
        $url = "index.php?c=_menusa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $_menus = _menus_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$_menus = _menus_search($txt);
        break;
}


include view("_menus", "index");
