<?php

class Company extends Contacts {

    //  public $_id;
    public $_logo64;
    public $_tva;
    public $_why_can_not_edit_tva = array();
    public $_discounts;
    public $_is_head_office = false;
    public $_employees = array();
    public $_export;
    public $_error_add;
    public $_error_subdomain = array();
    public $_subdomain_data = array();
    public $_is_in_cloud = false;
    public $_why_can_not_add_to_cloud = array();
    public $_why_can_not_add_a_subdomain = array();
    public $_why_can_not_be_approved = array();

    //

    function f__construct() {
        
    }

    function setCompany($id) {

        $this->_id = contacts_field_id('id', $id);
        $this->_name = contacts_field_id('name', $id);
        $this->_type = contacts_field_id('type', $id);
        $this->_tva = contacts_field_id('tva', $id);
        $this->_language = contacts_field_id('language', $id);
        $this->_discounts = contacts_field_id('discounts', $id);
        $this->_owner_id = contacts_field_id('owner_id', $id);
        $this->_status = contacts_field_id('status', $id);
        $this->_addresses['Billing'] = null;
        $this->_addresses['Delivery'] = null;

        if ($this->_tva && ($this->_id == $this->_owner_id)) {
            $this->setIs_head_office(true);
        }
        //    
        foreach (cloud_employees_list_by_company($id) as $key => $emp) {
            $e = new Employees();
            $e->setEmployee($id, $emp['contact_id']);
            // agrego los empleados
            array_push($this->_employees, $e);
        }
        //
        $this->setBanks($id);
        $this->setAddresses($id);
        $this->setDirectory($id);

//        $this->setIs_in_cloud(); // sta registrada en el cloud?
//        $this->setWhy_can_not_be_approved(); // para cuando se registra una empresa
//        $this->setWhy_can_not_edit_tva(); // Una empresa puede o no modifcar su tva?
// pongo en /controller/suddomain
//       $this->setSubdomain(); 
//        $this->setError_subdomain();
//        $this->setWhy_can_not_add_to_cloud();
//pongo detro de setSubdomain();
//        $this->setWhy_can_not_add_a_subdomain(); // cpanel 
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // SET 
    ////////////////////////////////////////////////////////////////////////////
    function setTva($new_tva) {

        // se puede editar la tva solo si no tiene
        // budgets
        // invoices
        // credit notes
        // no esta en el cloud
        // si la tva existe en la db

        if (contacts_field_id('tva', $new_tva)) {
            array_push($this->_why_can_not_edit_tva, 'The tva number already exists in the database');
        }



        if ($this->getWhy_can_not_edit_tva()) {
            return $this->getWhy_can_not_edit_tva();
        } else {
            contacts_update_tva($this->getId(), $new_tva);
            $this->_tva = $new_tva;
            return 1;
        }
    }

    function setWhy_can_not_edit_tva($error = null) {

        if ($error != null && $error != '' && $error != false) {
            array_push($this->_why_can_not_edit_tva, $error);
        }

        // por que no puedo editar 
        if ($this->getIs_in_cloud()) {
            array_push($this->_why_can_not_edit_tva, 'This company is already in cloud');
        }

        if (invoices_total_by_client_id($this->getId())) {
            array_push($this->_why_can_not_edit_tva, 'You have already created invoices for this company');
        }
        if (budgets_total_by_client_id($this->getId())) {
            array_push($this->_why_can_not_edit_tva, 'You have already created budgets for this company');
        }
        if (credit_notes_total_by_client($this->getId())) {
            array_push($this->_why_can_not_edit_tva, 'You have already created credit notes for this company');
        }
    }

    function setLogo64($logo) {
        $this->_logo64 = $logo;
    }

    function setDiscounts($discounts) {
        $this->_discounts = $discounts;
    }

    function setIs_head_office($val) {
        $this->_is_head_office = $val;
    }

    function setIs_in_cloud() {
        // si hay algun elemento en la DB 
        // paso a true 
        $in_cloud = (cloud_company_details_by_tva($this->getTva())) ? true : false;

        $this->_is_in_cloud = $in_cloud;
    }

    function setError_subdomain() {

        // si no hay nombre
        if ($this->getName() == '' || $this->getName() == null) {
            array_push($this->_error_subdomain, 'Name is manatory to have subdomain');
        }
        // si no hay tva o es vacia
        if ($this->getTva() == '' || $this->getTva() == null) {
            array_push($this->_error_subdomain, 'Vat is mandatory to have a subdomain');
        }
        // Si la company no tiene direccion de facturacion 
        if (!$this->getAddresses('Billing')) {
            array_push($this->_error_subdomain, 'Billing address is mandatory to have a subdomain');
        }
        // si la empresa no tiene email 
        if (!$this->getDirectory('Email')) {
            array_push($this->_error_subdomain, 'This company dont have email');
        }
// subdominio
        // $subdomain es la tva
        if (cpanel3_sub_domain_exist($this->getSubdomain_Data('subdomain'))) {
            array_push($this->_error_subdomain, 'Subdomain already exist in cpanel');
        }
// 
        if (cpanel3_db_exist($this->getSubdomain_Data('db_name'))) {
            array_push($this->_error_subdomain, 'DB already exist in cpanel');
        }

// usuarios
        if (cpanel3_db_user_exist($this->getSubdomain_Data('db_user'))) {
            array_push($this->_error_subdomain, 'DB user already exist in cpanel');
        }

// emails
        if (cpanel3_emails_exist($this->getSubdomain_Data('email_user'))) {
            array_push($this->_error_subdomain, 'Email already exist in cpanel');
        }

        // 
        if (file_exists("admin/" . $this->getSubdomain_Data('condif_file'))) {
            array_push($this->_error_subdomain, 'This config_file already exists in the system');
        }
    }

    function setSubdomain_Data($key, $val) {
        $this->_subdomain_data[$key] = $val;
    }

    // no crea, solo prepara los datos para crear el subdominio
    function setSubdomain() {
        global $cpanel3;

        // esto esta en la config_db_2.php
        $subdomain = strtolower($this->getTva()); // BE0123456789 // pasado a minusculas
        $tva = strtolower($this->getTva()); // BE0123456789 // pasado a minusculas
        $domain = $cpanel3['domain']; // factux.eu
        $prefix = $cpanel3['user']; // factuxeu

        $this->setSubdomain_Data('tva', $tva); // tva
        $this->setSubdomain_Data('domain', $domain); // factux.be
        $this->setSubdomain_Data('subdomain', $subdomain); // BE0123456789
        $this->setSubdomain_Data('subdomain_domain', ($subdomain . "." . $domain)); // BE0123456789.factux.be
        $this->setSubdomain_Data('prefix', $prefix); // factuxeu
        //  $this->setSubdomain_Data('email_user', $subdomain . "@" . $domain); // BE0123456789@factux.be
        $this->setSubdomain_Data('email_user', $subdomain); // user > user@factux.be

        $this->setSubdomain_Data('db_server', 'localhost');
        $this->setSubdomain_Data('db_name', $prefix . "_" . ($subdomain));
        $this->setSubdomain_Data('db_user', $prefix . "_u" . ($subdomain));
        $my_super_pass = "-=4y$*" . passwordRandom();
        $this->setSubdomain_Data('db_pass', $my_super_pass);
        $this->setSubdomain_Data('config_file', "config_" . $subdomain . '.' . $domain . '.php');

        //
        $this->setWhy_can_not_add_a_subdomain();
        //
        //
    }

    function setWhy_can_not_add_to_cloud($because = null) {

        if ($because) {
            array_push($this->_why_can_not_add_to_cloud, $because);
        }

        // si tiene nombre
        // si tiene tva
        // si tiene direccio de facturacion
        // si tiene nombre de contacto 
        // si tiene un email 
        // 
        if ($this->getName() == '' || $this->getName() == null) {
            array_push($this->_why_can_not_add_to_cloud, ('Company name is mandatory'));
        }

        if ($this->getTva() == '' || $this->getTva() == null) {
            array_push($this->_why_can_not_add_to_cloud, ('Tva is mandatory'));
        }

        if (!$this->getAddresses('Billing')) {
            array_push($this->_why_can_not_add_to_cloud, ('Billing Address is mandatory'));
        }

        if (!$this->getDirectory('Email')) {
            array_push($this->_why_can_not_add_to_cloud, ('Email is mandatory'));
        }
    }

    function setWhy_can_not_add_a_subdomain($because = null) {

        if ($because) {
            array_push($this->_why_can_not_add_a_subdomain, $because);
        }

        if ($this->getName() == "" || $this->getName() == null || $this->getName() == false) {
            array_push($this->_why_can_not_add_a_subdomain, 'Name is mandatory');
        }

        if (!$this->getTva()) {
            array_push($this->_why_can_not_add_a_subdomain, 'Vat is mandatory');
        }

        if (!$this->getDirectory("Email")) {
            array_push($this->_why_can_not_add_a_subdomain, 'Email is mandatory');
        }

        if (!$this->getAddresses("Billing")) {
            array_push($this->_why_can_not_add_a_subdomain, 'Billing address is mandatory');
        }

        // si no hay contacto como empleado
        if (count(cloud_employees_list_by_contact_id($this->getId())) < 1) {
            array_push($this->_why_can_not_add_a_subdomain, 'You need a contact');
        }

        // motivos por los que no se puede crear un subdominio
        // 
        // 1 Si ya tiene un subdominio
        if (cpanel3_sub_domain_exist($this->getSubdomain_Data('subdomain_domain'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'Subdomain already exist');
        }

        // Email
        if (cpanel3_email_exist($this->getSubdomain_Data('email_user'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'Email already exists');
        }


        // si ya existe la DB
        if (cpanel3_db_exist($this->getSubdomain_Data('db_name'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'DB already exists');
        }
        // si ya existe el user para la db
        if (cpanel3_db_user_exist($this->getSubdomain_Data('db_user'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'DB user already exists');
        }
        // Si la DB ya tiene data
        if (cpanel3_db_already_has_data($this->getSubdomain_Data('db_name'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'The database already has data');
        }
        // si el config_file ya existe
        if (file_exists("admin/" . $this->getSubdomain_Data('config_file'))) {
            array_push($this->_why_can_not_add_a_subdomain, 'The config_file has already been created');
        }
        //
        //
    }

    //El momento del registro, errores para no ser aprobado 

    function setWhy_can_not_be_approved() {
        // si no tiene nombre la empresa
        if ($this->getName() == '' || $this->getName() == false || $this->getName() == null) {
            array_push($this->_why_can_not_be_approved, 'Company name is mandatory');
        }
        // Si no hay tva
        if ($this->getTva() == '' || $this->getTva() == false || $this->getTva() == null) {
            array_push($this->_why_can_not_be_approved, 'Vat number is mandatory');
        }
        // Si no hay direccion de facturacion
        if ($this->getAddresses('Billing') && $this->getAddresses('Billing')->getAddress() == '') {
            array_push($this->_why_can_not_be_approved, 'Billing address is mandatory');
        }
        // si la compania no tiene email
        if ($this->getDirectory('Email') == null || $this->getDirectory('Email') == '') {
            array_push($this->_why_can_not_be_approved, 'Company email is mandatory');
        }
        // Si no hay informacion bancaria
        if (count($this->getBanks()) < 1) {
            array_push($this->_why_can_not_be_approved, 'Company bank is mandatory');
        }
        // si no hay nombre en el  contacto
        if ($this->getEmployees()[0]->getName() == '' || $this->getEmployees()[0]->getName() == null) {
            array_push($this->_why_can_not_be_approved, 'Contact name is mandatory');
        }
        // si el apellido del contacto da error
        if ($this->getEmployees()[0]->getLastname() == '' || $this->getEmployees()[0]->getLastname() == null) {
            array_push($this->_why_can_not_be_approved, 'Contact lastname is mandatory');
        }
        // si el contacto no tiene email
        if (!$this->getEmployees()[0]->getDirectory("Email")) {
            array_push($this->_why_can_not_be_approved, 'Contact email is mandatory');
        }
        // Si la clave es el email, se debe cambiar
        if (verifi_login_password($this->getEmployees()[0]->getDirectory("Email"), $this->getEmployees()[0]->getDirectory("Email"))) {
            array_push($this->_why_can_not_be_approved, 'Please enter a personal password');
        }
        // tiene membresia selecionada?
        if (!subdomains_search_by_unique('plan', 'subdomain', $this->getTva())) {
            array_push($this->_why_can_not_be_approved, 'Please select a billing plan');
        }


        // si el pago no se ha realizado
    }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    function add_from_json_factux($json, $version = 1) {

        $array = json_decode($json, true);
        $sender = $array['sender'];
        // codigos
        $code1 = $sender['vat'] . magia_uniqid();
        $code2 = $code1 . "2";
        $code3 = $code1 . "3";
        $code4 = $code1 . "4";
        $code5 = $code1 . "5";
        $code6 = $code1 . "6";

        $owner_id = 1022;
        $companyName = $sender['name'];
        $tva = $sender['vat'];

        $title = null;
        $name = 'name';
        $lastname = 'Lastname';
        $birthdate = '1900-01-01';

        $email = $sender['directory']['Email'];
        // empleados
        $ref = "Manager";

        // billing
        $address = $sender['addresses']['Billing']['address'];
        $number = $sender['addresses']['Billing']['number'];
        $postcode = $sender['addresses']['Billing']['postcode'];
        $barrio = $sender['addresses']['Billing']['neighborhood'];
        $sector = $sender['addresses']['Billing']['sector'];
        $ref = $sender['addresses']['Billing']['ref'];
        $city = $sender['addresses']['Billing']['city'];
        $province = $sender['addresses']['Billing']['province'];
        $region = $sender['addresses']['Billing']['region'];
        $country = $sender['addresses']['Billing']['country'];

        // user
        $rol = rols_by_rango_min();
        $password = passwordRandom();

        $transport_code = null;

        if ($sender) {
            // copai exacta de 
            // www-extended/default/contcts/controllers/ok_add_new_company.php
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            /**
             * Agrego la empresa, 
             * Agrego el idioma de esa compania, 
             * Agrego el contacto
             * agrego el contact como empleado ()
             * agrego el email en el directorio del contacto
             * agrego este empleado como usuario (users) con el rol dado 
             * agrego la direccion de la empresa
             */
            /**
             * Actualizar el propietario al agregar una compania
             */
            contacts_add(
                    //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
                    $owner_id, 1, null, $companyName, null, "1900-01-01", $tva, $code1, 1, 1
            );

            $lastCompanyId = contacts_field_code("id", $code1);

            // actualizo el idioma con el idioma por defecto del sistema
            contacts_update_language($lastCompanyId, config_system_lang_default());

            if ($lastCompanyId) {
                // actualizo el propietario 
                contacts_update_owner_id(
                        $lastCompanyId, $lastCompanyId
                );

                // agrego el contacto (Manager) 
                contacts_add(
                        $lastCompanyId, 0, $title, $name, $lastname, $birthdate, null, $code2, 1, 1
                );

                $lastContactId = contacts_field_code("id", $code2);

                // actualizo el idioma con el idioma por defecto del sistema
                contacts_update_language($lastContactId, config_system_lang_default());

                // agredo directorio del contacto 
                if ($email) {
                    directory_add(
                            //$contact_id , $address_id , $name , $data , $order_by , $status
                            $lastContactId, null, "Email", $email, $code3, 1, 1
                    );
                }

                $lastInsertDirectory = directory_field_code("id", $code3);

                // agrego como empleado 
                if ($lastContactId) {
                    employees_add(
                            //$company_id , $contact_id , $owner_ref , $date , $cargo , $order_by , $status
                            $lastCompanyId, $lastContactId, $ref, null, 'Manager', 1, 1
                    );
                }




                // Agrego la direccion de facturacin
                // Agrego la direccion de facturacin
                // Agrego la direccion de facturacin
                // Agrego la direccion de facturacin
                // Agrego la direccion de facturacin
                // Agrego la direccion de facturacin
                if ($lastCompanyId) {

                    // addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code, $status)
                    addresses_add(
                            $lastCompanyId, 'Billing', $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code4, 1
                    );
                }



                // agrego la direccion de entregz    
                // agrego la direccion de entregz    
                // agrego la direccion de entregz    
                if ($lastCompanyId) {
                    addresses_add(
                            $lastCompanyId, "Delivery", $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code5, 1
                    );
                    $addresses_id = addresses_field_code("id", $code5);
                    //Agrego el transporte

                    addresses_transport_add($addresses_id, $transport_code);
                }


                // insert in users
                // insert in users
                if (employees_by_company_contact($lastCompanyId, $lastContactId) && $email) {
                    users_add($lastContactId, 'en_GB', $rol, $email, $password, $email, magia_uniqid(), 1);
                }
            }

            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
        }
    }

    function export() {
        return json_encode($this);
    }

    function create_subdomain() {

        global $config_cloud_db;

        if ($this->getError_subdomain()) {
            // si hay errores, envio los errores
            return $this->getError_subdomain();
        } else {

            $config_file = $this->getSubdomain_Data('config_file');
            $subdomain_domain = $this->getSubdomain_Data('subdomain_domain'); // BE0123456789.factux.eu

            $email_user = $this->getSubdomain_Data('email_user'); // BE0123456789@factux.eu
            $domain = $this->getSubdomain_Data('domain'); // factux.eu
            $db_name = $this->getSubdomain_Data('db_name');
            $db_user = $this->getSubdomain_Data('db_user');
            $db_pass = $this->getSubdomain_Data('db_pass');
            $tva = $this->getSubdomain_Data('tva');

            // 0
//            (cpanel3_email_create($email_user, '*/*@#' . passwordRandom()));
            // 1
            (cpanel3_subdomain_create($subdomain_domain, $domain));
            // 2
            (cpanel3_db_create($db_name));
            // 3
            (cpanel3_db_users_create($db_user, $db_pass));
            // 4
            (cpanel3_db_add_user_to_db($db_user, $db_name));
            // 4,1 Le doy acceso a la database de cloud
            // 4,1 Le doy acceso a la database de cloud
            // 4,1 Le doy acceso a la database de cloud
//            (cpanel3_db_add_user_to_db($db_user, $config_cloud_db));
            // 5 server, user, pass, db
            (cpanel3_db_fill('localhost', $db_user, $db_pass, $db_name, $this));
            // 6 crea el archivo de configuracion
            (cpanel3_file_create($config_file, $this->getContent_config_file()));
            // 7 db fill with personal data//
            // Creo la carpeta en gallery

            (cpanel3_file_create($config_file, $this->getContent_config_file()));

            // Lleno con la informacion de la company
            cpanel3_db_fill_company_data('localhost', $db_user, $db_pass, $db_name, $tva);

            //
            //
            //
        }
    }

    function create_config_file() {
        // crea el archivo /admin/config_demo.factux.eu.php
        $config_file = $this->getSubdomain_Data('config_file');
        ($config_file);
        (cpanel3_file_create($config_file, $this->getContent_config_file()));
    }

    /**
     * Agrega la this company a cloud
     */
    function add_to_cloud() {


        if (!$this->Why_can_not_add_to_cloud()) {
            // Encodo la company en formato json
            $cloud_company_json = (json_encode($this));
            // envio para que se agrege a cloud
            cloud_company_add_to_cloud_json($cloud_company_json);
        }
    }

    ######################################################################
    ######################################################################
    ######################################################################
    ######################################################################

    function getLogo64() {
        return $this->_logo64;
    }

    function getId() {
        return $this->_id;
    }

    function getTva() {
        return $this->_tva;
    }

    function getDiscounts() {
        return $this->_discounts;
    }

    function getEmployees() {
        return $this->_employees;
    }

    function getIs_head_office() {
        return $this->_is_head_office;
    }

    function getDirectory($name) {
        return parent::getDirectory($name);
    }

    function getBanks() {
        return parent::getBanks();
    }

    function getBankBydefault() {
        return banks_get_account_for_invoices($this->_id);
    }

    function getIs_in_cloud() {
        return $this->_is_in_cloud;
    }

    function getWhy_can_not_edit_tva() {
        return $this->_why_can_not_edit_tva;
    }

    function getError_subdomain() {
        return $this->_error_subdomain;
    }

    function getSubdomain_Data($key = '') {

        return ($key) ? $this->_subdomain_data[$key] : $this->_subdomain_data;
    }

    function getContent_config_file() {
        global $u_owner_id;

        $domain = $this->getSubdomain_Data('domain'); //factux.eu
//      $subdomain = $this->getSubdomain_Data('subdomain');
        $subdomain_domain = $this->getSubdomain_Data('subdomain_domain'); // be0123456789.factux.eu
        $db_name = $this->getSubdomain_Data('db_name'); // factuxeu_be0123456789
        $db_user = $this->getSubdomain_Data('db_user'); // factuxeu_ube0123456789
        $db_pass = $this->getSubdomain_Data('db_pass'); // */P2jXkGLS=4y$*jF@!26iT
        // 1 000 002
        $today = date("Y-m-d H:m s");
        $my_tva = contacts_field_id('tva', $u_owner_id);

        $c = '<?php%0A'
                . '//%20creation%20date%20=%20' . $today . ';%0A'
                . '//%20create%20by%20=%20' . $my_tva . ';%0A'
                . '$my_cloud_id%20=%2060232;%0A'
                . '$home_alert%20=%20array(0);%0A'
                . '$config_db_type%20=%20"MySQL";%0A'
                . '$debug%20=%200;%0A'
                . '$config_server%20=%20"localhost";%0A'
                . '$config_db%20=%20"' . $db_name . '";%0A'
                . '$config_login%20=%20"' . $db_user . '";%0A'
                . '$config_pass%20=%20"' . $db_pass . '";%0A'
                . '$config_theme%20=%20"default";%0A'
                . '$config_public_theme%20=%20"Rapid";%0A'
                . '$config_secure_bank["bank"]%20=%20"BNP";%0A'
                . '$config_secure_bank["account_number"]%20=%20"BE32%200123%204321%201234";%0A'
                . '$config_secure_bank["bic"]%20=%20"GEBABEBB";%0A'
                . '$config_secure_bank["iban"]%20=%20"";%0A'
                . '$config_secure_bank["code"]%20=%20"";%0A'
                . '$config_secure_bank["invoices"]%20=%20true;%0A'
                . '$config_secure_bank["status"]%20=%20true;%0A'
                . '$config_secure_bank2["bank2"]%20=%20false;%0A'
                . '$config_secure_bank2["account_number2"]%20=%20false;%0A'
                . '$config_secure_bank2["bic2"]%20=%20false;%0A'
                . '$config_secure_bank2["iban2"]%20=%20false;%0A'
                . '$config_secure_bank2["code2"]%20=%20false;%0A'
                . '$config_secure_bank2["invoices2"]%20=%20true;%0A'
                . '$config_secure_bank2["status2"]%20=%20true;%0A'
                . '$config_invoices_company_outside_pay_tax%20=%200;%0A'
                . '$config_empresa_moneda_simbolo%20=%20"EUR";%0A'
                . '$config_app["url"]%20=%20"https://' . $subdomain_domain . '/index.php?c=app";%0A'
                . 'define("CHANGE_YEAR",FALSE);%0A'
                . '$config_change_year["label"]%20=%20"2023";%0A'
                . '$config_change_year["goto"]%20=%20"2022";%0A'
                . '$config_change_year["url"]%20=%20"https://' . $subdomain_domain . '";%0A'
                . '$config_app["url"]%20=%20"https://' . $subdomain_domain . '/index.php?c=app";%0A'
                . '$config_company_domain_name%20=%20"' . $domain . '";%0A'
                . 'define("COMPANY_PREFIX","X");%0A'
                . 'define("AUTO_REGISTRE",0);';
        return $c;
    }

    function Why_can_not_add_to_cloud() {
        return $this->_why_can_not_add_to_cloud;
    }

    function Why_can_not_add_a_subdomain() {
        return $this->_why_can_not_add_a_subdomain;
    }

    ////////////////////////////////////////////////////////////////////////////
    // // Registro de una empresa
    // Las empresas que cumplan con las siguientes condiciones pueden ser aprobadas 
    // 1) tener nombre
    //  2) tener tva y  no existe en la DB
    //
    //
    //



    function Why_can_not_be_approved() {
        return $this->_why_can_not_be_approved;
    }
}
