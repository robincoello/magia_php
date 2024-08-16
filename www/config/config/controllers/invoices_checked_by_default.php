<?php

/**
 * Cuando se crea una factura
 * Que estatus de factura es por defecto ?
 * si no se registra esto el status por defecto sera: REGISTRADO
 */
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$sms = (isset($_REQUEST["sms"])) ? clean($_REQUEST["sms"]) : false;

$m = array();

switch ($sms) {
    case 1:
        array_push($m, "Update");
        break;

    default:
        break;
}

include view("config", "invoices_checked_by_default");
