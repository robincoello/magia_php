<?php

// panels
// Date: 2024-03-18    
################################################################################

class Panels {

    /**
     * id
     */
    public $_id;

    /**
     * controller
     */
    public $_controller;

    /**
     * action
     */
    public $_action;

    /**
     * name
     */
    public $_name;

    /**
     * panel
     */
    public $_panel;

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

    function getController() {
        return $this->_controller;
    }

    function getAction() {
        return $this->_action;
    }

    function getName() {
        return $this->_name;
    }

    function getPanel() {
        return $this->_panel;
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

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setAction($action) {
        $this->_action = $action;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setPanel($panel) {
        $this->_panel = $panel;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setPanels($id) {
        $panels = panels_details($id);
        //
        $this->_id = $panels["id"];
        $this->_controller = $panels["controller"];
        $this->_action = $panels["action"];
        $this->_name = $panels["name"];
        $this->_panel = $panels["panel"];
        $this->_order_by = $panels["order_by"];
        $this->_status = $panels["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return panels_field_id($field, $id);
    }

    function field_code($field, $code) {
        return panels_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return panels_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return panels_list($start, $limit);
    }

    function details($id) {
        return panels_details($id);
    }

    function delete($id) {
        return panels_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return panels_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return panels_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return panels_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return panels_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return panels_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return panels_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return panels_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return panels_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return panels_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "controller":
                return controllers_field_id("controller", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return panels_is_id($id);
    }

    function is_controller($controller) {
        return panels_is_controller($controller);
    }

    function is_action($action) {
        return panels_is_action($action);
    }

    function is_name($name) {
        return panels_is_name($name);
    }

    function is_panel($panel) {
        return panels_is_panel($panel);
    }

    function is_order_by($order_by) {
        return panels_is_order_by($order_by);
    }

    function is_status($status) {
        return panels_is_status($status);
    }
}
