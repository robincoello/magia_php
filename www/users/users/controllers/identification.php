<?php

$login = (isset($_POST['login'])) ? clean($_POST['login']) : false;
$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : false;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : false;

$error = array();

################################################################################
// si envia login 
if (!$login) {
    array_push($error, "Login dont send");
}

// Verifica si lo eviado es un email 
//if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
//    // array_push($error, "Login format error");
//}
// si envia password
if (!$password) {
    array_push($error, "Password dont send");
}
################################################################################
//if (!is_login($login)) {
//    //  array_push($error , "Login format is not correct") ;
//}

if (!users_id_according_login($login)) {
    array_push($error, "Login or password error");
}


if (!$error) {
// si usuario no esta bloqueado
// $password   = password_hash($password, PASSWORD_DEFAULT);
// Si el usuario espera aprobacion, igual puede entrar 
// 
//    if (users_field_id('status', users_id_according_login($login)) == 0) {
//        array_push($error, "User awaiting approval");
//    }

    if (users_field_id('status', users_id_according_login($login)) == -1) {
        array_push($error, "User blocked");
    }
}

################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {



    if (verifi_login_password($login, $password)) {

        //users_update_language($_SESSION['u_id'] , $language) ;
        ############################################################################
        ############################################################################
        ############################################################################
//        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
//        $date = null;
//        $u_id = $_SESSION['u_id'];
//        $u_rol = $_SESSION['u_rol'];
//        //$c = "users"; 
//        //$a = "identification"; 
//        $w = null;
//        $description = "Login ok";
//        $doc_id = null;
//        $crud = null;
//        $error = ($error) ? json_encode($error) : null;
//        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
//        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
//        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//        $ip4 = get_user_ip();
//        $ip6 = get_user_ip6();
//        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
//        logs_add(
//                $level, $date, $u_id, $u_rol, $c, $a, $w,
//                $description, $doc_id, $crud, $error,
//                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
//        );
        ############################################################################
        ############################################################################
        ############################################################################




        header('location: index.php?c=home&a=wellcome#1');
        //
    } else {

        array_push($error, "Login or password error");

        include view("home", "pageError");
    }
} else {

    include view("home", "pageError");

    // pongo despues para que no se vea los demas items del array error al publico 

//    array_push($error, "Login: $login pass : $password");
//    $level = 1;
//    // si usan root como login, se manda un error atencion 
//    if ($login == "root") {
//        $level = 5;
//    } else {
//        $level = 2;
//    }
//
//    ############################################################################
//    ############################################################################
//    ############################################################################
//    $level = $level; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
//    $date = null;
//    $u_id = null;
//    $u_rol = null;
//    $c = "users";
//    $a = "identification";
//    $w = null;
//    $description = "Login ERROR";
//    $doc_id = null;
//    $crud = null;
//    $error = ($error) ? json_encode($error) : null;
//    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
//    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
//    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//    $ip4 = get_user_ip();
//    $ip6 = get_user_ip6();
//    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
//    logs_add(
//            $level, $date, $u_id, $u_rol, $c, $a, $w,
//            $description, $doc_id, $crud, $error,
//            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
//    );
    ############################################################################
    ############################################################################
    ############################################################################
}