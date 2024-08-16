<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$directory_names = null;
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $directory_names = directory_names_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_names_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=directory_names&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $directory_names = directory_names_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_names_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=directory_names&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $directory_names = directory_names_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_names_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=directory_names&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $directory_names = directory_names_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_names_search($txt));
        // puede hacer falta
        $url = "index.php?c=directory_namesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $directory_names = directory_names_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$directory_names = directory_names_search($txt);
        break;
}


include view("directory_names", "index");
