<?php

if (!permissions_has_permission($u_rol, "addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$address_id = (!empty($_POST['address_id'])) ? intval(clean($_POST['address_id'])) : false;
$id = (!empty($_POST['id'])) ? intval(clean($_POST['id'])) : false;
$redi = (!empty($_POST['redi'])) ? intval(clean($_POST['redi'])) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$address_id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($address_id)) {
    array_push($error, "Id format error");
}
if (!addresses_field_id('id', $address_id)) {
    array_push($error, 'Address does not exist');
}

// Esta direecion debe pertenecer a la oficina que esta entre las oficinas de esta empresa
$office_id = addresses_field_id('contact_id', $address_id);

//// si la sede de la oficina es diferente a la empresa donde trabajo, 
//// error 
//if (offices_headoffice_of_office($office_id) !== contacts_work_for($u_id)) {
//    array_push($error, 'Address does not belong to you');
//}
//// puede editar otras direcciones?
//if (!users_can_update_others_offices($u_id)) {
//    array_push($error, "You can not update others offices");
//}
//// puede editar otras direcciones?
//if (addresses_field_id('name', $address_id) == 'Billing') {
//    array_push($error, 'You cannot block a billing address');
//}
//vardump($office_id);
//vardump($office_id);
//die(); 
################################################################################
# proceso
# if name, lastname an bd is not change, yes you can edit title
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    addresses_unblock($address_id, $office_id);

    ############################################################################
    $data = json_encode(array(
        $address_id, $office_id
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
    $description = "Addresses unblock id [$id] data [$data]";
    $doc_id = $address_id;
    $crud = "update";
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
            header("Location: index.php?c=contacts&a=addresses&id=$id");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {


    include view("home", "pageError");
}




