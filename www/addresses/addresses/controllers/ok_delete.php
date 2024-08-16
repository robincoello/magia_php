<?php

if (!permissions_has_permission($u_rol, "addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$address_id = (isset($_POST['address_id'])) ? clean($_POST['address_id']) : false;
$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;

$error = array();

################################################################################
// Requeridos
// Formato 
// condicion
// busqueda 
//
if (!$address_id) {
    array_push($error, '$address_id is mandatory');
}
if (!$id) {
    array_push($error, '$id is mandatory');
}
if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}

################################################################################ 

if (!$error) {


    // borro el transporte de esta direccion
    addresses_transport_delete_by_addresses_id($address_id);

    // borro la direccion 
    addresses_delete($address_id);

    ############################################################################
    $data = json_encode(array(
        $address_id
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "addresses";
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Addresses delete id [$id] data [$data]";
    $doc_id = $address_id;
    $crud = "delete";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 




    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=details&id=$contact_id#1");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=addresses&id=$id#2");
            break;

        default:
            header("Location: index.php?c=contacts#default");
            break;
    }
} else {






    include view("home", "pageError");
}


