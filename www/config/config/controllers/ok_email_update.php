<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$config_mail_username = (isset($_POST["config_mail_username"])) ? clean($_POST["config_mail_username"]) : false;
$config_mail_password = (isset($_POST["config_mail_password"])) ? clean($_POST["config_mail_password"]) : false;
$config_mail_host = (isset($_POST["config_mail_host"])) ? clean($_POST["config_mail_host"]) : false;
$config_mail_port = (isset($_POST["config_mail_port"])) ? clean($_POST["config_mail_port"]) : false;
$config_mail = (isset($_POST["config_mail"]) && $_POST["config_mail"] != "") ? 1 : 0;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

if ($config_mail_host == '' || $config_mail_username == '' || $config_mail_password == '' || $config_mail_port == '') {
    array_push($error, 'All fields required');
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_mail_username', $config_mail_username, 'email');
    _options_push('config_mail_password', $config_mail_password, 'email');
    _options_push('config_mail_port', $config_mail_port, 'email');
    _options_push('config_mail_host', $config_mail_host, 'email');
    _options_push('config_mail', $config_mail, 'email');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=email&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







