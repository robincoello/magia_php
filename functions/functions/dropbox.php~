<?php

function dropbox_create_login_from_contact_id($contact_id) {
    global $config_company_domain_name;

// obtengo el nombre de la empresa 
    $name = contacts_field_id('name', $contact_id);

    // si no hay nombre, regreso falso
    if (!$name) {
        return false;
    }

    // hago un clean del nombre
    $name = clean($name);

    // pongo en minusculas 
    $name = strtolower($name);

    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    for ($i = 0; $i <= strlen($name); $i++) {
        if (strpos($allowed, $name[$i]) === false) {
            // si no hay, remplazo por espacio vacio para despues quitarlo 
            $name[$i] = ' ';
        }
    }

    // quito los espacios del nombre 
    $name = str_replace(' ', '', $name);

    // maximo 64 caracteres
    //echo substr('abcdef', 1, 3);  // bcd
    $username = substr($contact_id . "_" . $name, 0, 63);  // bcd

    $user = $username . "@" . $config_company_domain_name;

    return $user;
}
