<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : false;
$date = (isset($_POST["date"]) && $_POST["date"] != "" ) ? clean($_POST["date"]) : current_timestamp();
$version = (isset($_POST["version"]) && $_POST["version"] != "" && $_POST["version"] != "null" ) ? clean($_POST["version"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : false;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : false;
$code_install = (isset($_POST["code_install"]) && $_POST["code_install"] != "" && $_POST["code_install"] != "null" ) ? clean($_POST["code_install"]) : false;
$code_uninstall = (isset($_POST["code_uninstall"]) && $_POST["code_uninstall"] != "" && $_POST["code_uninstall"] != "null" ) ? clean($_POST["code_uninstall"]) : false;
$code_check = (isset($_POST["code_check"]) && $_POST["code_check"] != "" && $_POST["code_check"] != "null" ) ? clean($_POST["code_check"]) : false;
$installed = (isset($_POST["installed"]) && $_POST["installed"] != "" && $_POST["installed"] != "null" ) ? clean($_POST["installed"]) : false;
$pass = (isset($_POST["pass"]) && $_POST["pass"] != "" && $_POST["pass"] != "null" ) ? clean($_POST["pass"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = updates_add(
            $code, $date, $version, $name, $description, $code_install, $code_uninstall, $code_check, $installed, $pass, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=updates&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=updates");
            break;
    }
} else {

    include view("home", "pageError");
}


