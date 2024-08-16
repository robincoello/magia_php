<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$icons = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $icons = icons_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_provider":
        $provider = (isset($_GET["provider"]) && $_GET["provider"] != "" ) ? clean($_GET["provider"]) : false;
        ################################################################################
        $pagination = new Pagination($page, icons_search_by("provider", $provider));
        // puede hacer falta
        $url = "index.php?c=icons&a=search&w=by_provider&provider=" . $provider;
        $pagination->setUrl($url);
        $icons = icons_search_by("provider", $provider, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        ################################################################################
        $pagination = new Pagination($page, icons_search_by("icon", $icon));
        // puede hacer falta
        $url = "index.php?c=icons&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $icons = icons_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, icons_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=icons&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $icons = icons_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, icons_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=icons&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $icons = icons_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, icons_search($txt));
        // puede hacer falta
        $url = "index.php?c=iconsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $icons = icons_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$icons = icons_search($txt);
        break;
}


include view("icons", "index");
