<?php

// plugin = magia
// creation date : 2024-01-23
// 
// 
function magia_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `m_db`,  `m_table`,  `m_field_name`,  `m_action`,  `m_label`,  `m_type`,  `m_class`,  `m_table_external`,  `m_col_external`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `order_by`,  `status`   
    FROM `magia` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function magia_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `m_db`,  `m_table`,  `m_field_name`,  `m_action`,  `m_label`,  `m_type`,  `m_class`,  `m_table_external`,  `m_col_external`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `order_by`,  `status`   
    FROM `magia` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function magia_edit($id, $m_db, $m_table, $m_field_name, $m_action, $m_label, $m_type, $m_class, $m_table_external, $m_col_external, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_db` =:m_db, `m_table` =:m_table, `m_field_name` =:m_field_name, `m_action` =:m_action, `m_label` =:m_label, `m_type` =:m_type, `m_class` =:m_class, `m_table_external` =:m_table_external, `m_col_external` =:m_col_external, `m_name` =:m_name, `m_id` =:m_id, `m_placeholder` =:m_placeholder, `m_value` =:m_value, `m_only_read` =:m_only_read, `m_mandatory` =:m_mandatory, `m_selected` =:m_selected, `m_disabled` =:m_disabled, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "m_db" => $m_db,
        "m_table" => $m_table,
        "m_field_name" => $m_field_name,
        "m_action" => $m_action,
        "m_label" => $m_label,
        "m_type" => $m_type,
        "m_class" => $m_class,
        "m_table_external" => $m_table_external,
        "m_col_external" => $m_col_external,
        "m_name" => $m_name,
        "m_id" => $m_id,
        "m_placeholder" => $m_placeholder,
        "m_value" => $m_value,
        "m_only_read" => $m_only_read,
        "m_mandatory" => $m_mandatory,
        "m_selected" => $m_selected,
        "m_disabled" => $m_disabled,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function magia_add($m_db, $m_table, $m_field_name, $m_action, $m_label, $m_type, $m_class, $m_table_external, $m_col_external, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `magia` ( `id` ,   `m_db` ,   `m_table` ,   `m_field_name` ,   `m_action` ,   `m_label` ,   `m_type` ,   `m_class` ,   `m_table_external` ,   `m_col_external` ,   `m_name` ,   `m_id` ,   `m_placeholder` ,   `m_value` ,   `m_only_read` ,   `m_mandatory` ,   `m_selected` ,   `m_disabled` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :m_db ,  :m_table ,  :m_field_name ,  :m_action ,  :m_label ,  :m_type ,  :m_class ,  :m_table_external ,  :m_col_external ,  :m_name ,  :m_id ,  :m_placeholder ,  :m_value ,  :m_only_read ,  :m_mandatory ,  :m_selected ,  :m_disabled ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "m_db" => $m_db,
        "m_table" => $m_table,
        "m_field_name" => $m_field_name,
        "m_action" => $m_action,
        "m_label" => $m_label,
        "m_type" => $m_type,
        "m_class" => $m_class,
        "m_table_external" => $m_table_external,
        "m_col_external" => $m_col_external,
        "m_name" => $m_name,
        "m_id" => $m_id,
        "m_placeholder" => $m_placeholder,
        "m_value" => $m_value,
        "m_only_read" => $m_only_read,
        "m_mandatory" => $m_mandatory,
        "m_selected" => $m_selected,
        "m_disabled" => $m_disabled,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function magia_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `m_db`,  `m_table`,  `m_field_name`,  `m_action`,  `m_label`,  `m_type`,  `m_class`,  `m_table_external`,  `m_col_external`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `order_by`,  `status`    
            FROM `magia` 
            WHERE `id` = :txt OR `id` like :txt
OR `m_db` like :txt
OR `m_table` like :txt
OR `m_field_name` like :txt
OR `m_action` like :txt
OR `m_label` like :txt
OR `m_type` like :txt
OR `m_class` like :txt
OR `m_table_external` like :txt
OR `m_col_external` like :txt
OR `m_name` like :txt
OR `m_id` like :txt
OR `m_placeholder` like :txt
OR `m_value` like :txt
OR `m_only_read` like :txt
OR `m_mandatory` like :txt
OR `m_selected` like :txt
OR `m_disabled` like :txt
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

function magia_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (magia_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function magia_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `magia` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function magia_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `m_db`,  `m_table`,  `m_field_name`,  `m_action`,  `m_label`,  `m_type`,  `m_class`,  `m_table_external`,  `m_col_external`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `order_by`,  `status`    FROM `magia` 
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

function magia_db_show_col_from_table($c) {
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
function magia_db_col_list_from_table($c) {
    $list = array();
    foreach (magia_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function magia_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_db($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_db`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_table($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_table`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_field_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_field_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_class($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_class`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_table_external($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_table_external`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_col_external($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_col_external`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_placeholder($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_placeholder`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_only_read($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_only_read`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_mandatory($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_mandatory`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_selected($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_selected`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_m_disabled($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `m_disabled`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function magia_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function magia_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            magia_update_id($id, $new_data);
            break;

        case "m_db":
            magia_update_m_db($id, $new_data);
            break;

        case "m_table":
            magia_update_m_table($id, $new_data);
            break;

        case "m_field_name":
            magia_update_m_field_name($id, $new_data);
            break;

        case "m_action":
            magia_update_m_action($id, $new_data);
            break;

        case "m_label":
            magia_update_m_label($id, $new_data);
            break;

        case "m_type":
            magia_update_m_type($id, $new_data);
            break;

        case "m_class":
            magia_update_m_class($id, $new_data);
            break;

        case "m_table_external":
            magia_update_m_table_external($id, $new_data);
            break;

        case "m_col_external":
            magia_update_m_col_external($id, $new_data);
            break;

        case "m_name":
            magia_update_m_name($id, $new_data);
            break;

        case "m_id":
            magia_update_m_id($id, $new_data);
            break;

        case "m_placeholder":
            magia_update_m_placeholder($id, $new_data);
            break;

        case "m_value":
            magia_update_m_value($id, $new_data);
            break;

        case "m_only_read":
            magia_update_m_only_read($id, $new_data);
            break;

        case "m_mandatory":
            magia_update_m_mandatory($id, $new_data);
            break;

        case "m_selected":
            magia_update_m_selected($id, $new_data);
            break;

        case "m_disabled":
            magia_update_m_disabled($id, $new_data);
            break;

        case "order_by":
            magia_update_order_by($id, $new_data);
            break;

        case "status":
            magia_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function magia_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `magia` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/magia/functions.php
// and comment here (this function)
function magia_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function magia_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `magia` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_db($m_db) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_db` FROM `magia` WHERE   `m_db` = ?");
    $req->execute(array($m_db));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_table($m_table) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_table` FROM `magia` WHERE   `m_table` = ?");
    $req->execute(array($m_table));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_field_name($m_field_name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_field_name` FROM `magia` WHERE   `m_field_name` = ?");
    $req->execute(array($m_field_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_action($m_action) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_action` FROM `magia` WHERE   `m_action` = ?");
    $req->execute(array($m_action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_label($m_label) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_label` FROM `magia` WHERE   `m_label` = ?");
    $req->execute(array($m_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_type($m_type) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_type` FROM `magia` WHERE   `m_type` = ?");
    $req->execute(array($m_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_class($m_class) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_class` FROM `magia` WHERE   `m_class` = ?");
    $req->execute(array($m_class));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_table_external($m_table_external) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_table_external` FROM `magia` WHERE   `m_table_external` = ?");
    $req->execute(array($m_table_external));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_col_external($m_col_external) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_col_external` FROM `magia` WHERE   `m_col_external` = ?");
    $req->execute(array($m_col_external));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_name($m_name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_name` FROM `magia` WHERE   `m_name` = ?");
    $req->execute(array($m_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_id($m_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_id` FROM `magia` WHERE   `m_id` = ?");
    $req->execute(array($m_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_placeholder($m_placeholder) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_placeholder` FROM `magia` WHERE   `m_placeholder` = ?");
    $req->execute(array($m_placeholder));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_value($m_value) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_value` FROM `magia` WHERE   `m_value` = ?");
    $req->execute(array($m_value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_only_read($m_only_read) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_only_read` FROM `magia` WHERE   `m_only_read` = ?");
    $req->execute(array($m_only_read));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_mandatory($m_mandatory) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_mandatory` FROM `magia` WHERE   `m_mandatory` = ?");
    $req->execute(array($m_mandatory));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_selected($m_selected) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_selected` FROM `magia` WHERE   `m_selected` = ?");
    $req->execute(array($m_selected));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_m_disabled($m_disabled) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_disabled` FROM `magia` WHERE   `m_disabled` = ?");
    $req->execute(array($m_disabled));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `magia` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function magia_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `magia` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function magia_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function magia_is_m_db($m_db) {
    return true;
}

function magia_is_m_table($m_table) {
    return true;
}

function magia_is_m_field_name($m_field_name) {
    return true;
}

function magia_is_m_action($m_action) {
    return true;
}

function magia_is_m_label($m_label) {
    return true;
}

function magia_is_m_type($m_type) {
    return true;
}

function magia_is_m_class($m_class) {
    return true;
}

function magia_is_m_table_external($m_table_external) {
    return true;
}

function magia_is_m_col_external($m_col_external) {
    return true;
}

function magia_is_m_name($m_name) {
    return true;
}

function magia_is_m_id($m_id) {
    return true;
}

function magia_is_m_placeholder($m_placeholder) {
    return true;
}

function magia_is_m_value($m_value) {
    return true;
}

function magia_is_m_only_read($m_only_read) {
    return true;
}

function magia_is_m_mandatory($m_mandatory) {
    return true;
}

function magia_is_m_selected($m_selected) {
    return true;
}

function magia_is_m_disabled($m_disabled) {
    return true;
}

function magia_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function magia_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function magia_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, magia_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function magia_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (magia_is_id($value)) ? true : false;
            break;
        case "m_db":
            $is = (magia_is_m_db($value)) ? true : false;
            break;
        case "m_table":
            $is = (magia_is_m_table($value)) ? true : false;
            break;
        case "m_field_name":
            $is = (magia_is_m_field_name($value)) ? true : false;
            break;
        case "m_action":
            $is = (magia_is_m_action($value)) ? true : false;
            break;
        case "m_label":
            $is = (magia_is_m_label($value)) ? true : false;
            break;
        case "m_type":
            $is = (magia_is_m_type($value)) ? true : false;
            break;
        case "m_class":
            $is = (magia_is_m_class($value)) ? true : false;
            break;
        case "m_table_external":
            $is = (magia_is_m_table_external($value)) ? true : false;
            break;
        case "m_col_external":
            $is = (magia_is_m_col_external($value)) ? true : false;
            break;
        case "m_name":
            $is = (magia_is_m_name($value)) ? true : false;
            break;
        case "m_id":
            $is = (magia_is_m_id($value)) ? true : false;
            break;
        case "m_placeholder":
            $is = (magia_is_m_placeholder($value)) ? true : false;
            break;
        case "m_value":
            $is = (magia_is_m_value($value)) ? true : false;
            break;
        case "m_only_read":
            $is = (magia_is_m_only_read($value)) ? true : false;
            break;
        case "m_mandatory":
            $is = (magia_is_m_mandatory($value)) ? true : false;
            break;
        case "m_selected":
            $is = (magia_is_m_selected($value)) ? true : false;
            break;
        case "m_disabled":
            $is = (magia_is_m_disabled($value)) ? true : false;
            break;
        case "order_by":
            $is = (magia_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (magia_is_status($value)) ? true : false;
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
