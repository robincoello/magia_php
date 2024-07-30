<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$country_provinces = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $country_provinces = country_provinces_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_country":
        $country = (isset($_GET["country"]) && $_GET["country"] != "" ) ? clean($_GET["country"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search_by("country", $country));
        // puede hacer falta
        $url = "index.php?c=country_provinces&a=search&w=by_country&country=" . $country;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search_by("country", $country, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=country_provinces&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_province":
        $province = (isset($_GET["province"]) && $_GET["province"] != "" ) ? clean($_GET["province"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search_by("province", $province));
        // puede hacer falta
        $url = "index.php?c=country_provinces&a=search&w=by_province&province=" . $province;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search_by("province", $province, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=country_provinces&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=country_provinces&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, country_provinces_search($txt));
        // puede hacer falta
        $url = "index.php?c=country_provincesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $country_provinces = country_provinces_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$country_provinces = country_provinces_search($txt);
        break;
}


include view("country_provinces", "index");
