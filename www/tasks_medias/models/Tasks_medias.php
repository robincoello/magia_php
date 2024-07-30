<?php

// tasks_medias
// Date: 2024-04-28    
################################################################################

class Tasks_medias {

    /**
     * id
     */
    public $_id;

    /**
     * task_id
     */
    public $_task_id;

    /**
     * type
     */
    public $_type;

    /**
     * url
     */
    public $_url;

    /**
     * description
     */
    public $_description;

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

    function getTask_id() {
        return $this->_task_id;
    }

    function getType() {
        return $this->_type;
    }

    function getUrl() {
        return $this->_url;
    }

    function getDescription() {
        return $this->_description;
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

    function setTask_id($task_id) {
        $this->_task_id = $task_id;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setTasks_medias($id) {
        $tasks_medias = tasks_medias_details($id);
        //
        $this->_id = $tasks_medias["id"];
        $this->_task_id = $tasks_medias["task_id"];
        $this->_type = $tasks_medias["type"];
        $this->_url = $tasks_medias["url"];
        $this->_description = $tasks_medias["description"];
        $this->_order_by = $tasks_medias["order_by"];
        $this->_status = $tasks_medias["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tasks_medias_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tasks_medias_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tasks_medias_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tasks_medias_list($start, $limit);
    }

    function details($id) {
        return tasks_medias_details($id);
    }

    function delete($id) {
        return tasks_medias_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_medias_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_medias_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tasks_medias_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tasks_medias_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tasks_medias_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tasks_medias_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tasks_medias_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tasks_medias_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tasks_medias_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "task_id":
                return tasks_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return tasks_medias_is_id($id);
    }

    function is_task_id($task_id) {
        return tasks_medias_is_task_id($task_id);
    }

    function is_type($type) {
        return tasks_medias_is_type($type);
    }

    function is_url($url) {
        return tasks_medias_is_url($url);
    }

    function is_description($description) {
        return tasks_medias_is_description($description);
    }

    function is_order_by($order_by) {
        return tasks_medias_is_order_by($order_by);
    }

    function is_status($status) {
        return tasks_medias_is_status($status);
    }
}
