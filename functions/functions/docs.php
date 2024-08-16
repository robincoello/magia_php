<?php

class Docs {

    public $_id;
    public $_sender;
    public $_budget_id;
    public $_credit_note_id;
    public $_client_id;
    public $_client;
    public $_title;
    public $_seller_id;
    public $_addresses_billing;
    public $_addresses_delivery;
    public $_date;
    public $_date_registre;
    public $_date_expiration;
    public $_total;
    public $_tax;
    public $_advance;
    public $_balance;
    public $_comments;
    public $_comments_private;
    public $_r1;
    public $_r2;
    public $_r3;
    public $_fc;
    public $_date_update;
    public $_days;
    public $_ce;
    public $_code;
    public $_type;
    public $_status;
    //
    public $_lines = array();
    //
    public $_export = array();
    // 
    public $_import_errors = array();

    //

    function __construct() {
        
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getSender() {
        return $this->_sender;
    }

    function getBudget_id() {
        return $this->_budget_id;
    }

    function getCredit_note_id() {
        return $this->_credit_note_id;
    }

    function getClient_id() {
        return $this->_client_id;
    }

    function getClient() {
        return $this->_client;
    }

    function getTitle() {
        return $this->_title;
    }

    function getSeller_id() {
        return $this->_seller_id;
    }

    function getAddresses_billing() {
        return $this->_addresses_billing;
    }

    function getAddresses_delivery() {
        return $this->_addresses_delivery;
    }

    function getDate() {
        return $this->_date;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getDate_expiration() {
        return $this->_date_expiration;
    }

    function getTotal() {
        return $this->_total;
    }

    function getTax() {
        return $this->_tax;
    }

    function getAdvance() {
        return $this->_advance;
    }

    function getBalance() {
        return $this->_balance;
    }

    function getComments() {
        return $this->_comments;
    }

    function getComments_private() {
        return $this->_comments_private;
    }

    function getR1() {
        return $this->_r1;
    }

    function getR2() {
        return $this->_r2;
    }

    function getR3() {
        return $this->_r3;
    }

    function getFc() {
        return $this->_fc;
    }

    function getDate_update() {
        return $this->_date_update;
    }

    function getDays() {
        return $this->_days;
    }

    function getCe() {
        return $this->_ce;
    }

    function getCode() {
        return $this->_code;
    }

    function getType() {
        return $this->_type;
    }

    function getStatus() {
        return $this->_status;
    }

    function getLines() {
        return $this->_lines;
    }

    function getImportErrors() {
        return $this->_import_errors;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setBudget_id($budget_id) {
        $this->_budget_id = $budget_id;
    }

    function setCredit_note_id($credit_note_id) {
        $this->_credit_note_id = $credit_note_id;
    }

    function setClient_id($client_id) {
        $this->_client_id = $client_id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setSeller_id($seller_id) {
        $this->_seller_id = $seller_id;
    }

    function setAddresses_billing($addresses_billing) {

        //vardump(array(__LINE__, $addresses_billing));


        $this->_addresses_billing = $addresses_billing;
    }

    function setAddresses_delivery($addresses_delivery) {
        $this->_addresses_delivery = $addresses_delivery;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setDate_expiration($date_expiration) {
        $this->_date_expiration = $date_expiration;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setAdvance($advance) {
        $this->_advance = $advance;
    }

    function setBalance($balance) {
        $this->_balance = $balance;
    }

    function setComments($comments) {
        $this->_comments = $comments;
    }

    function setComments_private($comments_private) {
        $this->_comments_private = $comments_private;
    }

    function setR1($r1) {
        $this->_r1 = $r1;
    }

    function setR2($r2) {
        $this->_r2 = $r2;
    }

    function setR3($r3) {
        $this->_r3 = $r3;
    }

    function setFc($fc) {
        $this->_fc = $fc;
    }

    function setDate_update($date_update) {
        $this->_date_update = $date_update;
    }

    function setDays($days) {
        $this->_days = $days;
    }

    function setCe($ce) {
        $this->_ce = $ce;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setLines($invoice_id) {

        $this->_lines = array_merge($this->_lines, invoice_lines_list_by_invoice_id($invoice_id));
    }

    function setDoc($id) {
        //global $config_company_name;

        $invoices = invoices_details($id);
        //
        $this->_id = $invoices["id"];

        $this->_sender = new Conpany();
        $this->_sender->setConpany(1022);

        $this->_budget_id = $invoices["budget_id"];
        $this->_credit_note_id = $invoices["credit_note_id"];
        $this->_client_id = $invoices["client_id"];

        $this->_client = new Contacts();
        $this->_client->setContact($invoices["client_id"]);

        $this->_title = $invoices["title"];
        $this->_seller_id = $invoices["seller_id"];

//        $this->_addresses_billing = json_decode($invoices["addresses_billing"], true);
//        $this->_addresses_delivery = json_decode($invoices["addresses_delivery"], true);
//        
        $this->_addresses_billing = new Addresses();
        $this->_addresses_billing->setAddresses(json_decode($invoices["addresses_billing"], true)['id']);

        $this->_addresses_delivery = new Addresses();
        $this->_addresses_delivery->setAddresses(json_decode($invoices["addresses_delivery"], true)['id']);

        $this->_date = $invoices["date"];
        $this->_date_registre = $invoices["date_registre"];
        $this->_date_expiration = $invoices["date_expiration"];
        $this->_total = $invoices["total"];
        $this->_tax = $invoices["tax"];
        $this->_advance = $invoices["advance"];
        $this->_balance = $invoices["balance"];
        $this->_comments = $invoices["comments"];
        $this->_comments_private = $invoices["comments_private"];
        $this->_r1 = $invoices["r1"];
        $this->_r2 = $invoices["r2"];
        $this->_r3 = $invoices["r3"];
        $this->_fc = $invoices["fc"];
        $this->_date_update = $invoices["date_update"];
        $this->_days = $invoices["days"];
        $this->_ce = $invoices["ce"];
        $this->_code = $invoices["code"];
        $this->_type = $invoices["type"];
        $this->_status = $invoices["status"];

        //$this->_items = null;
        $this->setLines($invoices["id"]);
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function exportJson() {




//        global $config_factux,
//        $config_company_a_address,
//        $config_company_a_number,
//        $config_company_a_postal_code,
//        $config_company_a_barrio,
//        $config_company_a_city,
//        $config_company_a_region,
//        $config_company_a_country,
//        $config_secure_bank;
//
//
//
//        $this->_export['factux']['version'] = $config_factux['version'];
//        $this->_export['factux']['url'] = $config_factux['url'];
//        $this->_export['factux']['email'] = $config_factux['email'];
//
//
//        $this->_export['reciver']['company']['name'] = $this->_sender->getName();
//        $this->_export['reciver']['company']['tva'] = $this->_sender->getTva();
//        $this->_export['reciver']['company']['factux_id'] = $this->_sender->getTva();
//        $this->_export['reciver']['company']['addresses']['Billing']['address'] = $this->_addresses_billing;
//        $this->_export['reciver']['company']['addresses']['Delivery']['number'] = $this->_addresses_delivery;
//
//        $this->_export['reciver']['contact']['title'] = null;
//        $this->_export['reciver']['contact']['name'] = null;
//        $this->_export['reciver']['contact']['lastname'] = null;
//        //
//        $this->_export['id'] = $this->_id;
//        $this->_export['date'] = $this->_date;
//        $this->_export['date_expiration'] = $this->_date_expiration;
//        $this->_export['budget'] = $this->_budget_id;
//        $this->_export['ce'] = $this->_ce;
//        $this->_export['comments'] = $this->_comments;
//        $this->_export['total'] = $this->_total;
//        $this->_export['tax'] = $this->_tax;
//        $this->_export['lines'] = $this->_lines;
//
//
//        $this->_export['sender']['company']['name'] = $this->_sender->getName();
//        $this->_export['sender']['company']['tva'] = $this->_sender->getTva();
//        $this->_export['sender']['company']['factux_id'] = $this->_sender->getTva();
//
//        // foreach (addresses_name() as $addresse_name) {
//        $this->_export['sender']['company']['addresses']['address'] = $config_company_a_address;
//        $this->_export['sender']['company']['addresses']['number'] = $config_company_a_number;
//        $this->_export['sender']['company']['addresses']['postcode'] = $config_company_a_postal_code;
//        $this->_export['sender']['company']['addresses']['barrio'] = $config_company_a_barrio;
//        $this->_export['sender']['company']['addresses']['city'] = $config_company_a_city;
//        $this->_export['sender']['company']['addresses']['region'] = ''; // no puede ser null
//        $this->_export['sender']['company']['addresses']['country'] = $config_company_a_country; // BE
//        //}
//        //
//
//        foreach (directory_names_list() as $key => $dir_value) {
//            $this->_export['sender']['company']['directory'][$dir_value[1]] = $this->_sender->_directory[$dir_value[1]];
//        }
//
//        $this->_export['sender']['company']['banks']['bank'] = $config_secure_bank['bank'];
//        $this->_export['sender']['company']['banks']['account_number'] = $config_secure_bank['account_number'];
//        $this->_export['sender']['company']['banks']['bic'] = $config_secure_bank['bic'];
//        $this->_export['sender']['company']['banks']['iban'] = $config_secure_bank['iban'];
//        //
//        $this->_export['sender']['contact']['title'] = $this->_sender->getTitle();
//        $this->_export['sender']['contact']['name'] = $this->_sender->getName();
//        $this->_export['sender']['contact']['lastname'] = $this->_sender->getLastname();
//        $this->_export['sender']['contact']['birthdate'] = $this->_sender->getBirthdate();
//
//
//        foreach (directory_names_list() as $key => $dir_value) {
//            $this->_export['sender']['contact']['directory'][$dir_value[1]] = $this->_sender->_directory[$dir_value[1]];
//        }



        return json_encode($this);
    }

    function setImportErrors($error) {
        array_push($this->_import_errors, $error);
    }

    function importFromJson($json) {

        $data = json_decode($json); // paso a array
        //  vardump($data);

        $res = array();
        //  vardump($sender['company']['tva']);
        // si es empresa y tva existe
        if ($this->importExistCompany($this->getId())) {
            echo "existe";

            $this->importFromJsonContactExist($json);
        } else {

            echo "no no ";
            $this->importFromJsonNewContact($json);
        }
    }

    function importFromJsonNewContact($json) {



        $data = json_decode($json, true);

        $res = array();

        //vardump($data);
////
        $sender = ($data['_sender']);
        $lines = ($data['_lines']);
        $company = ($data['_sender']['_name']);
        $_addresses_billing = ($data['_addresses_billing']);
        $_addresses_delivery = ($data['_addresses_delivery']);
        $banks = ($data['_sender']['_banks']);
        $directory = ($data['_sender']['_directory']);

        $company = new Company();

        $last_contact_id = $company->addNew($owner_id, $title, $name, $lastname);

        if (!$this->importCheckDocumentIsOk('documento')) {
            $this->setImportErrors('Documento error');
        }

        if (!$this->importCheckFactuxExportVersionIsOk('1')) {
            $this->setImportErrors('Version de exportacion de factux incompatible');
        }


        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Existe sender?
        // si
        //      actualizo los datos (pregunto)
        // no     
        ////////////////////////////////////////////////////////////////////////
        // Add : 
        // Company
        // addresses company
        // directory company
        // banks company
        // Contact de company
        // 
        // agrego la factura como gasto 
        // agrego las lineas 
        // 
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //$contact = new Contacts();
        //$contact->setContact($this->_sender->getId());
//        $company_code = magia_uniqid();
//        contacts_add(
//                //$owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
//                1022,
//                1,
//                null,
//                magia_uniqid() . $this->_sender->getName(),
//                null,
//                '1901-01-01',
//                "",
//                $company_code,
//                1,
//                1
//        );
        ////////////////////////////////////////////////////////////////////////
        $last_company_id = contacts_field_code('id', $company_code);
        ////////////////////////////////////////////////////////////////////////
        contacts_update_owner_id($last_company_id, $last_company_id);
        ////////////////////////////////////////////////////////////////////////
        // addresess
        // 
        // 
        // vardump($_addresses_delivery);        


        foreach (addresses_name() as $addresse_name) {
            addresses_add(
                    $last_company_id,
                    $addresse_name,
                    $_addresses_delivery['_address'],
                    $_addresses_delivery['_number'],
                    $_addresses_delivery['_postcode'],
                    $_addresses_delivery['_barrio'],
                    $_addresses_delivery['_ref'],
                    $_addresses_delivery['_city'],
                    $_addresses_delivery['_province'],
                    $_addresses_delivery['_region'],
                    $_addresses_delivery['_country'],
                    magia_uniqid(),
                    1
            );
        }
        ////////////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $dir_value) {


            $directory_code = magia_uniqid();

            directory_add(
                    $last_company_id,
                    null,
                    $dir_value[1],
                    $directory[$dir_value[1]],
                    $directory_code,
                    1,
                    1
            );
        }
        ////////////////////////////////////////////////////////////////////////
        //Bancos
        //banks_add($contact_id, $bank, $account_number, $bic, $iban, $code, $status);
        //vardump($banks);

        foreach ($banks as $key => $bank) {
            banks_add(
                    $last_company_id,
                    $bank['_bank'],
                    $bank['_account_number'],
                    $bank['_bic'],
                    $bank['_iban'],
                    magia_uniqid(),
                    1
            );
        }


        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        vardump($contact);
        vardump($contact->getTitle());

        $contact_code = magia_uniqid();

        contacts_add(
                $last_company_id,
                0,
                $contact->getTitle(),
                $contact->getName(),
                $contact->getLastname(),
                '1901-01-01',
                null,
                $contact_code,
                1,
                1
        );
        ////////////////////////////////////////////////////////////////////////
        $last_contact_id = contacts_field_code('id', $contact_code);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $dir_value) {

            vardump($contact->_directory[$dir_value[1]]);

            if ($contact->_directory[$dir_value[1]]) {
                directory_add(
                        $last_contact_id,
                        null,
                        $dir_value[1],
                        $contact->_directory[$dir_value[1]],
                        //$contact_directory[$dir_value[1]],
                        magia_uniqid(),
                        1,
                        1
                );
            }
        }
        ////////////////////////////////////////////////////////////////////////
        employees_add(
                $last_company_id,
                $last_contact_id,
                null,
                date('Y-m-d'),
                'employee',
                1,
                1
        );
        ////////////////////////////////////////////////////////////////////////
        //Agrego la expense
        $expense_code = magia_uniqid();
        expenses_add_by_client_id($last_company_id, $expense_code, 10);
        ////////////////////////////////////////////////////////////////////////
        // Busco cual se agrego 
        $last_expense_id = expenses_field_code('id', $expense_code);
        ////////////////////////////////////////////////////////////////////////

        foreach ($lines as $key => $line) {
            expense_lines_add(
                    $last_expense_id,
                    $line['code'],
                    $line['quantity'],
                    $line['description'],
                    $line['price'],
                    $line['discounts'],
                    $line['discounts_mode'],
                    $line['tax'],
                    1,
                    10
            );
        }


        expenses_update_total_tax(
                $last_expense_id,
                expense_lines_totalHTVA($last_expense_id),
                expense_lines_totalTVA($last_expense_id)
        );

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////


        if ($this->_import_errors) {
            return $this->_import_errors;
        } else {
            return $last_expense_id;
        }
    }

    function importFromJsonContactExist($json) {

        $data = json_decode($json, true);

        $res = array();

        $lines = ($data['lines']);

        $company = ($data['sender']['company']);

        $tva = $this->importExistCompany($sender['company']['tva']);

        vardump($tva);

        $last_company_id = contacts_field_tva('id', $tva);

        ////////////////////////////////////////////////////////////////////////
        // 
        // agrego la factura como gasto 
        // agrego las lineas 
        // 
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Agrego la expense
        $expense_code = magia_uniqid();
        expenses_add_by_client_id($last_company_id, $expense_code, 10);
        ////////////////////////////////////////////////////////////////////////
        // Busco cual se agrego 
        $last_expense_id = expenses_field_code('id', $expense_code);
        ////////////////////////////////////////////////////////////////////////

        foreach ($lines as $key => $line) {
            expense_lines_add(
                    $last_expense_id,
                    $line['code'],
                    $line['quantity'],
                    $line['description'],
                    $line['price'],
                    $line['discounts'],
                    $line['discounts_mode'],
                    $line['tax'],
                    1,
                    10
            );
        }


        expenses_update_total_tax(
                $last_expense_id,
                expense_lines_totalHTVA($last_expense_id),
                expense_lines_totalTVA($last_expense_id)
        );

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////


        if ($this->_import_errors) {
            return $this->_import_errors;
        } else {
            return $last_expense_id;
        }
    }

    function importCheckDocumentIsOk($doc) {
        return true;
    }

    function importCheckFactuxExportVersionIsOk($version) {
        return true;
    }

    function importExistCompany($tva) {
        return contacts_field_tva('id', $tva);
    }
}

################################################################################