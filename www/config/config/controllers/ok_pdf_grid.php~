<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

if ($data == '' || $data == 'null') {
    array_push($error, 'All fields required');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_pdf_grid', $data);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=config&a=pdf_grid&sms=1");
            break;

        case 2:
            header("Location: index.php?c=doc_models_lines&a=details_by_modele_doc&doc=$redi[doc]");
            break;

        default:
            header("Location: index.php?c=config");
            break;
    }
} else {

    include view('home', 'pageError');
}




//http://localhost/factuz/index.php?c=doc_models&a=search&modele=a&doc=payroll
//http://localhost/factuz/index.php?c=doc_models&a=search&modele=a&doc=reminders1


