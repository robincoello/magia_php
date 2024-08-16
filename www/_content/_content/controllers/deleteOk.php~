<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
$language = (isset($_REQUEST["language"])) ? clean($_REQUEST["language"]) : false;

$error = array();
################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a != "deleteOk") {
    array_push($error, "Action error");
}

if (!_content_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################

if (!$error) {

    _content_delete(
            $id
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=_content&a=search&w=hasNotTranslation&language=$language");
            break;

        default:
            header("Location: index.php?c=_content");
            break;
    }
} else {
    include view("home", "pageError");
}


