<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$logs = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_search_by_id($txt));
        // puede hacer falta
//        $pagination->setUrl("");      
        $logs = logs_search_by_id($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $logs = logs_search_by_id($txt);
        break;

    case "byC": // by controller
        $controller = (isset($_GET["controller"])) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_seach_by_controller($controller));
        // puede hacer falta
        $pagination->setUrl("index.php?c=logs&a=search&w=byC&controller=" . $controller);
        $logs = logs_seach_by_controller($controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $logs = logs_seach_by_controller($controller);

        break;

    case "byCA":
        $controller = (isset($_GET["controller"])) ? clean($_GET["controller"]) : false;
        $action = (isset($_GET["action"])) ? clean($_GET["action"]) : false;

        ################################################################################
        $pagination = new Pagination($page, logs_seach_by_c_and_a($controller, $action));
        // puede hacer falta
//        $pagination->setUrl("");      
        $logs = logs_seach_by_c_and_a($controller, $action, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $logs = logs_seach_by_c_and_a($controller, $action);
        break;

    case "byCE":
        $controller = (isset($_GET["controller"])) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_seach_by_c_and_error($controller));
        // puede hacer falta
//        $pagination->setUrl("");      
        $logs = logs_seach_by_c_and_error($controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $logs = logs_seach_by_c_and_error($controller);
        break;

    case "byLevel":
        $level = (isset($_GET["level"])) ? clean($_GET["level"]) : false;
        //$action = (isset($_GET["action"])) ? clean($_GET["action"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_seach_by_level($level));
        // puede hacer falta
        $pagination->setUrl("index.php?c=logs&a=search&w=byLevel&level=" . $level);
        $logs = logs_seach_by_level($level, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //$logs = logs_seach_by_level($level);
        break;

    case "byUser": // by user
        $user_id = (isset($_GET["user_id"])) ? clean($_GET["user_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_seach_by_user($user_id));
        // puede hacer falta
//        $pagination->setUrl("");
        $logs = logs_seach_by_user($user_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $logs = logs_seach_by_user($user_id);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, logs_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=logs&a=search&w=all&txt=" . $txt);
        $logs = logs_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;
}

include view("logs", "index");
