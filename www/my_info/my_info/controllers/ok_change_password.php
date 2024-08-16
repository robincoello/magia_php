<?php

if (!permissions_has_permission($u_rol, "my_info", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
//$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false ;
$contact_id = $u_id;
$ap = (isset($_REQUEST['ap'])) ? clean($_REQUEST['ap']) : false;
$np = (isset($_REQUEST['np'])) ? ($_REQUEST['np']) : false;
$rp = (isset($_REQUEST['rp'])) ? ($_REQUEST['rp']) : false;

$error = array();

if (!($contact_id)) {
    array_push($error, '$contact_id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($contact_id)) {
    array_push($error, '$contact_id format incorrect');
}

if (!$np) {
    array_push($error, "New Password dont send");
}
if (!$rp) {
    array_push($error, "Repete Password dont send");
}

//if ( rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol" , $contact_id)) ) {
//    array_push($error , "You cannot change the password of a user with a higher rank") ;
//}


if (!password_verify($ap, users_password())) {
    array_push($error, "Actual Password incorrect");
}



if ($np != $rp) {
    array_push($error, "Password not the same");
}



$isError = passwordIsGood($np);

if ($isError) {
    foreach ($isError as $key => $value) {
        array_push($error, $value);
    }
}



################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
$password = password_hash($np, PASSWORD_DEFAULT);

################################################################################
# proceso
################################################################################

if (!$error) {

    contacts_password_update($contact_id, $password);

    logout();

    //http://localhost/jiho_23/index.php?c=home&a=logout

    header("Location: index.php");
} else {

    include view("home", "pageError");
}
