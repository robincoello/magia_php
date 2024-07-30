<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

if ($data !== 'all' && $data == '') {
    array_push($error, 'All fields required');
}

if ($data !== 'all' && !is_id($data)) {
    array_push($error, 'Id format error');
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    _options_push('task_index_show_by_user', $data);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=config");
            break;

        case 2:
            header("Location: index.php?c=tasks");
            break;

        default:
            header("Location: index.php");

            break;
    }
} else {

    include view('home', 'pageError');
}







