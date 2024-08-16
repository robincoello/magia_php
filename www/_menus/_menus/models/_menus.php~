<?php

// _menus
// Date: 2023-03-07    
################################################################################

class _menus {

    /**
     * id
     */
    public $_id;

    /**
     * location
     */
    public $_location;

    /**
     * father_id
     */
    public $_father_id;

    /**
     * label
     */
    public $_label;

    /**
     * controller
     */
    public $_controller;

    /**
     * url
     */
    public $_url;

    /**
     * target
     */
    public $_target;

    /**
     * icon
     */
    public $_icon;

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

    function getLocation() {
        return $this->_location;
    }

    function getFather_id() {
        return $this->_father_id;
    }

    function getLabel() {
        return $this->_label;
    }

    function getController() {
        return $this->_controller;
    }

    function getUrl() {
        return $this->_url;
    }

    function getTarget() {
        return $this->_target;
    }

    function getIcon() {
        return $this->_icon;
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

    function setLocation($location) {
        $this->_location = $location;
    }

    function setFather_id($father_id) {
        $this->_father_id = $father_id;
    }

    function setLabel($label) {
        $this->_label = $label;
    }

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setTarget($target) {
        $this->_target = $target;
    }

    function setIcon($icon) {
        $this->_icon = $icon;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function set_menus($id) {
        $_menus = _menus_details($id);
        //
        $this->_id = $_menus["id"];
        $this->_location = $_menus["location"];
        $this->_father_id = $_menus["father_id"];
        $this->_label = $_menus["label"];
        $this->_controller = $_menus["controller"];
        $this->_url = $_menus["url"];
        $this->_target = $_menus["target"];
        $this->_icon = $_menus["icon"];
        $this->_order_by = $_menus["order_by"];
        $this->_status = $_menus["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return _menus_field_id($field, $id);
    }

    function field_code($field, $code) {
        return _menus_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return _menus_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return _menus_list($start, $limit);
    }

    function details($id) {
        return _menus_details($id);
    }

    function delete($id) {
        return _menus_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return _menus_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return _menus_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return _menus_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return _menus_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return _menus_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return _menus_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return _menus_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return _menus_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return _menus_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "father_id":
                return _menus_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return _menus_is_id($id);
    }

    function is_location($location) {
        return _menus_is_location($location);
    }

    function is_father_id($father_id) {
        return _menus_is_father_id($father_id);
    }

    function is_label($label) {
        return _menus_is_label($label);
    }

    function is_controller($controller) {
        return _menus_is_controller($controller);
    }

    function is_url($url) {
        return _menus_is_url($url);
    }

    function is_target($target) {
        return _menus_is_target($target);
    }

    function is_icon($icon) {
        return _menus_is_icon($icon);
    }

    function is_order_by($order_by) {
        return _menus_is_order_by($order_by);
    }

    function is_status($status) {
        return _menus_is_status($status);
    }
}
