<?php

// plugin = directory_names
// creation date : 2023-02-16
// 
// 
function directory_names_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `directory_names` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_names_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `directory_names` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_names_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `directory_names` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_names_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `directory_names` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_names_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM `directory_names` WHERE `id` = ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function directory_names_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `directory_names` WHERE `id` =? ");
    $req->execute(array($id));
}

function directory_names_edit($id, $name, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `name` =:name, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "name" => $name,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function directory_names_add($name, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `directory_names` ( `id` ,   `name` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "name" => $name,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function directory_names_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `directory_names` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_names_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (directory_names_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function directory_names_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `directory_names` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function directory_names_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `directory_names` 
            WHERE `$field` = '$txt' 
     ORDER BY `order_by` DESC, `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_names_db_show_col_from_table($c) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM `$c`
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}

function directory_names_db_col_list_from_table($c) {
    $list = array();
    foreach (directory_names_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

function directory_names_is_id($id) {
    return true;
}

function directory_names_is_name($name) {
    return true;
}

function directory_names_is_order_by($order_by) {
    return true;
}

function directory_names_is_status($status) {
    return true;
}

################################################################################
################################################################################
################################################################################
