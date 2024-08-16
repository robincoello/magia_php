<?php

/**
 * 
 * @global type $db
 * @param type $field
 * @param type $id
 * @return type
 */
function _content_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _content WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _content_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _content WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _content_list($start = 0, $limit = 99999) {
    global $db;

    $sql = "SELECT * FROM `_content` ORDER BY frase  Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();

    return $data;
}

function _content_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _content WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _content_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `_content` WHERE id=? ");
    $req->execute(array($id));
}

function _content_edit($id, $frase, $contexto) {

    global $db;
    $req = $db->prepare(" UPDATE _content SET "
            . "frase=:frase , "
            . "contexto=:contexto  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "frase" => $frase,
        "contexto" => $contexto,
    ));
}

function _content_add($frase, $contexto) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_content` ( `id` ,   `frase` ,   `contexto`   )
                                       VALUES  (:id ,  :frase ,  :contexto   ) ");

    $req->execute(array(
        "id" => null,
        "frase" => $frase,
        "contexto" => $contexto
            )
    );

    return $db->lastInsertId();
}

function _content_search($txt, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM _content 
        WHERE 
        id like :txt
        OR frase like :txt
        OR contexto like :txt
        Limit :limit OFFSET :start          
";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _content_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (_content_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function _content_is_id($id) {
    return true;
}

function _content_is_frase($frase) {
    return true;
}

function _content_is_contexto($contexto) {
    return true;
}

/**
 * Devuelve el total de frases que esta en la tabla _content
 * @package magia
 * @subpackage _content
 * @category name
 * @global type $db conection a la DB
 * @return type int con el total 
 */
function _content_total_content() {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT COUNT(*) FROM _content ");
    $req->execute(array(
            //"frase" => $frase
    ));
    $data = $req->fetch();
    return intval($data[0]);
}

/**
 * 
 * @package magia
 * @subpackage _content 
 * @global type $db
 * @param type $frase
 * @return type
 */
function _content_by_frase($frase) {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT * FROM _content WHERE frase = :frase ");
    $req->execute(array(
        "frase" => $frase
    ));
    $data = $req->fetch();
    return isset($data['frase']) ? $data['frase'] : false;
}

/**
 * 
 * @global type $db
 * @param type $frase
 * @return type
 */
function _content_id_by_frase($frase) {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT id FROM _content WHERE frase = :frase ");
    $req->execute(array(
        "frase" => $frase
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Busca contenido qu no tenga traduccion
 * @global type $db
 * @param type $lang
 * @return type
 */
function _content_search_hasNotTranslation($lang, $start = 0, $limit = 10) {
    global $db;
    $data = null;
    $query = $db->prepare("
            SELECT * 
            FROM `_content` 
            WHERE `frase` NOT IN 
            (SELECT content FROM `_translations` WHERE `language` =:lang ) 
        ORDER BY frase DESC  Limit :limit OFFSET :start ");
    $query->bindValue(':lang', $lang, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

/**
 * Busca contenido para ser exportado
 * @global type $db
 * @param type $lang
 * @return type
 */
function _content_search_exportToTranslate($lang, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT id, frase, contexto FROM `_content` WHERE id NOT IN (SELECT content_id FROM `_translations` WHERE `language` =:lang ) Limit :limit OFFSET :start  ");
    //$req = $db->prepare("SELECT * FROM `_translations` WHERE `language` LIKE :lang ORDER BY `content_id` ASC LIMIT 2300,2600");
    $req->execute(array(
        "lang" => $lang,
        "start" => $start,
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _content_search_exportLanguage($languageFrom, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `_translations` WHERE `language` =:lang  Limit :limit OFFSET :start  ");
    //$req = $db->prepare("SELECT id, frase, contexto FROM `_content` WHERE id IN (SELECT content_id FROM `_translations` WHERE `language` =:lang )  ");
    //$req = $db->prepare("SELECT * FROM `_translations` WHERE `language` LIKE :lang ORDER BY `content_id` ASC LIMIT 2300,2600");
    $req->execute(array(
        "lang" => $languageFrom,
        "start" => $start,
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _content_exportLanguage($lang, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "
            SELECT *
            FROM `_translations` as t 
            INNER JOIN `_content` as c
            ON t.content = c.frase
            WHERE t.`language` =:lang ORDER BY t.id Limit :limit OFFSET :start ");

    $req->execute(array(
        "lang" => $lang,
        "start" => $start,
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _content_search_starts_with($l, $start = 0, $limit = 999) {
    global $db;

    $sql = "
        SELECT id, frase, contexto 
        FROM `_content` 
        WHERE `frase` like :l 
        ORDER BY frase 
         ";

    $req = $db->prepare($sql);
    $req->execute(array(
        "l" => "$l%",
    ));
    $data = $req->fetchall();
    return $data;
}
