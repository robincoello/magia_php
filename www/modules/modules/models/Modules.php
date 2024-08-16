<?php

// modules
// Date: 2024-01-23    
################################################################################

class Modules {

    /**
     * id
     */
    public $_id;

    /**
     * label
     */
    public $_label;

    /**
     * father
     */
    public $_father;

    /**
     * module
     */
    public $_module;

    /**
     * description
     */
    public $_description;

    /**
     * author
     */
    public $_author;

    /**
     * author_email
     */
    public $_author_email;

    /**
     * url
     */
    public $_url;

    /**
     * version
     */
    public $_version;

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

    function getLabel() {
        return $this->_label;
    }

    function getFather() {
        return $this->_father;
    }

    function getModule() {
        return $this->_module;
    }

    function getDescription() {
        return $this->_description;
    }

    function getAuthor() {
        return $this->_author;
    }

    function getAuthor_email() {
        return $this->_author_email;
    }

    function getUrl() {
        return $this->_url;
    }

    function getVersion() {
        return $this->_version;
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

    function setLabel($label) {
        $this->_label = $label;
    }

    function setFather($father) {
        $this->_father = $father;
    }

    function setModule($module) {
        $this->_module = $module;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setAuthor($author) {
        $this->_author = $author;
    }

    function setAuthor_email($author_email) {
        $this->_author_email = $author_email;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setVersion($version) {
        $this->_version = $version;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setModules($id) {
        $modules = modules_details($id);
        //
        $this->_id = $modules["id"];
        $this->_label = $modules["label"];
        $this->_father = $modules["father"];
        $this->_module = $modules["module"];
        $this->_description = $modules["description"];
        $this->_author = $modules["author"];
        $this->_author_email = $modules["author_email"];
        $this->_url = $modules["url"];
        $this->_version = $modules["version"];
        $this->_order_by = $modules["order_by"];
        $this->_status = $modules["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return modules_field_id($field, $id);
    }

    function field_code($field, $code) {
        return modules_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return modules_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return modules_list($start, $limit);
    }

    function details($id) {
        return modules_details($id);
    }

    function delete($id) {
        return modules_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return modules_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return modules_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return modules_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return modules_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return modules_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return modules_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return modules_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return modules_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return modules_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "father":
                return modules_field_id("module", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return modules_is_id($id);
    }

    function is_label($label) {
        return modules_is_label($label);
    }

    function is_father($father) {
        return modules_is_father($father);
    }

    function is_module($module) {
        return modules_is_module($module);
    }

    function is_description($description) {
        return modules_is_description($description);
    }

    function is_author($author) {
        return modules_is_author($author);
    }

    function is_author_email($author_email) {
        return modules_is_author_email($author_email);
    }

    function is_url($url) {
        return modules_is_url($url);
    }

    function is_version($version) {
        return modules_is_version($version);
    }

    function is_order_by($order_by) {
        return modules_is_order_by($order_by);
    }

    function is_status($status) {
        return modules_is_status($status);
    }
}
