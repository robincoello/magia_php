<?php

class CloudCompany {

    public $_id;
    public $_name;
    public $_type;
    public $_tva;
    public $_language;
    public $_address_billing = array();
    public $_contact;
    public $_why_can_not_edit_tva = array();
    public $_why_can_not_add_to_my_contacts = array();

    function getId() {
        return $this->_id;
    }

    function setCompany($tva) {

        $cloud_company = cloud_company_details($tva);

        $this->_id = $cloud_company['id'];
        $this->_name = $cloud_company['name'];
        $this->_type = $cloud_company['type'];
        $this->_tva = $cloud_company['tva'];
        $this->_language = $cloud_company['language'];

        $this->setAddresses($this->getId());
        $this->setDirectory($this->getId());
        // si hay un solo empleado o contacto 
        // sino cojo en owner
        $this->setContact();
//        $this->setIs_in_cloud();
//        $this->setWhy_can_not_edit_tva();
    }

    function setAddresses($contact_id) {
        $this->_address_billing = cloud_addresses_billing_by_contact_id($contact_id);
    }

    function setDirectory($contact_id) {
        foreach (directory_names_list() as $key => $value) {
            $this->_directory[$value['name']] = cloud_directory_list_by_contact_name($contact_id, $value['name']);
        }
    }

    function setContact() {
        // si hay un contacto registro ese 
        // si hay mas de uno cojo el owner 
        //
        $contacts = cloud_contacts_list_by_owner_id($this->getId());

        if (count($contacts) == 1) {
            $contact = cloud_contact_details($contacts[0]['id']);
        } else {
            $cloud_employee = cloud_employees_by_company_cargo($this->getId(), 'owner');
            $contact = cloud_contact_details($cloud_employee['company_id']);
        }

        $this->_contact['name'] = $contact['name'];
        $this->_contact['lastname'] = $contact['lastname'];

        // el directory
        foreach (directory_names_list() as $key => $value) {
            $this->_contact['directory'][$value['name']] = cloud_directory_list_by_contact_name($contact[id], $value['name']);
        }
    }

    function setIs_in_cloud() {
        // si hay algun elemento en la DB 
        // paso a true 
        $in_cloud = (cloud_company_details_by_tva($this->getTva())) ? true : false;

        $this->_is_in_cloud = $in_cloud;
    }

//    function setWhy_can_not_edit_tva($error = null) {
//
//        if ($error != null && $error != '' && $error != false) {
//            array_push($this->_why_can_not_edit_tva, $error);
//        }
//
//        // por que no puedo editar 
//        if ($this->getIs_in_cloud()) {
//            array_push($this->_why_can_not_edit_tva, 'This company is already in cloud');
//        }
//        if (invoices_total_by_client_id($this->getId())) {
//            array_push($this->_why_can_not_edit_tva, 'You have already created invoices for this company');
//        }
//        if (budgets_total_by_client_id($this->getId())) {
//            array_push($this->_why_can_not_edit_tva, 'You have already created budgets for this company');
//        }
//        if (credit_notes_total_by_client($this->getId())) {
//            array_push($this->_why_can_not_edit_tva, 'You have already created credit notes for this company');
//        }
//    }

    function setWhy_can_not_add_to_my_contacts() {
        // si no tiene nombre 
        // si no tiene tva
        // si no tiene direccion de facturacion 
        // si no tiene email 
        // si no hay contacto
        // si contacto no tiene nombre
        // si contacto no tiene apellido
        // si contacto no tiene email 

        if ($this->_name == '' || $this->_name == false || $this->_name == null) {
            array_push($this->_why_can_not_add_to_my_contacts, 'Name is mandatory');
        }

        if (!$this->_tva) {
            array_push($this->_why_can_not_add_to_my_contacts, 'Vat number is mandatory');
        }

        if (!$this->_address_billing) {
            array_push($this->_why_can_not_add_to_my_contacts, 'Address billing is mandatory');
        }
    }
}
