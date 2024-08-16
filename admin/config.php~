<?php

$config_factux['version'] = 1;
$config_factux['url'] = "factuz.com";
$config_factux['email'] = "info@factuz.com";
// Zona horaria
date_default_timezone_set('Europe/Brussels');
define('DEBUG_LANG', false); // DEbugear el idioma
define('MAGIA_DEBUG', 0); // Debug sistema
define('ROOT_DIR', realpath(__DIR__ . '/..'));
define('WWW', ROOT_DIR . "/www");
define('WWW_E', ROOT_DIR . "/www_extended/$config_theme");
define('SHOP_PATH', WWW_E . "/shop");
define('PATH_SCAN_FILES', WWW . '/gallery/img/scan/');
// con la base de datos como folder
define('PATH_GALLERY', "www/gallery/");
define('PATH_GALLERY_IMG', PATH_GALLERY . "img/");
//define('PATH_GALLERY_IMG_SUBDOMAIN', PATH_GALLERY_IMG . '_' . _options_option('config_subdomain') . "/");//
define('PATH_GALLERY_IMG_SUBDOMAIN', PATH_GALLERY_IMG . '_' . $config_company_subdomain_name . "/"); //
// 
$accepted_file_extensions = array("txt", "gcode", "set"); // tipos de archivos aceptados que puede enviar desde al shop  
//
$accepted_file_weight = "5000";
// Lista de status a los que se puede cambiar una orden 
$status_allowed_to_change = array(
    0, // DRAF    
    -10, //canceled
    10, // Registred
    20, // Ready to scan
    30, // Ready to modeling
    40, // Ready to print
    60, // Ready to finition
        //  70 , // Ready to send (y libero el bac
// 100 , // Ready to bill
// 110 , // Is billing 
);
//
$config_start_year = 2020;

$shop_form_path_images = "";
//
$config_lang_default = (_options_option('config_print_default_lang')) ? _options_option('config_print_default_lang') : 'en_GB';
//        
$products_code_min_length = 3;
//
$config_company_name = contacts_field_id('name', 1022);
//
$config_company_tel = directory_by_contact_name(1022, 'Tel');
$config_company_url = directory_by_contact_name(1022, 'Web');
$config_company_email = directory_by_contact_name(1022, 'Email');
//
$config_company_logo = _options_option("config_company_logo");
$config_company_tva = contacts_field_id('tva', 1022);
//
$config_favicon = _options_option("config_favicon");
$config_company_email_secure = _options_option("config_company_email_secure");
//Email
$config_mail_username = _options_option("config_mail_username");
$config_mail_password = _options_option("config_mail_password");
$config_mail_host = _options_option("config_mail_host");
$config_mail_port = _options_option("config_mail_port");
$config_mail = _options_option("config_mail"); // si esta activo el envio de emails
//
// Cual es el rango max que se puede dar a los usuarios del shop
$config_rango_max_for_labo = _options_option("config_rango_max_for_labo");
// Prefijo de labo
$config_bac_prefix = _options_option("config_bac_prefix");
//
$config_orders_total_steps = _options_option("config_orders_total_steps");
// Cual es el porcentaje de descuentos MAX
// que se puede dar a un cliente?
$config_discounts_max_to_customer = _options_option("config_discounts_max_to_customer");
// Esto es la empresa secundaria 
$config_company_name2 = _options_option("config_company_name2");
$config_company_url2 = _options_option("config_company_url2");
