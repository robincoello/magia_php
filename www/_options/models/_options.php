<?php

// _options
// Date: 2023-02-16    
################################################################################

class _options {

    /**
     * id
     */
    public $_id;

    /**
     * option
     */
    public $_option;

    /**
     * description
     */
    public $_description;

    /**
     * data
     */
    public $_data;

    /**
     * group
     */
    public $_group;

    /**
     * controller
     */
    public $_controller;

    /**
     * order_by
     */
    public $_order_by;

    /**
     * status
     */
    public $_status;

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getOption() {
        return $this->_option;
    }

    function getDescription() {
        return $this->_description;
    }

    function getData() {
        return $this->_data;
    }

    function getGroup() {
        return $this->_group;
    }

    function getController() {
        return $this->_controller;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setOption($option) {
        $this->_option = $option;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setData($data) {
        $this->_data = $data;
    }

    function setGroup($group) {
        $this->_group = $group;
    }

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function set_options($id) {
        $_options = _options_details($id);
        //
        $this->_id = $_options["id"];
        $this->_option = $_options["option"];
        $this->_description = $_options["description"];
        $this->_data = $_options["data"];
        $this->_group = $_options["group"];
        $this->_controller = $_options["controller"];
        $this->_order_by = $_options["order_by"];
        $this->_status = $_options["status"];
    }
}

################################################################################
