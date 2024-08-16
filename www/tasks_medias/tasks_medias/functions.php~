<?php

// plugin = tasks_medias
// creation date : 2024-04-28
// 
// 
function tasks_medias_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`   
    FROM `tasks_medias` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function tasks_medias_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`   
    FROM `tasks_medias` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function tasks_medias_edit($id, $task_id, $type, $url, $description, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `task_id` =:task_id, `type` =:type, `url` =:url, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "task_id" => $task_id,
        "type" => $type,
        "url" => $url,
        "description" => $description,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function tasks_medias_add($task_id, $type, $url, $description, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tasks_medias` ( `id` ,   `task_id` ,   `type` ,   `url` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :task_id ,  :type ,  :url ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "task_id" => $task_id,
        "type" => $type,
        "url" => $url,
        "description" => $description,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function tasks_medias_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`    
            FROM `tasks_medias` 
            WHERE `id` = :txt OR `id` like :txt
OR `task_id` like :txt
OR `type` like :txt
OR `url` like :txt
OR `description` like :txt
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

function tasks_medias_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (tasks_medias_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $val = "";
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show];
        }
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;
}

function tasks_medias_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tasks_medias` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tasks_medias_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`    FROM `tasks_medias` 
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

function tasks_medias_db_show_col_from_table($c) {
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
function tasks_medias_db_col_list_from_table($c) {
    $list = array();
    foreach (tasks_medias_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function tasks_medias_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_task_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `task_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_medias_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function tasks_medias_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tasks_medias_update_id($id, $new_data);
            break;

        case "task_id":
            tasks_medias_update_task_id($id, $new_data);
            break;

        case "type":
            tasks_medias_update_type($id, $new_data);
            break;

        case "url":
            tasks_medias_update_url($id, $new_data);
            break;

        case "description":
            tasks_medias_update_description($id, $new_data);
            break;

        case "order_by":
            tasks_medias_update_order_by($id, $new_data);
            break;

        case "status":
            tasks_medias_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function tasks_medias_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tasks_medias` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/tasks_medias/functions.php
// and comment here (this function)
function tasks_medias_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "task_id":
            //return tasks_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "url":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
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
function tasks_medias_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tasks_medias` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_task_id($task_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `task_id` FROM `tasks_medias` WHERE   `task_id` = ?");
    $req->execute(array($task_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_type($type) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `tasks_medias` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_url($url) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `tasks_medias` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `tasks_medias` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tasks_medias` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_medias_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tasks_medias` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function tasks_medias_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function tasks_medias_is_task_id($task_id) {
    return true;
}

function tasks_medias_is_type($type) {
    return true;
}

function tasks_medias_is_url($url) {
    return true;
}

function tasks_medias_is_description($description) {
    return true;
}

function tasks_medias_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function tasks_medias_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function tasks_medias_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tasks_medias_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function tasks_medias_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (tasks_medias_is_id($value)) ? true : false;
            break;
        case "task_id":
            $is = (tasks_medias_is_task_id($value)) ? true : false;
            break;
        case "type":
            $is = (tasks_medias_is_type($value)) ? true : false;
            break;
        case "url":
            $is = (tasks_medias_is_url($value)) ? true : false;
            break;
        case "description":
            $is = (tasks_medias_is_description($value)) ? true : false;
            break;
        case "order_by":
            $is = (tasks_medias_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (tasks_medias_is_status($value)) ? true : false;
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
