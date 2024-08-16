<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$frase = (isset($_POST["frase"])) ? clean($_POST["frase"]) : false;
$contexto = (isset($_POST["contexto"])) ? clean($_POST["contexto"]) : false;

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!_content_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    _content_edit(
            $id, $frase, $contexto
    );
    header("Location: index.php?c=_content&a=details&id=$id");
} else {
    include view('home', 'pageError');
}

//$_content = _content_details($id);
//
//include view("_content", "index");
