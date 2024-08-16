<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!$u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

die("go to contacts secction");
/**
 *

$tva = (isset($_REQUEST["tva"])) ? clean($_REQUEST["tva"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

if (!$tva || $tva == '') {
    array_push($error, "Vat is mandatory");
}
// si existen facturas ya no se puede cambiar de TVA
if (invoices_list()) {
    array_push($error, "If there are invoices you can no longer change your VAT");
}

$tva = tva_formated($tva);

################################################################################
if (!$error) {

    _options_push('config_company_tva', $tva, 'home');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=tva&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}
*/
    