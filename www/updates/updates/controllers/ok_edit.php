<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
$version = (isset($_REQUEST["version"]) && $_REQUEST["version"] != "") ? clean($_REQUEST["version"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$code_install = (isset($_REQUEST["code_install"]) && $_REQUEST["code_install"] != "") ? clean($_REQUEST["code_install"]) : false;
$code_uninstall = (isset($_REQUEST["code_uninstall"]) && $_REQUEST["code_uninstall"] != "") ? clean($_REQUEST["code_uninstall"]) : false;
$code_check = (isset($_REQUEST["code_check"]) && $_REQUEST["code_check"] != "") ? clean($_REQUEST["code_check"]) : false;
$installed = (isset($_REQUEST["installed"]) && $_REQUEST["installed"] != "") ? clean($_REQUEST["installed"]) : false;
$pass = (isset($_REQUEST["pass"]) && $_REQUEST["pass"] != "") ? clean($_REQUEST["pass"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$version) {
    array_push($error, '$version is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$code_install) {
    array_push($error, '$code_install is mandatory');
}
if (!$code_uninstall) {
    array_push($error, '$code_uninstall is mandatory');
}
if (!$code_check) {
    array_push($error, '$code_check is mandatory');
}
if (!$installed) {
    array_push($error, '$installed is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!updates_is_code($code)) {
    array_push($error, '$code format error');
}
if (!updates_is_date($date)) {
    array_push($error, '$date format error');
}
if (!updates_is_version($version)) {
    array_push($error, '$version format error');
}
if (!updates_is_name($name)) {
    array_push($error, '$name format error');
}
if (!updates_is_description($description)) {
    array_push($error, '$description format error');
}
if (!updates_is_code_install($code_install)) {
    array_push($error, '$code_install format error');
}
if (!updates_is_code_uninstall($code_uninstall)) {
    array_push($error, '$code_uninstall format error');
}
if (!updates_is_code_check($code_check)) {
    array_push($error, '$code_check format error');
}
if (!updates_is_installed($installed)) {
    array_push($error, '$installed format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( updates_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    updates_edit(
            $id, $code, $date, $version, $name, $description, $code_install, $code_uninstall, $code_check, $installed, $pass, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=updates&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
