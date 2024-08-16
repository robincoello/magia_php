<?php

// plugin = _options
// creation date : 2023-02-16
// 
// 
function _options_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `_options` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _options_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `_options` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _options_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `_options` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _options_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `_options` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _options_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM `_options` WHERE `id` = ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _options_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `_options` WHERE `id` =? ");
    $req->execute(array($id));
}

function _options_edit($id, $option, $data, $group, $controller, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `_options` SET `option` =:option, `data` =:data, `group` =:group, `controller` =:controller, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "option" => $option,
        "data" => $data,
        "group" => $group,
        "controller" => $controller,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function _options_add($option, $data, $group, $controller, $order_by = 1, $status = 1) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_options` ( `id`, `option`, `data`, `group`, `controller`, `order_by`, `status`   )
                                         VALUES  (:id ,  :option,  :data,  :group,  :controller,  :order_by,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "option" => $option,
        "data" => $data,
        "group" => $group,
        "controller" => $controller,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function _options_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `_options` 
            WHERE `id` = :txt OR `id` like :txt
OR `option` like :txt
OR `data` like :txt
OR `group` like :txt
OR `controller` like :txt
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

function _options_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (_options_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function _options_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `_options` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function _options_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `_options` 
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

function _options_db_show_col_from_table($c) {
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

function _options_db_col_list_from_table($c) {
    $list = array();
    foreach (_options_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

function _options_is_id($id) {
    return true;
}

function _options_is_option($option) {
    return true;
}

function _options_is_description($description) {
    return true;
}

function _options_is_data($data) {
    return true;
}

function _options_is_group($group) {
    return true;
}

function _options_is_controller($controller) {
    return true;
}

function _options_is_order_by($order_by) {
    return true;
}

function _options_is_status($status) {
    return true;
}

################################################################################
################################################################################
################################################################################

function _options_option($option) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `data` FROM `_options` WHERE `option` = :option ");
    $req->execute(array(
        "option" => $option
    ));
    $data = $req->fetch();
    return $data[0] ?? null;
}



function _options_update($option, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_options` SET `data` = :data, `group` = 123456789 WHERE `option` = :option  ");
    $req->execute(array(
        "option" => $option,
        "data" => $new_data
    ));
}

// si no existe lo crea
function _options_push($option, $new_data, $controller = null) {

    // si existe lo pone al dia
    if (_options_exist($option)) {
        //echo "$option " ;
        _options_update($option, $new_data);
    } else { // si no lo crea
//        _options_add($option, $description, $data, $group, $controller);
        _options_add($option, $new_data, 987654321, $controller);
//        _options_add($option, $new_data, $new_data, $group);
    }
}

function _options_list_groups() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT `group` FROM `_options` GROUP BY `group`  ");

    $req->execute(array(
            //   
    ));
    $data = $req->fetchall();
    return $data;
}

function _options_search_by_group($group, $start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT `id`, `option` , `data` , `group`  FROM `_options` WHERE `group` = :group  ORDER BY `group` Limit :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':group', (int) $group, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _options_exist($option) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT id FROM `_options` WHERE  `option` = :option
            ");
    $req->execute(array(
        "option" => $option
    ));
    $data = $req->fetch();
    return $data;
}
