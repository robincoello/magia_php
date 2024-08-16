<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$tasks_medias = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $tasks_medias = tasks_medias_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_task_id":
        $task_id = (isset($_GET["task_id"]) && $_GET["task_id"] != "" ) ? clean($_GET["task_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("task_id", $task_id));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_task_id&task_id=" . $task_id;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("task_id", $task_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=tasks_medias&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tasks_medias_search($txt));
        // puede hacer falta
        $url = "index.php?c=tasks_mediasa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tasks_medias = tasks_medias_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$tasks_medias = tasks_medias_search($txt);
        break;
}


include view("tasks_medias", "index");
