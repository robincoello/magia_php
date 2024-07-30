<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



include view("home", "disabled");
die();

$action = (isset($_REQUEST['action'])) ? clean($_REQUEST['action']) : false;
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

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

if (!is_numeric($id)) {
    array_push($error, "Id is mandatory");
}
if (!isset($name)) {
    array_push($error, "Name is mandatory");
}
if (!isset($lastname)) {
    array_push($error, "Lastname is mandatory");
}
if (!isset($address)) {
    array_push($error, "Address is mandatory");
}
if (!isset($postcode)) {
    array_push($error, "Postcode is mandatory");
}
if (!isset($title)) {
    array_push($error, "Title is mandatory");
}
if (!isset($birthdate)) {
    array_push($error, "Birthdate is mandatory");
}
if (!isset($login)) {
    array_push($error, "Login is mandatory");
}
if (!isset($password)) {
    array_push($error, "Password is mandatory");
}
if (!isset($email)) {
    array_push($error, "Email is mandatory");
}
if (!isset($status)) {
    array_push($error, "Status is mandatory");
}



if ($action == "edit") {
    if (!$error) {
        users_edit(
                $id, $name, $lastname, $address, $postcode, $title, $birthdate, $login, $password, $email, $status
        );

        //header("Location: index.php?c=users_list");
    } else {
        foreach ($error as $key => $value) {
            echo "<h2>$key - $value</h2>";
        }
    }
}



$detail_user = affiche_detail_user($id);

if (permissions_permission($c, $u_rol)) {


    //include "view/users_edit.php";
} else {

    echo "El rol de $u_rol en el controlador: $c No tiene permiso";
}



