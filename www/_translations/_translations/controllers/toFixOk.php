<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;

$error = array();
//
################################################################################
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if ($translation == "") {
    array_push($error, '$translation dont send');
}
//
################################################################################
if (!_translations_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    _translations_fix(
            $id, $translation
    );

    header("Location: index.php?c=_translations&a=search&w=toFix#$id");
}

$_translations = _translations_details($id);

include view("_translations", "index");
