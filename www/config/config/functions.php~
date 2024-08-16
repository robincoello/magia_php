<?php

function config_print_lang() {

    $lang = (contacts_language(contacts_headoffice_of_contact_id(invoices_field_id('client_id', $id))));

    return $lang;
}

// define el idioma por fecto del sistema 
// primero busca en las opciones
// despues ve si solo hay un idioma activo lo coje 

function config_system_lang_default() {
    $lang = _options_option('config_system_lang_default');
    return isset($lang) ? $lang : null;
}

function config_system_lang_debug() {
    $lang = _options_option('config_system_lang_debug');
    return isset($lang) ? $lang : null;
}

function config_system_country() {
    global $config_system_country;
//    $country = _options_option('config_system_lang_default');
    $country = $config_system_country;
    return isset($country) ? $country : null;
}

function config_reset_db($sql_lines) {
    global $db;

    $req = $db->prepare($sql_lines);
    $req->execute(array());

    return 1;
}
