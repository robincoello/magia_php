<?php

class JSON {

    //public $_id;
    public $_factux = array(
        "version" => "1",
        "url" => "factux.be"
    );
    public $_document;
    public $_reciver;
    public $_sender;

    function __construct($json) {

        ($data = json_decode($json, true));

        $this->_id = magia_uniqid();

        $this->_document = new Invoices($data['_id']);

        $this->_reciver = New Contacts($data['_sender']['_id']);

        $this->_sender = New Contacts($data['_client']['_id']);
    }

    function getFactux() {
        return $this->_factux;
    }

    function getDoc() {
        return $this->_document;
    }

    function getReciver() {
        return $this->_reciver;
    }

    function getSender() {
        return $this->_sender;
    }
}
