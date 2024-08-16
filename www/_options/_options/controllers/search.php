<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_options = null;
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $_options = _options_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_option":
        $option = (isset($_GET["option"]) && $_GET["option"] != "" ) ? clean($_GET["option"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("option", $option));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_option&option=" . $option;
        $pagination->setUrl($url);
        $_options = _options_search_by("option", $option, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $_options = _options_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_data":
        $data = (isset($_GET["data"]) && $_GET["data"] != "" ) ? clean($_GET["data"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("data", $data));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_data&data=" . $data;
        $pagination->setUrl($url);
        $_options = _options_search_by("data", $data, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_group":
        $group = (isset($_GET["group"]) && $_GET["group"] != "" ) ? clean($_GET["group"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("group", $group));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_group&group=" . $group;
        $pagination->setUrl($url);
        $_options = _options_search_by("group", $group, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $_options = _options_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $_options = _options_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=_options&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $_options = _options_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, _options_search($txt));
        // puede hacer falta
        $url = "index.php?c=_optionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $_options = _options_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$_options = _options_search($txt);
        break;
}


include view("_options", "index");
