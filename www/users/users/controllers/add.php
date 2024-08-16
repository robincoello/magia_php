<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$action = (isset($_POST['action'])) ? clean($_POST['action']) : false;

//$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$title = (isset($_POST['title'])) ? clean($_POST['title']) : false;
$birthdate = (isset($_POST['birthdate'])) ? clean($_POST['birthdate']) : false;
$login = (isset($_POST['login'])) ? clean($_POST['login']) : false;
$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : false;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;

$error = array();
//if (!isset($id)) {array_push($error, "Id error");}
if (!users_is_name(($name))) {
    array_push($error, "Name error");
}
if (!users_is_lastname($lastname)) {
    array_push($error, "Lastname error");
}
if (!users_is_address($address)) {
    array_push($error, "Address error");
}
if (!users_is_postcode($postcode)) {
    array_push($error, "Postcode error");
}
if (!users_is_title($title)) {
    array_push($error, "Title error");
}
if (!users_is_birthdate($birthdate)) {
    array_push($error, "Birthdate error");
}
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

//echo var_dump($_POST); 

if ($action == "add") {
    if (!$error) {
        users_add(
        //    $name, $lastname, $address, $postcode, $title, $birthdate, $login, $password, $email, $status
        );

        header("Location: index.php?c=users");
    }
}

echo "no es posible";
// header("Location: index.php?c=contacts");
   //include "www/users/views/add.php";
   