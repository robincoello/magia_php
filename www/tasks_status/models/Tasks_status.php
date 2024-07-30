<?php

// tasks_status
// Date: 2024-01-19    
################################################################################

class Tasks_status {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * name
     */
    public $_name;

    /**
     * color
     */
    public $_color;

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

    function getCode() {
        return $this->_code;
    }

    function getName() {
        return $this->_name;
    }

    function getColor() {
        return $this->_color;
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

    function setCode($code) {
        $this->_code = $code;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setColor($color) {
        $this->_color = $color;
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

    function setTasks_status($id) {
        $tasks_status = tasks_status_details($id);
        //
        $this->_id = $tasks_status["id"];
        $this->_code = $tasks_status["code"];
        $this->_name = $tasks_status["name"];
        $this->_color = $tasks_status["color"];
        $this->_icon = $tasks_status["icon"];
        $this->_order_by = $tasks_status["order_by"];
        $this->_status = $tasks_status["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tasks_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tasks_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tasks_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tasks_status_list($start, $limit);
    }

    function details($id) {
        return tasks_status_details($id);
    }

    function delete($id) {
        return tasks_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tasks_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tasks_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tasks_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tasks_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tasks_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tasks_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tasks_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return tasks_status_is_id($id);
    }

    function is_code($code) {
        return tasks_status_is_code($code);
    }

    function is_name($name) {
        return tasks_status_is_name($name);
    }

    function is_color($color) {
        return tasks_status_is_color($color);
    }

    function is_icon($icon) {
        return tasks_status_is_icon($icon);
    }

    function is_order_by($order_by) {
        return tasks_status_is_order_by($order_by);
    }

    function is_status($status) {
        return tasks_status_is_status($status);
    }
}
