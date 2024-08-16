<?php

// tasks_categories
// Date: 2024-01-19    
################################################################################

class Tasks_categories {

    /**
     * id
     */
    public $_id;

    /**
     * father_id
     */
    public $_father_id;

    /**
     * category
     */
    public $_category;

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

    function getFather_id() {
        return $this->_father_id;
    }

    function getCategory() {
        return $this->_category;
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

    function setFather_id($father_id) {
        $this->_father_id = $father_id;
    }

    function setCategory($category) {
        $this->_category = $category;
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

    function setTasks_categories($id) {
        $tasks_categories = tasks_categories_details($id);
        //
        $this->_id = $tasks_categories["id"];
        $this->_father_id = $tasks_categories["father_id"];
        $this->_category = $tasks_categories["category"];
        $this->_color = $tasks_categories["color"];
        $this->_icon = $tasks_categories["icon"];
        $this->_order_by = $tasks_categories["order_by"];
        $this->_status = $tasks_categories["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tasks_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tasks_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tasks_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tasks_categories_list($start, $limit);
    }

    function details($id) {
        return tasks_categories_details($id);
    }

    function delete($id) {
        return tasks_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tasks_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tasks_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tasks_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tasks_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tasks_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tasks_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tasks_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "father_id":
                return tasks_categories_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return tasks_categories_is_id($id);
    }

    function is_father_id($father_id) {
        return tasks_categories_is_father_id($father_id);
    }

    function is_category($category) {
        return tasks_categories_is_category($category);
    }

    function is_color($color) {
        return tasks_categories_is_color($color);
    }

    function is_icon($icon) {
        return tasks_categories_is_icon($icon);
    }

    function is_order_by($order_by) {
        return tasks_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return tasks_categories_is_status($status);
    }
}
