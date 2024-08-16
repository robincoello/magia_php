<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$level = (isset($_POST["level"])) ? clean($_POST["level"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$u_id = (isset($_POST["u_id"])) ? clean($_POST["u_id"]) : false;
$u_rol = (isset($_POST["u_rol"])) ? clean($_POST["u_rol"]) : false;
$c = (isset($_POST["c"])) ? clean($_POST["c"]) : false;
$a = (isset($_POST["a"])) ? clean($_POST["a"]) : false;
$w = (isset($_POST["w"])) ? clean($_POST["w"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$doc_id = (isset($_POST["doc_id"])) ? clean($_POST["doc_id"]) : false;
$crud = (isset($_POST["crud"])) ? clean($_POST["crud"]) : false;
$error = (isset($_POST["error"])) ? clean($_POST["error"]) : false;
$val_get = (isset($_POST["val_get"])) ? clean($_POST["val_get"]) : false;
$val_post = (isset($_POST["val_post"])) ? clean($_POST["val_post"]) : false;
$val_request = (isset($_POST["val_request"])) ? clean($_POST["val_request"]) : false;
$ip4 = (isset($_POST["ip4"])) ? clean($_POST["ip4"]) : false;
$ip6 = (isset($_POST["ip6"])) ? clean($_POST["ip6"]) : false;
$broswer = (isset($_POST["broswer"])) ? clean($_POST["broswer"]) : false;

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

if (!logs_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    logs_edit(
            $id, $level, $date, $u_id, $u_rol, $c, $a, $w, $description, $doc_id, $crud, $error, $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    header("Location: index.php?c=logs&a=details&id=$id");
}

$logs = logs_details($id);

include view("logs", "index");
