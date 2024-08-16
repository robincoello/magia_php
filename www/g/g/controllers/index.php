<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$txt = ( isset($_GET['txt']) && $_GET['txt'] != '' ) ? clean($_GET['txt']) : false;

include view('g', 'index');
