<?php

################################################################################

class Users {

    public $_id;
    public $_contact_id;
    public $_language;
    public $_rol;
    public $_login;
    public $_password;
    public $_email;
    public $_code;
    public $_status;

    function __construct($id) {
        $users = users_details($id);
        //
        $this->_id = $users["id"];
        $this->_contact_id = $users["contact_id"];
        $this->_language = $users["language"];
        $this->_rol = $users["rol"];
        $this->_login = $users["login"];
        $this->_password = $users["password"];
        $this->_email = $users["email"];
        $this->_code = $users["code"];
        $this->_status = $users["status"];
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getLanguage() {
        return $this->_language;
    }

    function getRol() {
        return $this->_rol;
    }

    function getLogin() {
        return $this->_login;
    }

    function getPassword() {
        return $this->_password;
    }

    function getEmail() {
        return $this->_email;
    }

    function getCode() {
        return $this->_code;
    }

    function getStatus() {
        return $this->_status;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setLanguage($language) {
        $this->_language = $language;
    }

    function setRol($rol) {
        $this->_rol = $rol;
    }

    function setLogin($login) {
        $this->_login = $login;
    }

    function setPassword($password) {
        $this->_password = $password;
    }

    function setEmail($email) {
        $this->_email = $email;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setStatus($status) {
        $this->_status = $status;
    }
}

################################################################################
