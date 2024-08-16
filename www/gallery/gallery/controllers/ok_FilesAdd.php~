<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$owner_id = $u_id;
$name = (!empty($_REQUEST['name']) && $_REQUEST['name'] != '' ) ? clean($_REQUEST['name']) : false;
$title = (!empty($_REQUEST['title']) && $_REQUEST['title'] != '' ) ? clean($_REQUEST['title']) : "";
$description = (!empty($_REQUEST['description']) && $_REQUEST['description'] != '' ) ? clean($_REQUEST['description']) : "";
$alt = (!empty($_REQUEST['alt']) && $_REQUEST['alt'] != '' ) ? clean($_REQUEST['alt']) : "";
$url = (!empty($_REQUEST['url']) && $_REQUEST['url'] != '' ) ? clean($_REQUEST['url']) : "";
$title = (!empty($_REQUEST['title']) && $_REQUEST['title'] != '' ) ? clean($_REQUEST['title']) : "";
$date_registre = null;

$file = $_FILES['fileToSend'];

$error = array();
################################################################################
// Esto envia el archivo al servidor, 
//$sendfile = new fileUpdate($file) ;
$sendfile = new Gallery($file);

//$res = $sendfile->sendFile($newFileName) ;
$res = $sendfile->sendFileNotChangeName();

$fileBameToDB = $sendfile->get_formatedName();

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

#################################################################################
#################################################################################
#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {

    gallery_add(
            $owner_id, $fileBameToDB, $title, $description, $alt, $url, $date_registre, 1, 1
    );

    header("Location: index.php?c=gallery");
}

include view("home", "pageError");
