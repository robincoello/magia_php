<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$label = (isset($_POST["label"]) && $_POST["label"] != "" && $_POST["label"] != "null" ) ? clean($_POST["label"]) : false;
$father = (isset($_POST["father"]) && $_POST["father"] != "" && $_POST["father"] != "null" ) ? clean($_POST["father"]) : false;
$module = (isset($_POST["module"]) && $_POST["module"] != "" && $_POST["module"] != "null" ) ? clean($_POST["module"]) : false;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : false;
$author = (isset($_POST["author"]) && $_POST["author"] != "" && $_POST["author"] != "null" ) ? clean($_POST["author"]) : false;
$author_email = (isset($_POST["author_email"]) && $_POST["author_email"] != "" && $_POST["author_email"] != "null" ) ? clean($_POST["author_email"]) : false;
$url = (isset($_POST["url"]) && $_POST["url"] != "" && $_POST["url"] != "null" ) ? clean($_POST["url"]) : false;
$version = (isset($_POST["version"]) && $_POST["version"] != "" && $_POST["version"] != "null" ) ? clean($_POST["version"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$module) {
    array_push($error, '$module is mandatory');
}
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
if (!modules_is_module($module)) {
    array_push($error, '$module format error');
}
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

if (modules_search_by_unique("id", "module", $module)) {
    array_push($error, 'module already exists in data base');
}


//if( modules_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = modules_add(
            $label, $father, $module, $description, $author, $author_email, $url, $version, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=modules&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=modules");
            break;
    }
} else {

    include view("home", "pageError");
}


