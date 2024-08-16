<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$label = (isset($_REQUEST["label"]) && $_REQUEST["label"] != "") ? clean($_REQUEST["label"]) : false;
$father = (isset($_REQUEST["father"]) && $_REQUEST["father"] != "") ? clean($_REQUEST["father"]) : null;
//
$module = (isset($_REQUEST["module"]) && $_REQUEST["module"] != "") ? clean($_REQUEST["module"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$author = (isset($_REQUEST["author"]) && $_REQUEST["author"] != "") ? clean($_REQUEST["author"]) : false;
$author_email = (isset($_REQUEST["author_email"]) && $_REQUEST["author_email"] != "") ? clean($_REQUEST["author_email"]) : false;
$url = (isset($_REQUEST["url"]) && $_REQUEST["url"] != "") ? clean($_REQUEST["url"]) : false;
$version = (isset($_REQUEST["version"]) && $_REQUEST["version"] != "") ? clean($_REQUEST["version"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;

$error = array();

################################################################################
# REQUIRED
################################################################################
//if (!$module) {
//    array_push($error, '$module is mandatory');
//}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$author) {
    array_push($error, '$author is mandatory');
}
if (!$author_email) {
    array_push($error, '$author_email is mandatory');
}
if (!$url) {
    array_push($error, '$url is mandatory');
}
if (!$version) {
    array_push($error, '$version is mandatory');
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
//if (!modules_is_module($module)) {
//    array_push($error, '$module format error');
//}
if (!modules_is_description($description)) {
    array_push($error, '$description format error');
}
if (!modules_is_author($author)) {
    array_push($error, '$author format error');
}
if (!modules_is_author_email($author_email)) {
    array_push($error, '$author_email format error');
}
if (!modules_is_url($url)) {
    array_push($error, '$url format error');
}
if (!modules_is_version($version)) {
    array_push($error, '$version format error');
}
if (!modules_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!modules_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if (modules_search_by_unique("id", "module", $module)) {
//    array_push($error, 'module already exists in data base');
//}
if (strtolower($father) == 'null') {
    $father = null;
}
//if( modules_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

//    modules_edit(
//            $id, $label, $father, $module, $description, $author, $author_email, $url, $version, $order_by, $status
//    );


    modules_update(
            $id, $label, $father, $description, $author, $author_email, $url, $version, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=modules&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
