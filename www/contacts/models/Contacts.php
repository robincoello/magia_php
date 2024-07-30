<?php

################################################################################

class Contacts {

    public $_id;
    public $_owner_id;
    public $_type = 0;
    public $_title;
    public $_name;
    public $_lastname;
    public $_birthdate;
    public $_tva = null;
    public $_billing_method = null;
    public $_discounts = null;
    public $_code;
    public $_language;
    public $_order_by;
    public $_status;
    public $_logo;
    // public $_order_by;
    //  public $_status;
    // 
    public $_addresses = [];
    public $_directory = array();
    public $_banks = array();
    public $_employees = array();
    public $_invoices = array();

    function construct() {
        
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getOwner_id() {
        return $this->_owner_id;
    }

    function getType() {
        return $this->_type;
    }

    function getTitle() {
        return $this->_title;
    }

    function getName() {
        return ($this->_name);
    }

    function getLastname() {
        return ($this->_lastname);
    }

    function getBirthdate() {
        return $this->_birthdate;
    }

    function getTva() {
        return $this->_tva;
    }

    function getBilling_method() {
        return $this->_billing_method;
    }

    function getDiscounts() {
        return $this->_discounts;
    }

    function getCode() {
        return $this->_code;
    }

    function getLanguage() {
        return $this->_language;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

    function getAddresses(string $name) {

        switch ($name) {
            case "Billing":
                return $this->_addresses['Billing'];
                break;

            case "Delivery":
                return $this->_addresses['Delivery'];
                break;

            case "All":
                return $this->_addresses;
                break;

            default:
                break;
        }

        return false;
    }

    function getDirectory($name) {
        return $this->_directory[$name];
    }

    function getDirectoryAll() {
        return $this->_directory;
    }

    function getBanks() {
        return $this->_banks;
    }

    function getinvoices() {
        return $this->_invoices;
    }

    function getFormatedName() {
        return strtoupper($this->_name);
    }

################################################################################
################################################################################
################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setOwner_id($owner_id) {
        $this->_owner_id = $owner_id;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setLastname($lastname) {
        $this->_lastname = $lastname;
    }

    function setBirthdate($birthdate) {
        $this->_birthdate = $birthdate;
    }

    function setTva($tva) {
        $this->_tva = $tva;
    }

    function setBilling_method($billing_method) {
        $this->_billing_method = $billing_method;
    }

    function setDiscounts($discounts) {
        $this->_discounts = $discounts;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setLanguage($language) {
        $this->_language = $language;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setContact($id) {

        $contacts = contacts_details($id);
        //
        $this->_id = $contacts["id"];
        $this->_owner_id = $contacts["owner_id"];
        $this->_type = $contacts["type"];
        $this->_title = $contacts["title"];
        $this->_name = $contacts["name"];
        $this->_lastname = $contacts["lastname"];
        $this->_birthdate = $contacts["birthdate"];
        $this->_tva = $contacts["tva"];
        $this->_billing_method = $contacts["billing_method"];
        $this->_discounts = $contacts["discounts"];
        $this->_code = $contacts["code"];
        $this->_language = $contacts["language"];
        $this->_order_by = $contacts["order_by"];
        $this->_status = $contacts["status"];
//
        $this->setAddresses($contacts["id"]);
        $this->setDirectory($contacts["id"]);
        $this->setBanks($contacts["id"]);
//        $this->setInvoices();
    }

    function setDirectory($contact_id) {
        foreach (directory_names_list() as $key => $value) {
            $this->_directory[$value['name']] = directory_list_by_contact_name($contact_id, $value['name']);
        }
    }

    function setBanks($contact_id) {
        // si el modulo banks esta activo
        if (modules_field_module('status', 'banks')) {
            foreach (banks_list_by_contact_id($contact_id) as $key => $value) {
                $banco = new Banks();
                $banco->setBanks($value['id']);
                array_push($this->_banks, $banco);
            }
        } else {
            $this->_banks = null;
        }
    }

    function setAddresses($contact_id) {
        // las direcciones
        foreach (addresses_list_by_contact_id($contact_id) as $key => $value) {
            $adr = new Addresses();
            $adr->setAddresses($value['id']);
            $this->_addresses[$value['name']] = $adr;
        }
    }

    // Los empleados 
    function setEmployees() {

        foreach (employees_list_by_company($this->getId()) as $key => $emp) {
            $employe = new Employees();
            $employe->setEmployee($this->getId(), $emp['id']);
            array_push($this->_employees, $employe);
        }
    }

    function setInvoices() {
        if (modules_field_module('status', 'banks')) {
            foreach (invoices_search_by_client_id($this->getId()) as $key => $inv) {
                $invoice = new Invoices();
                $invoice->setInvoice($inv['id']);
                array_push($this->_invoices, $invoice);
            }
        } else {
            $this->_invoices = null;
        }
    }

    ############################################################################

    function nameFormated() {

        $format = 2;

        switch ($format) {
            case 1:
                $cf = $this->_name . " " . $this->_lastname;  // robinson coello
                break;
            case 2:
                $cf = $this->_name . " " . strtoupper($this->_lastname);  // robinson COELLO
                break;
            case 3:
                $cf = $this->_name . " " . ucfirst($this->_lastname);  // robinson Coello
                break;

            default:
                break;
        }



        return $cf;
    }

    /**
     * Agrega un contacto y regresa el id del contacto agregado o false si no se agrega
     * @param type $owner_id
     * @param type $title
     * @param type $name
     * @param type $lastname
     * @param type $birthdate
     * @return type
     */
    function addNew($owner_id, $title, $name, $lastname, $birthdate = '1900-01-01') {

        $code = magia_uniqid();

        contacts_add(
                $owner_id, 0, $title, $name, $lastname, $birthdate, null, $code, 1, 1
        );

        // se se agrega correctamente, envia el id
        return contacts_field_code('id', $code);
    }
}

################################################################################

