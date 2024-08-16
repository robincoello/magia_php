<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$countries = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $countries = countries_search_by_id($txt);
        break;
    //
    case "byContinent":
        $continentName = (isset($_GET["continentName"])) ? clean($_GET["continentName"]) : false;
        ################################################################################
        $pagination = new Pagination($page, countries_list_by_continent($continentName));
        // puede hacer falta
        $pagination->setUrl("index.php?c=countries&a=search&w=byContinent&continentName=" . $continentName);
        $countries = countries_list_by_continent($continentName, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;
    //
    case "byEconomicUnion":
        $eu = (isset($_GET["eu"])) ? clean($_GET["eu"]) : false;
        ################################################################################
        $pagination = new Pagination($page, countries_list_by_economic_union($eu));
        // puede hacer falta
        $pagination->setUrl("index.php?c=countries&a=search&w=byEconomicUnion&eu=" . $eu);
        $countries = countries_list_by_economic_union($eu, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, countries_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=countries&a=search&txt=" . $txt);
        $countries = countries_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;
}


include view("countries", "index");
