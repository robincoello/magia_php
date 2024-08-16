<?php

// directory_names
// Date: 2023-02-16    
################################################################################

class Directory_names {

    /**
     * id
     */
    public $_id;

    /**
     * name
     */
    public $_name;

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

    function getName() {
        return $this->_name;
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

    function setName($name) {
        $this->_name = $name;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setDirectory_names($id) {
        $directory_names = directory_names_details($id);
        //
        $this->_id = $directory_names["id"];
        $this->_name = $directory_names["name"];
        $this->_order_by = $directory_names["order_by"];
        $this->_status = $directory_names["status"];
    }
}

################################################################################
