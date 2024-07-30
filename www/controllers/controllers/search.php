<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$controllers = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $controllers = controllers_search_by_id($txt);
        $view = "index";
        break;
    case "folders":
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        // $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
        $pagination = new Pagination($page, controllers_folders_list());
        // puede hacer falta
        $pagination->setUrl("index.php?c=controllers&a=search&w=folders");
//        $folders_list = controllers_folders_list($pagination->getStart(), $pagination->getLimit());
        $folders_list = controllers_folders_list($pagination->getStart(), 9999);
        ################################################################################
//        vardump($controllers);
//        $controllers = controllers_search($txt);
        $view = "like_controller";
        break;
    // son los controladores que no tienen carpeta
    // son los controladores que no tienen carpeta
    // son los controladores que no tienen carpeta
    case "controllers_without_folders":
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        // $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
        $pagination = new Pagination($page, controllers_without_folders());
        // puede hacer falta
        $pagination->setUrl("index.php?c=controllers&a=search&w=folders");
//        $folders_list = controllers_folders_list($pagination->getStart(), $pagination->getLimit());
        $controllers = controllers_without_folders($pagination->getStart(), 9999);
        ################################################################################
//        vardump($controllers);
//        $controllers = controllers_search($txt);
        $view = "controllers_without_folders";
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        // $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
        $pagination = new Pagination($page, controllers_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=controllers&a=search&w=&txt=" . $txt);
        $controllers = controllers_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $controllers = controllers_search($txt);
        $view = "index";
        break;
}


include view("controllers", $view);
