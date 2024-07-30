<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$pass = (isset($_POST["pass"])) ? clean($_POST["pass"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
if ($pass == '' || $pass == null || $pass == false) {
    array_push($error, "Pass is mandatory");
}
################################################################################
if ($pass != 'robinson') {
    array_push($error, 'Reset password incorrect');
}
################################################################################
if (!$error) {

    $company = new Company();
    $company->setCompany(1022);

//    $root_password = '$2y$10$TzTicWYfk1ufQCodIRsXF.oNRjCN.3wcVIn5AQfNkGNyoczOoHOLa'; // Phlpd0211077                              
    $root_password = '$2y$10$LTC8bix7/5/OmCn/NwLdFODqEidyAXMH6pFKbHxa9vd4xtsz5YD7q';  //   R081n50n@1077@                           

    $reset = "
SET FOREIGN_KEY_CHECKS=0;        
TRUNCATE `addresses`;
TRUNCATE `addresses_transport`;
TRUNCATE `agenda`;
-- TRUNCATE `agenda_categories`;
TRUNCATE `agenda_comments`;
TRUNCATE `agenda_organizers`;
TRUNCATE `agenda_places_dates`;
TRUNCATE `agenda_price`;
TRUNCATE `agenda_public`;
-- TRUNCATE `agenda_status`;
TRUNCATE `agenda_translations`;
TRUNCATE `api`;
-- TRUNCATE `bacs`;
TRUNCATE `balance`;
TRUNCATE `banks`;
TRUNCATE `banks_lines`;
-- TRUNCATE `banks_lines_status`;
TRUNCATE `banks_lines_tmp`;
-- TRUNCATE `banks_templates`;
TRUNCATE `blog`;
TRUNCATE `budgets`;
TRUNCATE `budgets_invoices`;
TRUNCATE `budget_lines`;
-- TRUNCATE `budget_status`;
TRUNCATE `calendar`;
-- TRUNCATE `calendar_categories`;
TRUNCATE `calendar_contacts`;
TRUNCATE `calendar_dates`;
-- TRUNCATE `calendar_status`;
TRUNCATE `campos`;
TRUNCATE `chat`;
TRUNCATE `clients`;
TRUNCATE `comments`;
TRUNCATE `comments_files`;
TRUNCATE `comments_folders`;
TRUNCATE `comments_read`;
TRUNCATE `comment_folder`;
TRUNCATE `constitution`;
TRUNCATE `contacts`;
TRUNCATE `contacts_photos`;
TRUNCATE `contacts_positions`;
-- TRUNCATE `contacts_titles`;
-- TRUNCATE `controllers`;
TRUNCATE `coops`;
TRUNCATE `couleurs`;
-- TRUNCATE `countries`;
-- TRUNCATE `country_provinces`;
-- TRUNCATE `country_tax`;
TRUNCATE `cpanel`;
TRUNCATE `creditos`;
TRUNCATE `credit_notes`;
TRUNCATE `credit_notes_counter`;
-- TRUNCATE `credit_notes_status`;
TRUNCATE `credit_note_lines`;
TRUNCATE `depositos`;
TRUNCATE `depositos_beneficios`;
TRUNCATE `depositos_condiciones`;
TRUNCATE `diametre`;
TRUNCATE `directory`;
-- TRUNCATE `directory_names`;
-- TRUNCATE `discounts_mode`;
TRUNCATE `docs_comments`;
TRUNCATE `docs_exchange`;
TRUNCATE `docu`;
TRUNCATE `docu_blocs`;
TRUNCATE `docu_images`;
-- TRUNCATE `doc_docs`;
-- TRUNCATE `doc_elements`;
-- TRUNCATE `doc_models`;
-- TRUNCATE `doc_models_lines`;
-- TRUNCATE `doc_sections`;
TRUNCATE `doc_tags`;
TRUNCATE `driver_licenses`;
TRUNCATE `drives`;
TRUNCATE `earprints`;
TRUNCATE `earprint_orders`;
TRUNCATE `ecouteurs`;
TRUNCATE `emails`;
TRUNCATE `emails_folders`;
-- TRUNCATE `emails_status`;
TRUNCATE `emails_tmp`;
TRUNCATE `employees`;
TRUNCATE `events`;
TRUNCATE `expenses`;
-- TRUNCATE `expenses_categories`;
TRUNCATE `expenses_frecuencies`;
TRUNCATE `expenses_lines`;
TRUNCATE `expenses_references`;
-- TRUNCATE `expenses_status`;
TRUNCATE `extractos`;
TRUNCATE `formes`;
TRUNCATE `gallery`;
TRUNCATE `glosario`;
TRUNCATE `holidays`;
-- TRUNCATE `icons`;
TRUNCATE `insurers`;
TRUNCATE `investments`;
TRUNCATE `investment_lines`;
TRUNCATE `invoices`;
TRUNCATE `invoices_counter`;
TRUNCATE `invoice_lines`;
-- TRUNCATE `invoice_status`;
TRUNCATE `logs`;
TRUNCATE `longueurs`;
TRUNCATE `machines3d`;
TRUNCATE `magia`;
TRUNCATE `marques`;
TRUNCATE `materials`;
TRUNCATE `messages`;
TRUNCATE `mesure_snr`;
TRUNCATE `modelers`;
TRUNCATE `modeles`;
-- TRUNCATE `modules`;
TRUNCATE `options`;
TRUNCATE `options_options`;
TRUNCATE `orders`;
TRUNCATE `orders_budgets`;
TRUNCATE `orders_files`;
TRUNCATE `orders_files_comments`;
TRUNCATE `orders_lines`;
TRUNCATE `orders_remake`;
TRUNCATE `orders_status`;
TRUNCATE `orders_vias`;
-- TRUNCATE `panels`;
TRUNCATE `patients`;
-- TRUNCATE `permissions`;
TRUNCATE `perte_auditive`;
TRUNCATE `pilas`;
TRUNCATE `pila_lines`;
TRUNCATE `print3d`;
TRUNCATE `products`;
-- TRUNCATE `products_categories`;
TRUNCATE `products_extras`;
TRUNCATE `products_groups`;
TRUNCATE `products_origin`;
TRUNCATE `products_pictures`;
TRUNCATE `products_presentation`;
TRUNCATE `products_presentation_names`;
TRUNCATE `products_price`;
TRUNCATE `products_providers`;
TRUNCATE `products_related`;
TRUNCATE `products_stock`;
TRUNCATE `projects`;
TRUNCATE `projects_inout`;
TRUNCATE `property`;
TRUNCATE `property_ads`;
TRUNCATE `property_availabilities`;
TRUNCATE `property_building_condition`;
TRUNCATE `property_exterior`;
TRUNCATE `property_extra_information`;
TRUNCATE `property_fixtures`;
TRUNCATE `property_general`;
TRUNCATE `property_interior`;
TRUNCATE `property_internal_fixtures`;
TRUNCATE `property_kitchen_setup`;
TRUNCATE `property_orientation`;
TRUNCATE `property_pictures`;
TRUNCATE `property_price`;
TRUNCATE `property_rooms`;
TRUNCATE `property_rooms_types`;
TRUNCATE `property_subtypes`;
TRUNCATE `property_transaction_type`;
TRUNCATE `property_type`;
TRUNCATE `property_web`;
TRUNCATE `providers`;
TRUNCATE `remake_motifs`;
TRUNCATE `reminders_invoices`;
TRUNCATE `resins`;
-- TRUNCATE `rols`;
TRUNCATE `rols_status`;
TRUNCATE `ropas`;
TRUNCATE `schedule`;
TRUNCATE `services`;
-- TRUNCATE `services_categories`;
TRUNCATE `services_price`;
TRUNCATE `services_unites`;
TRUNCATE `sorting_items`;
TRUNCATE `subdomains`;
TRUNCATE `subdomains_features`;
TRUNCATE `subdomains_plan`;
TRUNCATE `subdomains_plan_features`;
TRUNCATE `tasks`;
-- TRUNCATE `tasks_categories`;
TRUNCATE `tasks_contacts`;
-- TRUNCATE `tasks_status`;
-- TRUNCATE `tax`;
TRUNCATE `transport`;
TRUNCATE `types`;
TRUNCATE `updates`;
TRUNCATE `users`;
TRUNCATE `users_ask_pass`;
TRUNCATE `user_options`;
TRUNCATE `vehicles`;
TRUNCATE `vehicles_fuel`;
TRUNCATE `vehicles_fuels`;
TRUNCATE `vehicles_traffic_ticket`;
TRUNCATE `vehicle_activity`;
TRUNCATE `vehicle_insurance`;
TRUNCATE `vehicle_plates`;
TRUNCATE `yellow_pages`;
TRUNCATE `_aa`;
TRUNCATE `_aa_actions`;
TRUNCATE `_aa_conditions`;
-- TRUNCATE `_content`;
TRUNCATE `_diccionario`;
TRUNCATE `_event_diametre`;
-- TRUNCATE `_languages`;
-- TRUNCATE `_menus`;
TRUNCATE `_modeles_mesures`;
-- TRUNCATE `_options`;
TRUNCATE `_options_options`;
TRUNCATE `_tmf_material`;
TRUNCATE `_tmf_materials_colours`;
TRUNCATE `_tmf_materials_options`;
-- TRUNCATE `_translations`;
TRUNCATE `_types_constitution`;
TRUNCATE `_types_marques`;
TRUNCATE `_types_marques_ecouteur`;
TRUNCATE `_types_modeles_formes`;
TRUNCATE `_type_event`;
TRUNCATE `_type_longuer_conduit`;
TRUNCATE `_type_perte_auditive`;
SET FOREIGN_KEY_CHECKS=1;

-- Add company
INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`) VALUES ('1022', NULL, 1, NULL, 'Company ABC', NULL, NULL, '0123456789', NULL, NULL, '0123456789', 'en_GB', '1', '1') ; 
-- add owner to company
UPDATE `contacts` SET `owner_id` = '1022' WHERE `contacts`.`id` = 1022 ; 
-- add root like contact
INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`) VALUES (2475, '1022', NULL, NULL, 'R.', 'C.', NULL, NULL, NULL, NULL, 'root', 'en_GB', '1', '1') ; 

-- add root email
INSERT INTO `directory` (`id`, `contact_id`, `address_id`, `name`, `data`, `code`, `order_by`, `status`) VALUES (NULL, '2475', NULL, 'Email', 'robincoello@hotmail.com', 'robincoello@hotmail.com', '1', '1') ; 

-- add user root

INSERT INTO `users` (`id`, `contact_id`, `language`, `rol`, `login`, `password`, `email`, `code`, `status`) VALUES (   1,  2475, 'en_GB', 'root', 'root',   '$root_password', 'robincoello@hotmail.com', NULL, 1); 


ALTER TABLE `contacts` AUTO_INCREMENT=60000;

-- 40919




";

    config_reset_db($reset);

    switch ($redi) {
        case 1:
            header("Location: index.php?c=config&a=reset&sms=Updated");
            break;

        default:
            header("Location: index.php?c=config&a=reset&sms=Updated");
            break;
    }
} else {

    include view('home', 'pageError');
}







