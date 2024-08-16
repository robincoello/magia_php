<?php

// plugin = _menus
// creation date : 2023-03-07
// 
// 
function _menus_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _menus_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _menus_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function _menus_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`   
    FROM `_menus` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`   
    FROM `_menus` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function _menus_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `_menus` WHERE `id` =? ");
    $req->execute(array($id));
}

function _menus_edit($id, $location, $father_id, $label, $controller, $url, $target, $icon, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus` SET `location` =:location, `father_id` =:father_id, `label` =:label, `controller` =:controller, `url` =:url, `target` =:target, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "location" => $location,
        "father_id" => $father_id,
        "label" => $label,
        "controller" => $controller,
        "url" => $url,
        "target" => $target,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function _menus_add($location, $father_id, $label, $controller, $url, $target, $icon, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_menus` ( `id` ,   `location` ,   `father_id` ,   `label` ,   `controller` ,   `url` ,   `target` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :location ,  :father_id ,  :label ,  :controller ,  :url ,  :target ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "location" => $location,
        "father_id" => $father_id,
        "label" => $label,
        "controller" => $controller,
        "url" => $url,
        "target" => $target,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function _menus_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    
            FROM `_menus` 
            WHERE `id` = :txt OR `id` like :txt
OR `location` like :txt
OR `father_id` like :txt
OR `label` like :txt
OR `controller` like :txt
OR `url` like :txt
OR `target` like :txt
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

function _menus_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (_menus_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . _tr($value[$v]) . "</option>";
    }
    echo $c;
}

function _menus_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `_menus` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function _menus_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `$field` = '$txt' 
    ORDER BY `order_by`, `label` DESC
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

function _menus_db_show_col_from_table($c) {
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

function _menus_db_col_list_from_table($c) {
    $list = array();
    foreach (_menus_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
// To modify this function
// Copy tis function in /www_extended/_menus/functions.php
// and comment here (this function)
//function _menus_add_filter($col_name, $value) {
//    
//    switch ($col_name) {
//        case "father_id":
//            return _menus_field_id("id", $value);
//            break; 
//       
//
//        default:
//            return $value;
//            break;
//    }
//}

function _menus_is_id($id) {
    return true;
}

function _menus_is_location($location) {
    return true;
}

function _menus_is_father_id($father_id) {
    return true;
}

function _menus_is_label($label) {
    return true;
}

//function _menus_is_controller($controller) {
//    return true;
//}

function _menus_is_url($url) {
    return true;
}

function _menus_is_target($target) {
    return true;
}

function _menus_is_icon($icon) {
    return true;
}

function _menus_is_order_by($order_by) {
    return true;
}

function _menus_is_status($status) {
    return true;
}

################################################################################
################################################################################
################################################################################
