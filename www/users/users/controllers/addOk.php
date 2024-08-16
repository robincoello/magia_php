<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$rol = (isset($_POST['rol'])) ? clean($_POST['rol']) : false;
$login = (isset($_POST['login'])) ? clean($_POST['login']) : false;
$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : false;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 0;

$error = array();

if (!users_is_login($login)) {
    array_push($error, "Login error");
}
if (!users_is_password($password)) {
    array_push($error, "Password error");
}
if (!users_is_email($email)) {
    array_push($error, "Email error");
}
if (!users_is_status($status)) {
    array_push($error, "Status error");
}






/* * *************************************************************************** */
/* refactoring */
/* * *************************************************************************** */
$password = password_hash($password, PASSWORD_DEFAULT);

if (!$error) {
    users_add(
    //   $contact_id, $rol, $login, $password, $email, 0
    );

    header("Location: index.php?c=users");
}


array_push($error, "Datos incorrectos");

header("Location: index.php?c=users");
