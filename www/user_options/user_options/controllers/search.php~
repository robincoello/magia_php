<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$user_options = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $user_options = user_options_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_user_id":
        $user_id = (isset($_GET["user_id"]) && $_GET["user_id"] != "" ) ? clean($_GET["user_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search_by("user_id", $user_id));
        // puede hacer falta
        $url = "index.php?c=user_options&a=search&w=by_user_id&user_id=" . $user_id;
        $pagination->setUrl($url);
        $user_options = user_options_search_by("user_id", $user_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_option":
        $option = (isset($_GET["option"]) && $_GET["option"] != "" ) ? clean($_GET["option"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search_by("option", $option));
        // puede hacer falta
        $url = "index.php?c=user_options&a=search&w=by_option&option=" . $option;
        $pagination->setUrl($url);
        $user_options = user_options_search_by("option", $option, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_data":
        $data = (isset($_GET["data"]) && $_GET["data"] != "" ) ? clean($_GET["data"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search_by("data", $data));
        // puede hacer falta
        $url = "index.php?c=user_options&a=search&w=by_data&data=" . $data;
        $pagination->setUrl($url);
        $user_options = user_options_search_by("data", $data, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=user_options&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $user_options = user_options_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=user_options&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $user_options = user_options_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, user_options_search($txt));
        // puede hacer falta
        $url = "index.php?c=user_optionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $user_options = user_options_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$user_options = user_options_search($txt);
        break;
}


include view("user_options", "index");
