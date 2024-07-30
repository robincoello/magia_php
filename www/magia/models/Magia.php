<?php

// magia
// Date: 2024-01-23    
################################################################################

class Magia {

    /**
     * id
     */
    public $_id;

    /**
     * m_db
     */
    public $_m_db;

    /**
     * m_table
     */
    public $_m_table;

    /**
     * m_field_name
     */
    public $_m_field_name;

    /**
     * m_action
     */
    public $_m_action;

    /**
     * m_label
     */
    public $_m_label;

    /**
     * m_type
     */
    public $_m_type;

    /**
     * m_class
     */
    public $_m_class;

    /**
     * m_table_external
     */
    public $_m_table_external;

    /**
     * m_col_external
     */
    public $_m_col_external;

    /**
     * m_name
     */
    public $_m_name;

    /**
     * m_id
     */
    public $_m_id;

    /**
     * m_placeholder
     */
    public $_m_placeholder;

    /**
     * m_value
     */
    public $_m_value;

    /**
     * m_only_read
     */
    public $_m_only_read;

    /**
     * m_mandatory
     */
    public $_m_mandatory;

    /**
     * m_selected
     */
    public $_m_selected;

    /**
     * m_disabled
     */
    public $_m_disabled;

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

    function getM_db() {
        return $this->_m_db;
    }

    function getM_table() {
        return $this->_m_table;
    }

    function getM_field_name() {
        return $this->_m_field_name;
    }

    function getM_action() {
        return $this->_m_action;
    }

    function getM_label() {
        return $this->_m_label;
    }

    function getM_type() {
        return $this->_m_type;
    }

    function getM_class() {
        return $this->_m_class;
    }

    function getM_table_external() {
        return $this->_m_table_external;
    }

    function getM_col_external() {
        return $this->_m_col_external;
    }

    function getM_name() {
        return $this->_m_name;
    }

    function getM_id() {
        return $this->_m_id;
    }

    function getM_placeholder() {
        return $this->_m_placeholder;
    }

    function getM_value() {
        return $this->_m_value;
    }

    function getM_only_read() {
        return $this->_m_only_read;
    }

    function getM_mandatory() {
        return $this->_m_mandatory;
    }

    function getM_selected() {
        return $this->_m_selected;
    }

    function getM_disabled() {
        return $this->_m_disabled;
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

    function setM_db($m_db) {
        $this->_m_db = $m_db;
    }

    function setM_table($m_table) {
        $this->_m_table = $m_table;
    }

    function setM_field_name($m_field_name) {
        $this->_m_field_name = $m_field_name;
    }

    function setM_action($m_action) {
        $this->_m_action = $m_action;
    }

    function setM_label($m_label) {
        $this->_m_label = $m_label;
    }

    function setM_type($m_type) {
        $this->_m_type = $m_type;
    }

    function setM_class($m_class) {
        $this->_m_class = $m_class;
    }

    function setM_table_external($m_table_external) {
        $this->_m_table_external = $m_table_external;
    }

    function setM_col_external($m_col_external) {
        $this->_m_col_external = $m_col_external;
    }

    function setM_name($m_name) {
        $this->_m_name = $m_name;
    }

    function setM_id($m_id) {
        $this->_m_id = $m_id;
    }

    function setM_placeholder($m_placeholder) {
        $this->_m_placeholder = $m_placeholder;
    }

    function setM_value($m_value) {
        $this->_m_value = $m_value;
    }

    function setM_only_read($m_only_read) {
        $this->_m_only_read = $m_only_read;
    }

    function setM_mandatory($m_mandatory) {
        $this->_m_mandatory = $m_mandatory;
    }

    function setM_selected($m_selected) {
        $this->_m_selected = $m_selected;
    }

    function setM_disabled($m_disabled) {
        $this->_m_disabled = $m_disabled;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setMagia($id) {
        $magia = magia_details($id);
        //
        $this->_id = $magia["id"];
        $this->_m_db = $magia["m_db"];
        $this->_m_table = $magia["m_table"];
        $this->_m_field_name = $magia["m_field_name"];
        $this->_m_action = $magia["m_action"];
        $this->_m_label = $magia["m_label"];
        $this->_m_type = $magia["m_type"];
        $this->_m_class = $magia["m_class"];
        $this->_m_table_external = $magia["m_table_external"];
        $this->_m_col_external = $magia["m_col_external"];
        $this->_m_name = $magia["m_name"];
        $this->_m_id = $magia["m_id"];
        $this->_m_placeholder = $magia["m_placeholder"];
        $this->_m_value = $magia["m_value"];
        $this->_m_only_read = $magia["m_only_read"];
        $this->_m_mandatory = $magia["m_mandatory"];
        $this->_m_selected = $magia["m_selected"];
        $this->_m_disabled = $magia["m_disabled"];
        $this->_order_by = $magia["order_by"];
        $this->_status = $magia["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_list($start, $limit);
    }

    function details($id) {
        return magia_details($id);
    }

    function delete($id) {
        return magia_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return magia_is_id($id);
    }

    function is_m_db($m_db) {
        return magia_is_m_db($m_db);
    }

    function is_m_table($m_table) {
        return magia_is_m_table($m_table);
    }

    function is_m_field_name($m_field_name) {
        return magia_is_m_field_name($m_field_name);
    }

    function is_m_action($m_action) {
        return magia_is_m_action($m_action);
    }

    function is_m_label($m_label) {
        return magia_is_m_label($m_label);
    }

    function is_m_type($m_type) {
        return magia_is_m_type($m_type);
    }

    function is_m_class($m_class) {
        return magia_is_m_class($m_class);
    }

    function is_m_table_external($m_table_external) {
        return magia_is_m_table_external($m_table_external);
    }

    function is_m_col_external($m_col_external) {
        return magia_is_m_col_external($m_col_external);
    }

    function is_m_name($m_name) {
        return magia_is_m_name($m_name);
    }

    function is_m_id($m_id) {
        return magia_is_m_id($m_id);
    }

    function is_m_placeholder($m_placeholder) {
        return magia_is_m_placeholder($m_placeholder);
    }

    function is_m_value($m_value) {
        return magia_is_m_value($m_value);
    }

    function is_m_only_read($m_only_read) {
        return magia_is_m_only_read($m_only_read);
    }

    function is_m_mandatory($m_mandatory) {
        return magia_is_m_mandatory($m_mandatory);
    }

    function is_m_selected($m_selected) {
        return magia_is_m_selected($m_selected);
    }

    function is_m_disabled($m_disabled) {
        return magia_is_m_disabled($m_disabled);
    }

    function is_order_by($order_by) {
        return magia_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_is_status($status);
    }
}
