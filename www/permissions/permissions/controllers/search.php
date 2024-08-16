<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$pag = null;
$rol = null;

$permissions = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $permissions = permissions_search_by_id($txt);
        break;

    case "byRol":
        $rol = (isset($_GET["rol"])) ? clean($_GET["rol"]) : false;
        ################################################################################
        $pagination = new Pagination($page, permissions_search_by_rol($rol));
        // puede hacer falta
        $pagination->setUrl('index.php?c=permissions&a=search&w=byRol&rol=' . $rol);
        $permissions = permissions_search_by_rol($rol, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//      $permissions = permissions_search_by_rol($rol);

        break;

    case "controller":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, permissions_search_by_controller($txt));
        // puede hacer falta
        $pagination->setUrl('index.php?c=permissions&a=search&w=controller&txt=' . $txt);
        $permissions = permissions_search_by_controller($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $permissions = permissions_search_by_controller($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, permissions_search($txt));
        // puede hacer falta
        $pagination->setUrl('index.php?c=permissions&a=search&txt=' . $txt);
        $permissions = permissions_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $permissions = permissions_search($txt, $pag);
        break;
}

// pagination
$totalItems = count($permissions);

$url = "index.php?c=$c&a=$a";

include view("permissions", "index");

