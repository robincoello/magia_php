<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $panels = new Panels();
    $panels->setPanels($id);

    include view("panels", "export_json");
} else {
    include view("home", "pageError");
}    
