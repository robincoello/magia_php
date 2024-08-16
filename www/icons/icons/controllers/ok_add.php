<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$provider = (isset($_POST["provider"]) && $_POST["provider"] != "" && $_POST["provider"] != "null" ) ? clean($_POST["provider"]) : '';
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : '';
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : '1';
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : '1';
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!icons_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!icons_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (icons_search_by_unique("id", "icon", $icon)) {
    array_push($error, 'Icon already exists in data base');
}


//if( icons_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = icons_add(
            $provider, $icon, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=icons");
            break;

        case 2:
            header("Location: index.php?c=icons&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=icons&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=icons&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=icons&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


