<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$detail_users = null;

$w = (isset($_GET['w'])) ? clean($_GET['w']) : false;
//$by = (isset($_GET['by'])) ? clean($_GET['by']) : false;
$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

$txt = "%$txt%";

switch ($w) {
    case 'blocked': //-1
        ################################################################################
        $pagination = new Pagination($page, users_list_by_status(USER_BLOCKED));
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=blocked");
        $users = users_list_by_status(USER_BLOCKED, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $users_info = users_list_by_status(USER_BLOCKED);
        break;

    case 'waiting': //0
        ################################################################################
        $pagination = new Pagination($page, users_list_by_status(USER_WAITING));
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=waiting");
        $users = users_list_by_status(USER_WAITING, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $users_info = users_list_by_status(USER_WAITING);
        break;

    case 'online': //0
//        $users_info = users_list_by_status(USER_ONLINE);
        ################################################################################
        $pagination = new Pagination($page, users_list_by_status(USER_ONLINE));
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=online");
        $users = users_list_by_status(USER_ONLINE, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    case 'by_rol':
        $rol = (isset($_GET['rol'])) ? clean($_GET['rol']) : false;
        ################################################################################
        $pagination = new Pagination($page, users_list_by_rol($rol));
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=by_rol&rol=" . $rol);
        $users = users_list_by_rol($rol, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $users_info = users_list_by_rol($rol);
        break;

    case 'all':
        ################################################################################
        $pagination = new Pagination($page, users_list_by_all($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=all&txt=" . $txt);
        $users = users_list_by_all($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //$users_info = users_list_by_all($txt);
        break;

    default:
        ################################################################################
        $pagination = new Pagination($page, users_list());
        // puede hacer falta
        $pagination->setUrl("index.php?c=users&a=search&w=all&txt=" . $txt);
        $users = users_list($pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // $users_info = users_list();
        break;
}


include view("users", "index");
