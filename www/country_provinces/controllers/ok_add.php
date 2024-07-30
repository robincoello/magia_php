<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$country = (isset($_POST["country"]) && $_POST["country"] != "" && $_POST["country"] != "null" ) ? clean($_POST["country"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$province = (isset($_POST["province"]) && $_POST["province"] != "" && $_POST["province"] != "null" ) ? clean($_POST["province"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : null;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : null;
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
################################################################################
if (!$error) {
    $lastInsertId = country_provinces_add(
            $country, $code, $province, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=country_provinces&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=country_provinces");
            break;
    }
} else {

    include view("home", "pageError");
}


