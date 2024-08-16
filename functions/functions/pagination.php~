<?php

/**
 * 
 */
class Pagination {

    public $_page = 0;
    public $_total_items;
    public $_items_by_page;
    public $_start = 0;
    public $_limit;
    public $_total_pages = null;
    public $_errors = array();
    public $_url = "index.php";
    public $_controller = ""; // $c controller

    // public function __construct($page, $config_xxxx_pagination_items_limit, $function) {
    public function __construct($page, $function) {

        global $c;

        $this->setPage($page);
        $this->setController($c);
        $this->setItemsByPage();
        $this->setTotalItems($function);
        $this->setTotalpages();
        $this->setStart();
        $this->setLimit();
        $this->setUrl("index.php?c=$c");
    }

////////////////////////////////////////////////////////////////////////////////
    function getPage() {
        return $this->_page;
    }

    function getTotalItems() {
        return $this->_total_items;
    }

    function getItemsByPage() {
        return $this->_items_by_page;
    }

    function getStart() {
        return $this->_start;
    }

    function getLimit() {
        return $this->_limit;
    }

    function getTotalpages() {
        return $this->_total_pages;
    }

    function getErrors() {
        return $this->_errors;
    }

    function getUrl() {
        return $this->_url;
    }

    function getController() {
        return $this->_controller;
    }

///////////////////////////////////////////////////////////////////////////////
    function setPage($page) {
        $this->_page = $page;
    }

    function setTotalItems($function) {

        $totalItems = count($function);

        if ($totalItems) {
            $this->_total_items = $totalItems;
        } else {
            $this->_total_items = 0;
        }
    }

    function setItemsByPage() {

        ///budgets_pagination_items_limit
//        $items_by_page = (int) _options_option('config_' . $this->_controller . '_pagination_items_limit');
        $items_by_page = (int) user_options($this->_controller . '_pagination_items_limit');

        // si existe la paginacion de este controlador
        // sino el por defecto del sistema 

        if ($items_by_page) {
            $this->_items_by_page = $items_by_page;
        } else {
            // se pone como limite la paginacion por defecto del sistema
            $this->_items_by_page = (int) _options_option('system_items_limit');
            // se manda a error 
            array_push($this->_errors, 'config_' . $this->_controller . '_pagination_items_limit  not config');
            array_push($this->_errors, 'items_by_page by default _options_option("system_items_limit") ');
        }
    }

    function setStart() {
        $this->_start = ($this->_items_by_page * ($this->_page - 1));
    }

    function setLimit() {
        $this->_limit = $this->_items_by_page;
    }

    function setTotalpages() {
        $this->_total_pages = (int) ceil($this->_total_items / $this->_items_by_page);
    }

    function setErrors($error) {
        array_push($this->_errors, $error);
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setController($c) {
        // si el controlador no es valido, 
        // se manda 

        if (controllers_is_controller($c)) {
            $this->_controller = $c;
        } else {
            array_push($this->_errors, 'Controller [' . $c . '] is no valid');
        }
    }

    ///////////////////////////////////////////////////////////////////////////

    function createHtml() {
        if ($this) {
            include view("home", 'pagination_m2');
        }
    }
}
