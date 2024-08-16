<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$bank = (isset($_POST["bank"])) ? clean($_POST["bank"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$bic = (isset($_POST["bic"])) ? clean($_POST["bic"]) : false;
$iban = (isset($_POST["iban"])) ? clean($_POST["iban"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if ($bank == '' || $account_number == '') {
    array_push($error, 'Bank and Account number can not be empty');
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    _options_push('config_bank_bank', $bank, 'banks');
    _options_push('config_bank_account_number', $account_number, 'banks');
    _options_push('config_bank_bic', $bic, 'banks');
    _options_push('config_bank_iban', $iban, 'banks');

    switch ($redi) {
        case 1:
            break;
        default:
            header("Location: index.php?c=config&a=bank&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







