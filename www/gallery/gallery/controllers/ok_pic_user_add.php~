<?php

/**
 * Para subir la foto de usuario el mismo
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (!empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
//$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
//$title = (!empty($_POST['title'])) ? clean($_POST['title']) : false;
//$description = (!empty($_POST['description'])) ? clean($_POST['description']) : false;
//$alt = (!empty($_POST['alt'])) ? clean($_POST['alt']) : false;
//$url = (!empty($_POST['url'])) ? clean($_POST['url']) : false;

$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;

$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

//$status = 1;

$error = array();

// new name 
// companymane.ext 
################################################################################
################################################################################
// Esto envia el archivo al servidor, 
//$sendfile = new fileUpdate($file) ;

$sendfile = new Gallery($file);
// lista de archivos aceptados
$sendfile->_set_ext_acepted(array(
    "image/jpeg",
    "image/jpg",
    "image/webp",
    "image/png"
));
// donde se debe enviar el archivo? 
// con el / al final 
$sendfile->_set_path("www/gallery/img/_" . $config_db . "/users/");
// renombramos el archivo con el nombre de la emprea y un damdom 
// 
// 
// 
// 
$newFileName = $contact_id . date("YmdGis");
//
$res = $sendfile->sendFile($newFileName);
// registramos esto en la base de datos 
$fileNameToDB = $sendfile->get_formatedName();
// recoje los errores al enviar el archovo al servidor 

if ($sendfile->get_Error()) {
    foreach ($sendfile->get_Error() as $key => $value) {
        array_push($error, $value);
    }
}

// Si no hay el archivo en el servidor
if (!$sendfile->checkDownloadCorrectly()) {
    array_push($error, "There was an error sending the file to the server, please send it by email");
}



################################################################################
################################################################################
################################################################################
if (!$error) {


    // Actualizo en la base de datos 
    user_options_push_data($contact_id, 'contacts_picture', $fileNameToDB);

    ############################################################################
    $data = json_encode(array(
        $fileNameToDB
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Update pic [$data]";
    $doc_id = $u_id;
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
            header("Location: index.php?c=my_info");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=details&id=$contact_id");
            break;

        default:
            header("Location: index.php?c=my_info");
            break;
    }
} else {

    include view("home", "pageError");

    ############################################################################
    # DEbe ir al final qye que sino la vaiable $error se redefine###############
    ############################################################################
    $data = json_encode(
            $_POST
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
}


