<?php

$action = (isset($_POST['action'])) ? clean($_POST['action']) : false;

$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$title = (isset($_POST['title'])) ? clean($_POST['title']) : false;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$d = (isset($_POST['d'])) ? clean($_POST['d']) : false;
$m = (isset($_POST['m'])) ? clean($_POST['m']) : false;
$y = (isset($_POST['y'])) ? clean($_POST['y']) : false;
$birthdate = "$y-$m-$d";
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$login = (isset($_POST['login'])) ? clean($_POST['login']) : false;
$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : false;
$password = password_hash($password, PASSWORD_DEFAULT);

$error = array();

if (!($lastname)) {
    array_push($error, "Lastname not send ");
}
if (!($name)) {
    array_push($error, "Name not send ");
}
if (!($title)) {
    array_push($error, "Title not send ");
}
if (!($address)) {
    array_push($error, "Address not send ");
}
if (!($postcode)) {
    array_push($error, "Postcode not send ");
}
if (!($birthdate)) {
    array_push($error, "Birthdate not send ");
}
if (!($email)) {
    array_push($error, "Email not send ");
}
if (!($login)) {
    array_push($error, "Login not send ");
}
if (!($password)) {
    array_push($error, "Password not send ");
}

###############################################################################
if (!is_lastname($lastname)) {
    array_push($error, "Lastname format error ");
}
if (!is_name($name)) {
    array_push($error, "Name format error ");
}

if (!is_address($address)) {
    array_push($error, "Address format error ");
}
if (!is_postalcode($postcode)) {
    array_push($error, "Postcode format error ");
}
if (!is_email($email)) {
    array_push($error, "Email format error ");
}
if (!is_login($login)) {
    array_push($error, "Login format error ");
}

if (!is_password($password)) {
    array_push($error, "Password format error ");
}
################################################################################
// veriico si existes
if (users_according_login($login)) {
    array_push($error, "Login exist");
}



if (!$error && $action == "registre") {


    add_user(
            $title, $name, $lastname, $address, $postcode, $birthdate, $login, $email, $password, 'user'
    );

    if (users_according_login($login)) {
        _t("ok registrado");
        _t("Please login here");
        include 'view/registrationOK.php';
    } else {
        echo "error";
        echo "<pre>";
        echo var_dump($_POST);
        echo "</pre>";
    }

    // header("Location: ../controller/article_list.php");
}


include 'www/users/views/registration.php';

