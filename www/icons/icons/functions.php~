<?php

// plugin = icons
// creation date : 2024-04-14
// 
// 
function icons_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `icons` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `icons` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `icons` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `provider`,  `icon`,  `order_by`,  `status`   
    FROM `icons` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function icons_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `provider`,  `icon`,  `order_by`,  `status`   
    FROM `icons` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function icons_edit($id, $provider, $icon, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `provider` =:provider, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "provider" => $provider,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function icons_add($provider, $icon, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `icons` ( `id` ,   `provider` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :provider ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "provider" => $provider,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function icons_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `provider`,  `icon`,  `order_by`,  `status`    
            FROM `icons` 
            WHERE `id` = :txt OR `id` like :txt
OR `provider` like :txt
OR `icon` like :txt
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

function icons_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (icons_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function icons_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `icons` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function icons_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `provider`,  `icon`,  `order_by`,  `status`    FROM `icons` 
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

function icons_db_show_col_from_table($c) {
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
function icons_db_col_list_from_table($c) {
    $list = array();
    foreach (icons_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function icons_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function icons_update_provider($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `provider`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function icons_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function icons_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function icons_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `icons` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function icons_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            icons_update_id($id, $new_data);
            break;

        case "provider":
            icons_update_provider($id, $new_data);
            break;

        case "icon":
            icons_update_icon($id, $new_data);
            break;

        case "order_by":
            icons_update_order_by($id, $new_data);
            break;

        case "status":
            icons_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function icons_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `icons` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/icons/functions.php
// and comment here (this function)
function icons_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "provider":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "status":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function icons_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `icons` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_exists_provider($provider) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `provider` FROM `icons` WHERE   `provider` = ?");
    $req->execute(array($provider));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_exists_icon($icon) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `icons` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `icons` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function icons_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `icons` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function icons_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function icons_is_provider($provider) {
    return true;
}

function icons_is_icon($icon) {
    return true;
}

function icons_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function icons_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function icons_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, icons_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function icons_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (icons_is_id($value)) ? true : false;
            break;
        case "provider":
            $is = (icons_is_provider($value)) ? true : false;
            break;
        case "icon":
            $is = (icons_is_icon($value)) ? true : false;
            break;
        case "order_by":
            $is = (icons_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (icons_is_status($value)) ? true : false;
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
