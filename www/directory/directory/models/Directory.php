<?php

################################################################################

class Directorydd {

    public $_id;
    public $_contact_id;
    public $_address_id;
    public $_name;
    public $_data;
    public $_code;
    public $_order_by;
    public $_status;

    function __construct($id) {
        $directory = directory_details($id);
        //
        $this->_id = $directory["id"];
        $this->_contact_id = $directory["contact_id"];
        $this->_address_id = $directory["address_id"];
        $this->_name = $directory["name"];
        $this->_data = $directory["data"];
        $this->_code = $directory["code"];
        $this->_order_by = $directory["order_by"];
        $this->_status = $directory["status"];
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getAddress_id() {
        return $this->_address_id;
    }

    function getName() {
        return $this->_name;
    }

    function getData() {
        return $this->_data;
    }

    function getCode() {
        return $this->_code;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

    function getDirectoryByContact($contact_id) {

        return directory_list_by_contact_id($contact_id) ?? false;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setAddress_id($address_id) {
        $this->_address_id = $address_id;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setData($data) {
        $this->_data = $data;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }
}

################################################################################
