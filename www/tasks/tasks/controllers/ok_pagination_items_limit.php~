<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

$data = intval($data);

if ($data < 1 || $data > 1000) {
    array_push($error, "Must be between 1 and 1000");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config_tasks_pagination_items_limit", $data, "tasks");

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks");
            break;

        case 2:
            header("Location: index.php?c=tasks&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks&a=ok_pagination_items_limit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
