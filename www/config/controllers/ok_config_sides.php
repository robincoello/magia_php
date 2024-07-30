<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$config_c = (isset($_POST["config_c"])) ? clean($_POST["config_c"]) : 'null';
$config_a = (isset($_POST["config_a"])) ? clean($_POST["config_a"]) : 'null';
$config_side = (isset($_POST["config_side"])) ? clean($_POST["config_side"]) : 'null';
$config_controller = (isset($_POST["config_controller"])) ? clean($_POST["config_controller"]) : 'null';
$config_view = (isset($_POST["config_view"])) ? clean($_POST["config_view"]) : 'null';
//
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$data = array();
$error = array();

$data['c'] = $config_c;
$data['a'] = $config_a;
$data['side']['l'] = [];
$data['side']['r'] = [];
$data['side']['l']['controller'] = $config_controller;
$data['side']['l']['view'] = $config_view;

$json = '{"c":"subdomains","a":"add","side":{"l":{"controller":"_aa","view":"izq"}}}';
vardump(json_decode($json, true));

$data = json_encode($data);

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_side_' . $config_c . '_' . $config_a . '', $data, $config_c);

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts");
            break;
        case 2:
            header("Location: index.php?c=$config_c&a=$config_a");
            break;

        default:
            header("Location: index.php?c=config&a=contacts_pics_in_search&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}







