<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$addresses = null;
$pagination = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $addresses = addresses_search_by_id($txt);
        break;

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"])) ? clean($_GET["contact_id"]) : false;
        $addresses = addresses_search_by_contact_id($contact_id);
        break;

    case "by_country":
        $country = (isset($_GET["country"])) ? clean($_GET["country"]) : false;
        ################################################################################
        $pagination = new Pagination($page, addresses_search_by_country($country));
        $pagination->setUrl('index.php?c=addresses&a=search&w=by_country&country=' . $country);
        $addresses = addresses_search_by_country($country, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, addresses_search($txt));
        $pagination->setUrl('index.php?c=addresses&a=search&w=all&txt=' . $txt);
        $addresses = addresses_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $addresses = addresses_search($txt) ;


        break;
}

include view("addresses", "index");
