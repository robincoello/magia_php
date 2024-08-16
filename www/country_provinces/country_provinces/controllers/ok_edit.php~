<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$country = (isset($_REQUEST["country"]) && $_REQUEST["country"] != "") ? clean($_REQUEST["country"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$province = (isset($_REQUEST["province"]) && $_REQUEST["province"] != "") ? clean($_REQUEST["province"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$country) {
    array_push($error, '$country is mandatory');
}
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$province) {
    array_push($error, '$province is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!country_provinces_is_country($country)) {
    array_push($error, '$country format error');
}
if (!country_provinces_is_code($code)) {
    array_push($error, '$code format error');
}
if (!country_provinces_is_province($province)) {
    array_push($error, '$province format error');
}
if (!country_provinces_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!country_provinces_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( country_provinces_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    country_provinces_edit(
            $id, $country, $code, $province, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=country_provinces&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
