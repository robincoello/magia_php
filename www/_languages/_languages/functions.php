<?php

// https://omegat.sourceforge.io/manual-standard/es/appendix.languages.html
// https://iso639-3.sil.org/code_tables/639/data
// 
// http://utils.mucattu.com/iso_639-1.html
// 
// http://utils.mucattu.com/iso_639-1.html
// 
// 
// plugin = _languages
// creation date : 
// 
// 
function _languages_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _languages WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _languages_field_language($field, $language) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `_languages` WHERE `language` = ?");
    $req->execute(array(
        $language
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function _languages_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _languages WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _languages_list() {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM _languages  ORDER BY order_by, name, id DESC   ");
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function _languages_list_by_status($status) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM _languages WHERE status = :status ORDER BY order_by, name, id DESC  ");
    $req->execute(array(
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function _languages_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _languages WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _languages_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _languages WHERE id=? ");
    $req->execute(array($id));
}

function _languages_edit($id, $language, $name, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE _languages SET "
            . "language=:language , "
            . "name=:name , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "language" => $language, "name" => $name, "order_by" => $order_by, "status" => $status,
    ));
}

function _languages_add($language, $name, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_languages` ( `id` ,   `language` ,   `name` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :language ,  :name ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "language" => $language,
        "name" => $name,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function _languages_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _languages 
    
            WHERE id like :txt OR id like :txt
OR language like :txt
OR name like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function _languages_search_by_language($lang) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM `_languages` 
            WHERE `language` = :txt OR `name` = :txt            
                           
");
    $req->execute(array(
        "txt" => $lang
    ));
    $data = $req->fetchall();
    return $data;
}

//
//
//
//
function _languages_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (_languages_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function _languages_is_id($id) {
    return true;
}

function _languages_is_name($name) {
    return true;
}

function _languages_is_order_by($order_by) {
    return true;
}

function _languages_is_status($status) {
    return true;
}

#########################################################
# Copyright © 2008 Darrin Yeager                        #
# https://www.dyeager.org/                               #
# Licensed under BSD license.                           #
#   https://www.dyeager.org/downloads/license-bsd.txt    #
#########################################################

function getDefaultLanguage() {
    if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
        return parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
    else
        return parseDefaultLanguage(NULL);
}

function parseDefaultLanguage($http_accept, $deflang = "en") {
    if (isset($http_accept) && strlen($http_accept) > 1) {
        # Split possible languages into array
        $x = explode(",", $http_accept);
        foreach ($x as $val) {
            #check for q-value and create associative array. No q-value means 1 by rule
            if (preg_match("/(.*);q=([0-1]{0,1}.\d{0,4})/i", $val, $matches))
                $lang[$matches[1]] = (float) $matches[2];
            else
                $lang[$val] = 1.0;
        }

        #return default language (highest q-value)
        $qval = 0.0;
        foreach ($lang as $key => $value) {
            if ($value > $qval) {
                $qval = (float) $value;
                $deflang = $key;
            }
        }
    }
    return strtolower($deflang);
}
