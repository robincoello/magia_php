<?php

// tasks
// Date: 2024-04-11    
################################################################################

class Tasks {

    /**
     * id
     */
    public $_id;

    /**
     * category_id
     */
    public $_category_id;

    /**
     * contact_id
     */
    public $_contact_id;

    /**
     * title
     */
    public $_title;

    /**
     * description
     */
    public $_description;

    /**
     * controller
     */
    public $_controller;

    /**
     * doc_id
     */
    public $_doc_id;

    /**
     * date_registre
     */
    public $_date_registre;

    /**
     * date_update
     */
    public $_date_update;

    /**
     * color
     */
    public $_color;

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

    function getCategory_id() {
        return $this->_category_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getTitle() {
        return $this->_title;
    }

    function getDescription() {
        return $this->_description;
    }

    function getController() {
        return $this->_controller;
    }

    function getDoc_id() {
        return $this->_doc_id;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getDate_update() {
        return $this->_date_update;
    }

    function getColor() {
        return $this->_color;
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

    function setCategory_id($category_id) {
        $this->_category_id = $category_id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setDoc_id($doc_id) {
        $this->_doc_id = $doc_id;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setDate_update($date_update) {
        $this->_date_update = $date_update;
    }

    function setColor($color) {
        $this->_color = $color;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setTasks($id) {
        $tasks = tasks_details($id);
        //
        $this->_id = $tasks["id"];
        $this->_category_id = $tasks["category_id"];
        $this->_contact_id = $tasks["contact_id"];
        $this->_title = $tasks["title"];
        $this->_description = $tasks["description"];
        $this->_controller = $tasks["controller"];
        $this->_doc_id = $tasks["doc_id"];
        $this->_date_registre = $tasks["date_registre"];
        $this->_date_update = $tasks["date_update"];
        $this->_color = $tasks["color"];
        $this->_order_by = $tasks["order_by"];
        $this->_status = $tasks["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tasks_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tasks_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tasks_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tasks_list($start, $limit);
    }

    function details($id) {
        return tasks_details($id);
    }

    function delete($id) {
        return tasks_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tasks_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tasks_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tasks_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tasks_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tasks_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tasks_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tasks_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "category_id":
                return tasks_categories_field_id("id", $value);
                break;
            case "contact_id":
                return contacts_field_id("id", $value);
                break;
            case "controller":
                return controllers_field_id("controller", $value);
                break;
            case "status":
                return tasks_status_field_id("code", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return tasks_is_id($id);
    }

    function is_category_id($category_id) {
        return tasks_is_category_id($category_id);
    }

    function is_contact_id($contact_id) {
        return tasks_is_contact_id($contact_id);
    }

    function is_title($title) {
        return tasks_is_title($title);
    }

    function is_description($description) {
        return tasks_is_description($description);
    }

    function is_controller($controller) {
        return tasks_is_controller($controller);
    }

    function is_doc_id($doc_id) {
        return tasks_is_doc_id($doc_id);
    }

    function is_date_registre($date_registre) {
        return tasks_is_date_registre($date_registre);
    }

    function is_date_update($date_update) {
        return tasks_is_date_update($date_update);
    }

    function is_color($color) {
        return tasks_is_color($color);
    }

    function is_order_by($order_by) {
        return tasks_is_order_by($order_by);
    }

    function is_status($status) {
        return tasks_is_status($status);
    }
}
