<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */

/**
 * Lista de paises
 * @global type $db
 * @global type $u_id
 * @return type
 */
function xxxcountries_list() {
    global $db, $u_id;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM countries   ");
    $req->execute(array(
        'limit' => "$limit"
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Entrega el nombre del pais segun el codigo que se le pase
 * @global type $db
 * @global type $u_id
 * @param type $code
 * @return type
 */
function countries_name($code) {
    global $db;

//    $data = null;

    if (!isset($code) || $code == null || $code == '') {
        return null;
    }

    $req = $db->prepare("SELECT countryName FROM countries WHERE countryCode=:code   ");
    $req->execute(array(
        'code' => "$code"
    ));
    $data = $req->fetch();
    return $data[0] ?? false;
}
