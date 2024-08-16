<?php

// plugin = user_options
// creation date : 2024-03-14
// 
// 
function user_options_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `user_options` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `user_options` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `user_options` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `user_id`,  `option`,  `data`,  `order_by`,  `status`   
    FROM `user_options` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function user_options_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `user_id`,  `option`,  `data`,  `order_by`,  `status`   
    FROM `user_options` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function user_options_edit($id, $user_id, $option, $data, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `user_id` =:user_id, `option` =:option, `data` =:data, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "user_id" => $user_id,
        "option" => $option,
        "data" => $data,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function user_options_add($user_id, $option, $data, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `user_options` ( `id` ,   `user_id` ,   `option` ,   `data` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :user_id ,  :option ,  :data ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "user_id" => $user_id,
        "option" => $option,
        "data" => $data,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function user_options_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `user_id`,  `option`,  `data`,  `order_by`,  `status`    
            FROM `user_options` 
            WHERE `id` = :txt OR `id` like :txt
OR `user_id` like :txt
OR `option` like :txt
OR `data` like :txt
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

function user_options_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (user_options_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function user_options_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `user_options` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function user_options_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `user_id`,  `option`,  `data`,  `order_by`,  `status`    FROM `user_options` 
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

function user_options_db_show_col_from_table($c) {
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

//
function user_options_db_col_list_from_table($c) {
    $list = array();
    foreach (user_options_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function user_options_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function user_options_update_user_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `user_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function user_options_update_option($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `option`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//function user_options_update_data($id, $new_data) {
//
//    global $db;
//    $req = $db->prepare(" UPDATE `user_options` SET `data`=:new_data WHERE id=:id ");
//    $req->execute(array(
//        "id" => $id,
//        "new_data" => $new_data,
//    ));
//}
//
function user_options_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function user_options_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `user_options` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function user_options_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            user_options_update_id($id, $new_data);
            break;

        case "user_id":
            user_options_update_user_id($id, $new_data);
            break;

        case "option":
            user_options_update_option($id, $new_data);
            break;

        case "data":
            user_options_update_data($id, $new_data);
            break;

        case "order_by":
            user_options_update_order_by($id, $new_data);
            break;

        case "status":
            user_options_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function user_options_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `user_options` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/user_options/functions.php
// and comment here (this function)
function user_options_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function user_options_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `user_options` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_exists_user_id($user_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `user_id` FROM `user_options` WHERE   `user_id` = ?");
    $req->execute(array($user_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_exists_option($option) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `option` FROM `user_options` WHERE   `option` = ?");
    $req->execute(array($option));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_exists_data($data) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `data` FROM `user_options` WHERE   `data` = ?");
    $req->execute(array($data));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `user_options` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function user_options_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `user_options` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function user_options_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function user_options_is_user_id($user_id) {
    return true;
}

function user_options_is_option($option) {
    return true;
}

function user_options_is_data($data) {
    return true;
}

function user_options_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function user_options_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function user_options_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, user_options_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function user_options_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (user_options_is_id($value)) ? true : false;
            break;
        case "user_id":
            $is = (user_options_is_user_id($value)) ? true : false;
            break;
        case "option":
            $is = (user_options_is_option($value)) ? true : false;
            break;
        case "data":
            $is = (user_options_is_data($value)) ? true : false;
            break;
        case "order_by":
            $is = (user_options_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (user_options_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//
//
//        
################################################################################
################################################################################
################################################################################
