<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$tasks = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $tasks = tasks_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_category_id":
        $category_id = (isset($_GET["category_id"]) && $_GET["category_id"] != "" ) ? clean($_GET["category_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("category_id", $category_id));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_category_id&category_id=" . $category_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("category_id", $category_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 



        break;

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_doc_id":
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("doc_id", $doc_id));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_doc_id&doc_id=" . $doc_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("doc_id", $doc_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_update":
        $date_update = (isset($_GET["date_update"]) && $_GET["date_update"] != "" ) ? clean($_GET["date_update"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("date_update", $date_update));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_date_update&date_update=" . $date_update;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("date_update", $date_update, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_color":
        $color = (isset($_GET["color"]) && $_GET["color"] != "" ) ? clean($_GET["color"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("color", $color));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_color&color=" . $color;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("color", $color, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status_contact":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_contacts_search_by_status_contact($status, $contact_id));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_status_contact&status=$status&contact_id=$contact_id";
        $pagination->setUrl($url);
        $tasks = tasks_contacts_search_by_status_contact("$status", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_search($txt));
        // puede hacer falta
        $url = "index.php?c=tasksa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tasks = tasks_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$tasks = tasks_search($txt);
        break;
}

include view("tasks", "index");
