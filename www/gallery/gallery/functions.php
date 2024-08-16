<?php

// plugin = gallery
// creation date : 2024-01-03
// 
// 
function gallery_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `gallery` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `gallery` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `gallery` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
    FROM `gallery` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function gallery_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `owner_id`,  `controller`,  `doc_id`,  `name`,  `title`,  `description`,  `alt`,  `url`,  `date_registre`,  `code`,  `order_by`,  `status`   
    FROM `gallery` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function gallery_edit($id, $owner_id, $controller, $doc_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `owner_id` =:owner_id, `controller` =:controller, `doc_id` =:doc_id, `name` =:name, `title` =:title, `description` =:description, `alt` =:alt, `url` =:url, `date_registre` =:date_registre, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "owner_id" => $owner_id,
        "controller" => $controller,
        "doc_id" => $doc_id,
        "name" => $name,
        "title" => $title,
        "description" => $description,
        "alt" => $alt,
        "url" => $url,
        "date_registre" => $date_registre,
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function gallery_add($owner_id, $controller, $doc_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `gallery` ( `id` ,   `owner_id` ,   `controller` ,   `doc_id` ,   `name` ,   `title` ,   `description` ,   `alt` ,   `url` ,   `date_registre` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :owner_id ,  :controller ,  :doc_id ,  :name ,  :title ,  :description ,  :alt ,  :url ,  :date_registre ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "owner_id" => $owner_id,
        "controller" => $controller,
        "doc_id" => $doc_id,
        "name" => $name,
        "title" => $title,
        "description" => $description,
        "alt" => $alt,
        "url" => $url,
        "date_registre" => $date_registre,
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function gallery_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `owner_id`,  `controller`,  `doc_id`,  `name`,  `title`,  `description`,  `alt`,  `url`,  `date_registre`,  `code`,  `order_by`,  `status`    
            FROM `gallery` 
            WHERE `id` = :txt OR `id` like :txt
OR `owner_id` like :txt
OR `controller` like :txt
OR `doc_id` like :txt
OR `name` like :txt
OR `title` like :txt
OR `description` like :txt
OR `alt` like :txt
OR `url` like :txt
OR `date_registre` like :txt
OR `code` like :txt
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

function gallery_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (gallery_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function gallery_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `gallery` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function gallery_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `owner_id`,  `controller`,  `doc_id`,  `name`,  `title`,  `description`,  `alt`,  `url`,  `date_registre`,  `code`,  `order_by`,  `status`    FROM `gallery` 
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

function gallery_db_show_col_from_table($c) {
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
function gallery_db_col_list_from_table($c) {
    $list = array();
    foreach (gallery_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function gallery_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_owner_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `owner_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_doc_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `doc_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_alt($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `alt`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function gallery_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `gallery` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function gallery_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            gallery_update_id($id, $new_data);
            break;

        case "owner_id":
            gallery_update_owner_id($id, $new_data);
            break;

        case "controller":
            gallery_update_controller($id, $new_data);
            break;

        case "doc_id":
            gallery_update_doc_id($id, $new_data);
            break;

        case "name":
            gallery_update_name($id, $new_data);
            break;

        case "title":
            gallery_update_title($id, $new_data);
            break;

        case "description":
            gallery_update_description($id, $new_data);
            break;

        case "alt":
            gallery_update_alt($id, $new_data);
            break;

        case "url":
            gallery_update_url($id, $new_data);
            break;

        case "date_registre":
            gallery_update_date_registre($id, $new_data);
            break;

        case "code":
            gallery_update_code($id, $new_data);
            break;

        case "order_by":
            gallery_update_order_by($id, $new_data);
            break;

        case "status":
            gallery_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function gallery_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `gallery` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/gallery/functions.php
// and comment here (this function)
function gallery_add_filter($col_name, $value) {

    switch ($col_name) {
        case "owner_id":
            return contacts_field_id("id", $value);
            break;
        case "controller":
            return controllers_field_id("controller", $value);
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function gallery_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `gallery` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_owner_id($owner_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `owner_id` FROM `gallery` WHERE   `owner_id` = ?");
    $req->execute(array($owner_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_controller($controller) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `gallery` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_doc_id($doc_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc_id` FROM `gallery` WHERE   `doc_id` = ?");
    $req->execute(array($doc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_name($name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `gallery` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_title($title) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `gallery` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `gallery` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_alt($alt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `alt` FROM `gallery` WHERE   `alt` = ?");
    $req->execute(array($alt));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_url($url) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `gallery` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_date_registre($date_registre) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `gallery` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `gallery` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `gallery` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `gallery` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function gallery_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function gallery_is_owner_id($owner_id) {
    return true;
}

function gallery_is_controller($controller) {
    return true;
}

function gallery_is_doc_id($doc_id) {
    return true;
}

function gallery_is_name($name) {
    return true;
}

function gallery_is_title($title) {
    return true;
}

function gallery_is_description($description) {
    return true;
}

function gallery_is_alt($alt) {
    return true;
}

function gallery_is_url($url) {
    return true;
}

function gallery_is_date_registre($date_registre) {
    return true;
}

function gallery_is_code($code) {
    return true;
}

function gallery_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function gallery_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function gallery_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, gallery_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function gallery_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (gallery_is_id($value)) ? true : false;
            break;
        case "owner_id":
            $is = (gallery_is_owner_id($value)) ? true : false;
            break;
        case "controller":
            $is = (gallery_is_controller($value)) ? true : false;
            break;
        case "doc_id":
            $is = (gallery_is_doc_id($value)) ? true : false;
            break;
        case "name":
            $is = (gallery_is_name($value)) ? true : false;
            break;
        case "title":
            $is = (gallery_is_title($value)) ? true : false;
            break;
        case "description":
            $is = (gallery_is_description($value)) ? true : false;
            break;
        case "alt":
            $is = (gallery_is_alt($value)) ? true : false;
            break;
        case "url":
            $is = (gallery_is_url($value)) ? true : false;
            break;
        case "date_registre":
            $is = (gallery_is_date_registre($value)) ? true : false;
            break;
        case "code":
            $is = (gallery_is_code($value)) ? true : false;
            break;
        case "order_by":
            $is = (gallery_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (gallery_is_status($value)) ? true : false;
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
