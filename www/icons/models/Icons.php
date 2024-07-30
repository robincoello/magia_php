<?php

// icons
// Date: 2024-04-14    
################################################################################

class Icons {

    /**
     * id
     */
    public $_id;

    /**
     * provider
     */
    public $_provider;

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

    function getProvider() {
        return $this->_provider;
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

    function setProvider($provider) {
        $this->_provider = $provider;
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

    function setIcons($id) {
        $icons = icons_details($id);
        //
        $this->_id = $icons["id"];
        $this->_provider = $icons["provider"];
        $this->_icon = $icons["icon"];
        $this->_order_by = $icons["order_by"];
        $this->_status = $icons["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return icons_field_id($field, $id);
    }

    function field_code($field, $code) {
        return icons_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return icons_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return icons_list($start, $limit);
    }

    function details($id) {
        return icons_details($id);
    }

    function delete($id) {
        return icons_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return icons_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return icons_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return icons_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return icons_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return icons_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return icons_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return icons_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return icons_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return icons_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return icons_is_id($id);
    }

    function is_provider($provider) {
        return icons_is_provider($provider);
    }

    function is_icon($icon) {
        return icons_is_icon($icon);
    }

    function is_order_by($order_by) {
        return icons_is_order_by($order_by);
    }

    function is_status($status) {
        return icons_is_status($status);
    }
}
