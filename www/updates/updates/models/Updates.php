<?php

// updates
// Date: 2024-01-19    
################################################################################

class Updates {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * date
     */
    public $_date;

    /**
     * version
     */
    public $_version;

    /**
     * name
     */
    public $_name;

    /**
     * description
     */
    public $_description;

    /**
     * code_install
     */
    public $_code_install;

    /**
     * code_uninstall
     */
    public $_code_uninstall;

    /**
     * code_check
     */
    public $_code_check;

    /**
     * installed
     */
    public $_installed;

    /**
     * pass
     */
    public $_pass;

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

    function getDate() {
        return $this->_date;
    }

    function getVersion() {
        return $this->_version;
    }

    function getName() {
        return $this->_name;
    }

    function getDescription() {
        return $this->_description;
    }

    function getCode_install() {
        return $this->_code_install;
    }

    function getCode_uninstall() {
        return $this->_code_uninstall;
    }

    function getCode_check() {
        return $this->_code_check;
    }

    function getInstalled() {
        return $this->_installed;
    }

    function getPass() {
        return $this->_pass;
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

    function setDate($date) {
        $this->_date = $date;
    }

    function setVersion($version) {
        $this->_version = $version;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setCode_install($code_install) {
        $this->_code_install = $code_install;
    }

    function setCode_uninstall($code_uninstall) {
        $this->_code_uninstall = $code_uninstall;
    }

    function setCode_check($code_check) {
        $this->_code_check = $code_check;
    }

    function setInstalled($installed) {
        $this->_installed = $installed;
    }

    function setPass($pass) {
        $this->_pass = $pass;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setUpdates($id) {
        $updates = updates_details($id);
        //
        $this->_id = $updates["id"];
        $this->_code = $updates["code"];
        $this->_date = $updates["date"];
        $this->_version = $updates["version"];
        $this->_name = $updates["name"];
        $this->_description = $updates["description"];
        $this->_code_install = $updates["code_install"];
        $this->_code_uninstall = $updates["code_uninstall"];
        $this->_code_check = $updates["code_check"];
        $this->_installed = $updates["installed"];
        $this->_pass = $updates["pass"];
        $this->_order_by = $updates["order_by"];
        $this->_status = $updates["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return updates_field_id($field, $id);
    }

    function field_code($field, $code) {
        return updates_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return updates_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return updates_list($start, $limit);
    }

    function details($id) {
        return updates_details($id);
    }

    function delete($id) {
        return updates_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return updates_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return updates_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return updates_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return updates_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return updates_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return updates_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return updates_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return updates_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return updates_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return updates_is_id($id);
    }

    function is_code($code) {
        return updates_is_code($code);
    }

    function is_date($date) {
        return updates_is_date($date);
    }

    function is_version($version) {
        return updates_is_version($version);
    }

    function is_name($name) {
        return updates_is_name($name);
    }

    function is_description($description) {
        return updates_is_description($description);
    }

    function is_code_install($code_install) {
        return updates_is_code_install($code_install);
    }

    function is_code_uninstall($code_uninstall) {
        return updates_is_code_uninstall($code_uninstall);
    }

    function is_code_check($code_check) {
        return updates_is_code_check($code_check);
    }

    function is_installed($installed) {
        return updates_is_installed($installed);
    }

    function is_pass($pass) {
        return updates_is_pass($pass);
    }

    function is_order_by($order_by) {
        return updates_is_order_by($order_by);
    }

    function is_status($status) {
        return updates_is_status($status);
    }
}
