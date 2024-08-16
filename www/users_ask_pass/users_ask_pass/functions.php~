<?php

// plugin = users_ask_pass
// creation date : 
// 
// 
function users_ask_pass_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM users_ask_pass WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function users_ask_pass_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM users_ask_pass WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function users_ask_pass_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM users_ask_pass ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function users_ask_pass_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM users_ask_pass WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function users_ask_pass_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM users_ask_pass WHERE id=? ");
    $req->execute(array($id));
}

function users_ask_pass_edit($id, $contact_id, $code, $date, $status) {

    global $db;
    $req = $db->prepare(" UPDATE users_ask_pass SET "
            . "contact_id=:contact_id , "
            . "code=:code , "
            . "date=:date , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "contact_id" => $contact_id, "code" => $code, "date" => $date, "status" => $status,
    ));
}

function users_ask_pass_add($contact_id, $code, $date, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `users_ask_pass` ( `id` ,   `contact_id` ,   `code` ,   `date` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :code ,  :date ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "code" => $code,
        "date" => $date,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function users_ask_pass_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM users_ask_pass 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR code like :txt
OR date like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function users_ask_pass_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (users_ask_pass_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function users_ask_pass_is_id($id) {
    return true;
}

function users_ask_pass_is_contact_id($contact_id) {
    return true;
}

function users_ask_pass_is_code($code) {
    return true;
}

function users_ask_pass_is_date($date) {
    return true;
}

function users_ask_pass_is_status($status) {
    return true;
}

/**
 * Select el ultimo registrado
 * @global type $db
 * @param type $email
 * @param type $code
 * @return type
 */
function users_ask_pass_check_code($contact_id, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT MAX(`id`) FROM `users_ask_pass` 
        WHERE contact_id=:contact_id AND code = :code AND status=:status
                           
");
    $req->execute(array(
        "contact_id" => $contact_id,
        "code" => $code,
        "status" => 0
    ));
    $data = $req->fetch();
    return $data[0];
}

function users_ask_pass_check_time($contact_id, $code) {
    global $db;
    $data = null;
    //$req = $db->prepare("SELECT contact_id FROM users_ask_pass WHERE login =:login AND code = :code AND status =0");
    $req = $db->prepare(" SELECT TIMESTAMPDIFF(MINUTE, date, NOW()) FROM users_ask_pass WHERE contact_id =:contact_id AND code = :code AND status =0 ");
    $req->execute(array(
        "contact_id" => $contact_id,
        "code" => $code
    ));
    $data = $req->fetch();
    return $data[0];
}

function users_ask_pass_change_status($code, $status) {
    global $db;
    $req = $db->prepare('UPDATE `users_ask_pass` SET `status`=:status WHERE code=:code');
    $req->execute(array(
        'code' => $code,
        'status' => $status
    ));
}
