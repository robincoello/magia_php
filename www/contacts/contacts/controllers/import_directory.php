<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//https://www.jose-aguilar.com/blog/leer-archivo-csv-con-php/
//https://diego.com.es/lectura-de-archivos-en-php





include view("contacts", "import_directory");
