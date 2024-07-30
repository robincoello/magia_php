<?php

// gallery
// Date: 2024-01-03    
################################################################################

class xxxGallery {

    /**
     * id
     */
    public $_id;

    /**
     * owner_id
     */
    public $_owner_id;

    /**
     * controller
     */
    public $_controller;

    /**
     * doc_id
     */
    public $_doc_id;

    /**
     * name
     */
    public $_name;

    /**
     * title
     */
    public $_title;

    /**
     * description
     */
    public $_description;

    /**
     * alt
     */
    public $_alt;

    /**
     * url
     */
    public $_url;

    /**
     * date_registre
     */
    public $_date_registre;

    /**
     * code
     */
    public $_code;

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

    function getOwner_id() {
        return $this->_owner_id;
    }

    function getController() {
        return $this->_controller;
    }

    function getDoc_id() {
        return $this->_doc_id;
    }

    function getName() {
        return $this->_name;
    }

    function getTitle() {
        return $this->_title;
    }

    function getDescription() {
        return $this->_description;
    }

    function getAlt() {
        return $this->_alt;
    }

    function getUrl() {
        return $this->_url;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getCode() {
        return $this->_code;
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

    function setOwner_id($owner_id) {
        $this->_owner_id = $owner_id;
    }

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setDoc_id($doc_id) {
        $this->_doc_id = $doc_id;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setAlt($alt) {
        $this->_alt = $alt;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setGallery($id) {
        $gallery = gallery_details($id);
        //
        $this->_id = $gallery["id"];
        $this->_owner_id = $gallery["owner_id"];
        $this->_controller = $gallery["controller"];
        $this->_doc_id = $gallery["doc_id"];
        $this->_name = $gallery["name"];
        $this->_title = $gallery["title"];
        $this->_description = $gallery["description"];
        $this->_alt = $gallery["alt"];
        $this->_url = $gallery["url"];
        $this->_date_registre = $gallery["date_registre"];
        $this->_code = $gallery["code"];
        $this->_order_by = $gallery["order_by"];
        $this->_status = $gallery["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return gallery_field_id($field, $id);
    }

    function field_code($field, $code) {
        return gallery_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return gallery_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return gallery_list($start, $limit);
    }

    function details($id) {
        return gallery_details($id);
    }

    function delete($id) {
        return gallery_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return gallery_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return gallery_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return gallery_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return gallery_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return gallery_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return gallery_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return gallery_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return gallery_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return gallery_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "owner_id":
                return contacts_field_id("id", $value);
                break;
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
        return gallery_is_id($id);
    }

    function is_owner_id($owner_id) {
        return gallery_is_owner_id($owner_id);
    }

    function is_controller($controller) {
        return gallery_is_controller($controller);
    }

    function is_doc_id($doc_id) {
        return gallery_is_doc_id($doc_id);
    }

    function is_name($name) {
        return gallery_is_name($name);
    }

    function is_title($title) {
        return gallery_is_title($title);
    }

    function is_description($description) {
        return gallery_is_description($description);
    }

    function is_alt($alt) {
        return gallery_is_alt($alt);
    }

    function is_url($url) {
        return gallery_is_url($url);
    }

    function is_date_registre($date_registre) {
        return gallery_is_date_registre($date_registre);
    }

    function is_code($code) {
        return gallery_is_code($code);
    }

    function is_order_by($order_by) {
        return gallery_is_order_by($order_by);
    }

    function is_status($status) {
        return gallery_is_status($status);
    }
}
