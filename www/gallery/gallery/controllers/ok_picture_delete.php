<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file = (!empty($_REQUEST['filename']) ) ? $_REQUEST['filename'] : false;
$item = (!empty($_REQUEST['item'])) ? clean($_REQUEST['item']) : false;
$item_id = (!empty($_REQUEST['item_id'])) ? clean($_REQUEST['item_id']) : false;

$redi = (!empty($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;

$error = array();

################################################################################
################################################################################



if (!$error) {

    // path
//    $path = "www/gallery/img/_"._options_option('config_subdomain')."/";

    gallery_image_delete(PATH_GALLERY . "/$file");

    gallery_delete_by_name($file);

//    ############################################################################
//    $data = json_encode(array(
//        $fileNameToDB
//            ));
//    $error = json_encode($error);
//    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
//    $date = null;
//    //$u_id
//    //$u_rol , 
//    //$c = "orders" ;
//    //$a = "Change order status" ;
//    $w = null;
//    // $txt
//    $description = "Update logo [$data]";
//    $doc_id = $u_id;
//    $crud = "update";
//    //$error = null ;
//    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
//    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//    $ip4 = get_user_ip();
//    $ip6 = get_user_ip6();
//    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
//    logs_add(
//            $level, $date, $u_id, $u_rol, $c, $a, $w,
//            $description, $doc_id, $crud, $error,
//            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
//    );
//    ############################################################################     

    switch ($redi) {
        case 1:
            header("Location: index.php?c=$item&a=edit&id=$item_id");
            break;

        case 2:
            header("Location: index.php?c=gallery#2");
            break;

        case 3:
            header("Location: index.php?c=config&a=logo");
            break;

        case 4:
            header("Location: index.php?c=balance&a=details&id=$item_id");
            break;

        default:
            header("Location: index.php?c=gallery#default");
            break;
    }
} else {
    include view("home", "pageError");
    ############################################################################
    # DEbe ir al final qye que sino la vaiable $error se redefine###############
    ############################################################################
    $data = json_encode(
            $_REQUEST
    );
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Error: Update logo [$data]";
    $doc_id = $u_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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
}
