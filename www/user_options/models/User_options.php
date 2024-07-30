<?php

// user_options
// Date: 2024-03-14    
################################################################################

class User_options {

    /**
     * id
     */
    public $_id;

    /**
     * user_id
     */
    public $_user_id;

    /**
     * option
     */
    public $_option;

    /**
     * data
     */
    public $_data;

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

    function getUser_id() {
        return $this->_user_id;
    }

    function getOption() {
        return $this->_option;
    }

    function getData() {
        return $this->_data;
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

    function setUser_id($user_id) {
        $this->_user_id = $user_id;
    }

    function setOption($option) {
        $this->_option = $option;
    }

    function setData($data) {
        $this->_data = $data;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setUser_options($id) {
        $user_options = user_options_details($id);
        //
        $this->_id = $user_options["id"];
        $this->_user_id = $user_options["user_id"];
        $this->_option = $user_options["option"];
        $this->_data = $user_options["data"];
        $this->_order_by = $user_options["order_by"];
        $this->_status = $user_options["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return user_options_field_id($field, $id);
    }

    function field_code($field, $code) {
        return user_options_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return user_options_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return user_options_list($start, $limit);
    }

    function details($id) {
        return user_options_details($id);
    }

    function delete($id) {
        return user_options_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return user_options_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return user_options_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return user_options_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return user_options_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return user_options_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return user_options_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return user_options_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return user_options_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return user_options_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return user_options_is_id($id);
    }

    function is_user_id($user_id) {
        return user_options_is_user_id($user_id);
    }

    function is_option($option) {
        return user_options_is_option($option);
    }

    function is_data($data) {
        return user_options_is_data($data);
    }

    function is_order_by($order_by) {
        return user_options_is_order_by($order_by);
    }

    function is_status($status) {
        return user_options_is_status($status);
    }
}
