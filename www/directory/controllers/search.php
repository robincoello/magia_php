<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$directory = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//        ################################################################################
//        $pagination = new Pagination($page, directory_search_by_id($txt));
//        $pagination->setUrl('index.php?c=directory&a=search&w=id&txt=' . $txt);
//        $directory = directory_search_by_id($txt, $pagination->getStart(), $pagination->getLimit());
//        ################################################################################
//        $directory = directory_search_by_id($txt);
        break;

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"])) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_search_by_contact_id($contact_id));
        $pagination->setUrl('index.php?c=directory&a=search&w=by_contact_id&contact_id=' . $contact_id);
        $directory = directory_search_by_contact_id($contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    case "by_name":
        $name = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_search_by_name($name));
        $pagination->setUrl('index.php?c=directory&a=search&w=by_name&txt=' . $name);
        $directory = directory_search_by_name($name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, directory_search($txt));
        $pagination->setUrl('index.php?c=directory&a=search&w=all&txt=' . $txt);
        $directory = directory_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;
}

include view("directory", "index");
