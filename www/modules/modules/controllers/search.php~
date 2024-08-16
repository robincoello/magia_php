<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$modules = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $modules = modules_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $modules = modules_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_father":
        $father = (isset($_GET["father"]) && $_GET["father"] != "" ) ? clean($_GET["father"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("father", $father));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_father&father=" . $father;
        $pagination->setUrl($url);
        $modules = modules_search_by("father", $father, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_module":
        $module = (isset($_GET["module"]) && $_GET["module"] != "" ) ? clean($_GET["module"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("module", $module));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_module&module=" . $module;
        $pagination->setUrl($url);
        $modules = modules_search_by("module", $module, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $modules = modules_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_author":
        $author = (isset($_GET["author"]) && $_GET["author"] != "" ) ? clean($_GET["author"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("author", $author));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_author&author=" . $author;
        $pagination->setUrl($url);
        $modules = modules_search_by("author", $author, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_author_email":
        $author_email = (isset($_GET["author_email"]) && $_GET["author_email"] != "" ) ? clean($_GET["author_email"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("author_email", $author_email));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_author_email&author_email=" . $author_email;
        $pagination->setUrl($url);
        $modules = modules_search_by("author_email", $author_email, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $modules = modules_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_version":
        $version = (isset($_GET["version"]) && $_GET["version"] != "" ) ? clean($_GET["version"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("version", $version));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_version&version=" . $version;
        $pagination->setUrl($url);
        $modules = modules_search_by("version", $version, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $modules = modules_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=modules&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $modules = modules_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, modules_search($txt));
        // puede hacer falta
        $url = "index.php?c=modulesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $modules = modules_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$modules = modules_search($txt);
        break;
}


include view("modules", "index");
