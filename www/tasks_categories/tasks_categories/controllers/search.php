<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$tasks_categories = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $tasks_categories = tasks_categories_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("father_id", $father_id));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_category":
        $category = (isset($_GET["category"]) && $_GET["category"] != "" ) ? clean($_GET["category"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("category", $category));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_category&category=" . $category;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("category", $category, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_color":
        $color = (isset($_GET["color"]) && $_GET["color"] != "" ) ? clean($_GET["color"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("color", $color));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_color&color=" . $color;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("color", $color, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("icon", $icon));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=tasks_categories&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_categories_search($txt));
        // puede hacer falta
        $url = "index.php?c=tasks_categoriesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tasks_categories = tasks_categories_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$tasks_categories = tasks_categories_search($txt);
        break;
}


include view("tasks_categories", "index");
