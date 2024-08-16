<?php

//include view("home", "action_disabled");  
if (!permissions_has_permission($u_rol, "addresses", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null;
$ref = (isset($_POST['ref'])) ? clean($_POST['ref']) : null;
$city = (isset($_POST['city'])) ? clean($_POST['city']) : '';
$province = (isset($_POST['province'])) ? clean($_POST['province']) : null;
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null";
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 1;
//$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;

$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
$transport_ref = (isset($_POST['transport_ref']) && $_POST['transport_ref'] != '' ) ? clean($_POST['transport_ref']) : null;
$invoice_id = (isset($_POST['invoice_id'])) ? clean($_POST['invoice_id']) : false;

$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;

$code = magia_uniqid();
$error = array();

################################################################################
# Format
//        $contact_id = addresses_format();
$name = addresses_format("name", $name);
$address = addresses_format('address', $address);
$number = addresses_format('number', $number);
$postcode = addresses_format('postcode', $postcode);
$barrio = addresses_format('barrio', $barrio);
$ref = addresses_format('ref', $ref);
$city = addresses_format('city', $city);
$province = addresses_format('province', $province);
$region = addresses_format('region', $region);
$country = addresses_format('country', $country);
//$code = addresses_format('code', $code);
//$status = addresses_format('status', $status);
# ##############################################################################
# requeridos
################################################################################
if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}
if (!$name) {
    array_push($error, "name is mandatory");
}
if (!$number) {
    array_push($error, "number is mandatory");
}
if (!$address) {
    array_push($error, "address is mandatory");
}
################################################################################
// busca si presente 
if (addresses_search_if_exist($contact_id, $name, $number, $address, $postcode, $country)) {
    array_push($error, 'address already exists');
}

if (!($transport_ref === null) && addresses_transport_search_by_transport_code_transport_ref($transport_code, $transport_ref)) {
    array_push($error, "This reference for this transport already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    addresses_add(
            $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status
    );

    $addresses_id = addresses_field_code("id", $code);

    if ($transport_code) {
        addresses_transport_add($addresses_id, $transport_code, $transport_ref);
    }



    ############################################################################
    $data = json_encode(array(
        $addresses_id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Add addresses id [$addresses_id] [$data]";
    $doc_id = $addresses_id;
    $crud = "create";
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
        case 1: // viene de una solicitud de agregar una address desde un invoice
//
//            // saco la direccion de facturacion de este contacto 
//            $actual_address_billing = (addresses_billing_by_contact_id($contact_id)); 
//            $actual_address_billing_json = json_encode($actual_address_billing); 
//            
//            // si hay direccion de facturacion 
//            // la pongo coom direccion de delivery 
//            // y pongo esta nueva direccion coo direccion de facturacion
//            // actualizo la factura con la nueva direccion de facturacion 
//           
//            if($new_address_billing_json){   
//            }
//            invoices_update_billing_address($invoice_id, $new_address_billing_json);                         
//            
            header("Location: index.php?c=invoices&a=edit&id=$invoice_id");
            break;

        case 2: // Viene de contactos y regresa a contactos           
            header("Location: index.php?c=contacts&a=addresses&id=$contact_id");
            break;

        default:
            header("Location: index.php?c=contacts&a=addresses&id=$contact_id");
            break;
    }
} else {

    include view("home", "pageError");
}






