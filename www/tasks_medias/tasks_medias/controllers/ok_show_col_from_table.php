<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_POST)) ? json_encode($_POST) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push("config_tasks_medias_show_col_from_table", $data, 'tasks_medias');

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_medias");
            break;

        case 2:
            header("Location: index.php?c=tasks_medias&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks_medias&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks_medias&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks_medias&a=ok_show_col_from_table&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}

