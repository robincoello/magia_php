<?php

if (!permissions_has_permission($u_rol, "addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null;
$ref = (isset($_POST['ref'])) ? clean($_POST['ref']) : null;
$city = (isset($_POST['city'])) ? clean($_POST['city']) : false;
$province = (isset($_POST['province'])) ? clean($_POST['province']) : null;
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null";
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 1;
$redirection = (isset($_POST['redirection'])) ? clean($_POST['redirection']) : false;
$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
$transport_ref = (isset($_POST['transport_ref'])) ? clean($_POST['transport_ref']) : false;
$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;

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
    array_push($error, 'Address already exists');
}


#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {


    addresses_edit(
            $id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status
    );

    ############################################################################
    $data = json_encode(array(
        $id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status
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
    $description = "Update addresses id [$id] new data [$data]";
    $doc_id = $id;
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
    // si hay sistema de transporte lo actualizamos sino lo agregamos 
    if (addresses_transport_search_by_addresses_id($id)) {

        addresses_transport_update($id, $transport_code, $transport_ref);

        ############################################################################
        $data = json_encode(array(
            $id, $transport_code
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
        $description = "Update to transport [$transport_code] addresse id [$id] ";
        $doc_id = $id;
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
    } else {

        // addresses_transport_add($id, $transport_code);
        ############################################################################
//        $data = json_encode(array(
//            $id, $transport_code
//        ));
//        $error = json_encode($error);
//        $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
//        $date = null;
//        //$u_id
//        //$u_rol , 
//        // $c = "contacts" ;
//        //$a = "Change order status" ;
//        $w = null;
//        // $txt
//        $description = "Add transport [$transport_code] to addresse id [$id] ";
//        $doc_id = $id;
//        $crud = "update";
//        //$error = null ;
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
    }


    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=details&id=$contact_id#1");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=addresses&id=$contact_id#2");
            break;

        default:
            header("Location: index.php?c=contacts#default");
            break;
    }
} else {

    include view("home", "pageError");
}


