<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$updates = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $updates = updates_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $updates = updates_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $updates = updates_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_version":
        $version = (isset($_GET["version"]) && $_GET["version"] != "" ) ? clean($_GET["version"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("version", $version));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_version&version=" . $version;
        $pagination->setUrl($url);
        $updates = updates_search_by("version", $version, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $updates = updates_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $updates = updates_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code_install":
        $code_install = (isset($_GET["code_install"]) && $_GET["code_install"] != "" ) ? clean($_GET["code_install"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("code_install", $code_install));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_install&code_install=" . $code_install;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_install", $code_install, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code_uninstall":
        $code_uninstall = (isset($_GET["code_uninstall"]) && $_GET["code_uninstall"] != "" ) ? clean($_GET["code_uninstall"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("code_uninstall", $code_uninstall));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_uninstall&code_uninstall=" . $code_uninstall;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_uninstall", $code_uninstall, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code_check":
        $code_check = (isset($_GET["code_check"]) && $_GET["code_check"] != "" ) ? clean($_GET["code_check"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("code_check", $code_check));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_check&code_check=" . $code_check;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_check", $code_check, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_installed":
        $installed = (isset($_GET["installed"]) && $_GET["installed"] != "" ) ? clean($_GET["installed"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("installed", $installed));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_installed&installed=" . $installed;
        $pagination->setUrl($url);
        $updates = updates_search_by("installed", $installed, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_pass":
        $pass = (isset($_GET["pass"]) && $_GET["pass"] != "" ) ? clean($_GET["pass"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("pass", $pass));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_pass&pass=" . $pass;
        $pagination->setUrl($url);
        $updates = updates_search_by("pass", $pass, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $updates = updates_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $updates = updates_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, updates_search($txt));
        // puede hacer falta
        $url = "index.php?c=updatesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $updates = updates_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$updates = updates_search($txt);
        break;
}


include view("updates", "index");
