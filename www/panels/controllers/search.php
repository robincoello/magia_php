<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$panels = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $panels = panels_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $panels = panels_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_action":
        $action = (isset($_GET["action"]) && $_GET["action"] != "" ) ? clean($_GET["action"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("action", $action));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_action&action=" . $action;
        $pagination->setUrl($url);
        $panels = panels_search_by("action", $action, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $panels = panels_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_panel":
        $panel = (isset($_GET["panel"]) && $_GET["panel"] != "" ) ? clean($_GET["panel"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("panel", $panel));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_panel&panel=" . $panel;
        $pagination->setUrl($url);
        $panels = panels_search_by("panel", $panel, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $panels = panels_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=panels&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $panels = panels_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, panels_search($txt));
        // puede hacer falta
        $url = "index.php?c=panelsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $panels = panels_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$panels = panels_search($txt);
        break;
}


include view("panels", "index");
