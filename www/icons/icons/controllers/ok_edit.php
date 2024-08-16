<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$provider = (isset($_REQUEST["provider"]) && $_REQUEST["provider"] != "") ? clean($_REQUEST["provider"]) : false;
$icon = (isset($_REQUEST["icon"]) && $_REQUEST["icon"] != "") ? clean($_REQUEST["icon"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!$error) {

    icons_edit(
            $id, $provider, $icon, $order_by, $status
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
            // ejemplo index.php?c=icons&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
