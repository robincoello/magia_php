<?php

/**
 * Cambia de clave del usuario 
 */
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$code = (isset($_POST['code'])) ? clean($_POST['code']) : false;
$npassword = (isset($_POST['npassword'])) ? clean($_POST['npassword']) : false;
$rpassword = (isset($_POST['rpassword'])) ? clean($_POST['rpassword']) : false;

$contact_id = users_contact_id_according_email($email);

$error = array();

// Verifica si el email fue enviado
if (!$email) {
    array_push($error, "Email dont send");
}
// Verifica si lo eviado es un email 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}
//// verifica si el email esta ya en el sistema, 
//if (users_according_email($email)) {
//   // array_push($error, "Email error");
//}

if (!$npassword || !$rpassword) {
    array_push($error, "Password dont send");
}

if ($npassword == "" || $rpassword == "") {
    array_push($error, "Password is empty");
}

if (strlen($npassword) < 8 || strlen($rpassword) < 8) {
    array_push($error, "The password must be 8 characters or more ");
}


if ($npassword !== $rpassword) {
    array_push($error, "the password are not the same");
}

if (!users_ask_pass_check_code($contact_id, $code)) {
    array_push($error, "Code or email error");
}
// si es mas de 10 minutos, 
if (users_ask_pass_check_time($contact_id, $code) >= 10) {
    array_push($error, "The time you can make this change is over");
}

// codificamos la clave
$password = password_hash($npassword, PASSWORD_DEFAULT);

## Si no hay error, se procede 
## Si no hay error, se procede 
## Si no hay error, se procede 
## Si no hay error, se procede 
## Si no hay error, se procede 
## Si no hay error, se procede 

if (!$error) {

    // Actualizamos la clave   
    users_update_password($contact_id, $password);

    // cambiamos el status del pedido de cambio de clave
    users_ask_pass_change_status($code, 1);

    header("Location: index.php");
}



include view("home", "pageError");

