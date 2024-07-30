<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : false;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : false;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : false;
$min = (isset($_POST["min"])) ? clean($_POST["min"]) : false;
$max = (isset($_POST["max"])) ? clean($_POST["max"]) : false;

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

////////////////////////////////////////////////////////////////////////////////
// REQUERIDO
if (!$r1 || !$r2 || $r3 || !$min | !$max) {
    array_push($error, 'All fields are required');
}
////////////////////////////////////////////////////////////////////////////////
// FORMAT
if ($r1 <= 0 || $r1 > 100) {
    array_push($error, "Values ​​must be between 1 and 100");
}
if ($r2 <= 0 || $r2 > 100) {
    array_push($error, "Values ​​must be between 1 and 100");
}
if ($r3 <= 0 || $r3 > 100) {
    array_push($error, "Values ​​must be between 1 and 100");
}
if ($min <= 0 || $max <= 0) {
    array_push($error, "Minimum and max must be greater than zero");
}
// fecha de expircion de la factura
// + 7 dias 
// r1
// + 7 dias 
// r2
// mas 7 dias 
// r3
$json_data = json_encode(array(
    // dias , %, min, max
    "r1" => array(7, 10, 25, 250),
    "r2" => array(7, 10, 25, 250),
    "r3" => array(7, 10, 25, 250),
        ));

////////////////////////////////////////////////////////////////////////////////
//  
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
################################################################################
################################################################################
################################################################################
if (!$error) {
    _options_push('config_invoices_reminders', $data, 'invoices');
} else {
    include view("home", "pageError");
}




