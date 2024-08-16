<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$frase = (isset($_POST["frase"])) ? clean($_POST["frase"]) : false;
$contexto = (isset($_POST["contexto"])) ? clean($_POST["contexto"]) : false;

$error = array();
////////////////////////////////////////////////////////////////////////////////
if (!$frase) {
    array_push($error, '$frase is mandatory');
}
if (!$contexto) {
    array_push($error, '$contexto is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (_content_search($contexto)) {
    //array_push($error, "That text with that context the database already exists");
}

################################################################################
if (!$error) {

    $lastInsertId = _content_add(
            $frase, $contexto
    );

    header("Location: index.php?c=_content&a=details&id=$lastInsertId");
} else {
    include view("home", "pageError");
}