<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$eu = (isset($_POST["eu"])) ? clean($_POST["eu"]) : false;
$countryCode = (isset($_POST["countryCode"])) ? clean($_POST["countryCode"]) : false;
$countryName = (isset($_POST["countryName"])) ? clean($_POST["countryName"]) : false;
$currencyCode = (isset($_POST["currencyCode"])) ? clean($_POST["currencyCode"]) : false;
$fipsCode = (isset($_POST["fipsCode"])) ? clean($_POST["fipsCode"]) : false;
$isoNumeric = (isset($_POST["isoNumeric"])) ? clean($_POST["isoNumeric"]) : false;
$north = (isset($_POST["north"])) ? clean($_POST["north"]) : false;
$south = (isset($_POST["south"])) ? clean($_POST["south"]) : false;
$east = (isset($_POST["east"])) ? clean($_POST["east"]) : false;
$west = (isset($_POST["west"])) ? clean($_POST["west"]) : false;
$capital = (isset($_POST["capital"])) ? clean($_POST["capital"]) : false;
$continentName = (isset($_POST["continentName"])) ? clean($_POST["continentName"]) : false;
$continent = (isset($_POST["continent"])) ? clean($_POST["continent"]) : false;
$languages = (isset($_POST["languages"])) ? clean($_POST["languages"]) : false;
$isoAlpha3 = (isset($_POST["isoAlpha3"])) ? clean($_POST["isoAlpha3"]) : false;
$geonameId = (isset($_POST["geonameId"])) ? clean($_POST["geonameId"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!countries_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    countries_edit(
            $id, $eu, $countryCode, $countryName, $currencyCode, $fipsCode, $isoNumeric, $north, $south, $east, $west, $capital, $continentName, $continent, $languages, $isoAlpha3, $geonameId
    );
    header("Location: index.php?c=countries&a=details&id=$id");
}

$countries = countries_details($id);

include view("countries", "index");
