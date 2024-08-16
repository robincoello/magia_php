<?php

// plugin = modules
// creation date : 2024-01-23
// 
// 
function modules_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `modules` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `modules` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `modules` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `modules` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function modules_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `modules` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function modules_edit($id, $label, $father, $module, $description, $author, $author_email, $url, $version, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `label` =:label, `father` =:father, `module` =:module, `description` =:description, `author` =:author, `author_email` =:author_email, `url` =:url, `version` =:version, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "label" => $label,
        "father" => $father,
        "module" => $module,
        "description" => $description,
        "author" => $author,
        "author_email" => $author_email,
        "url" => $url,
        "version" => $version,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function modules_add($label, $father, $module, $description, $author, $author_email, $url, $version, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `modules` ( `id` ,   `label` ,   `father` ,   `module` ,   `description` ,   `author` ,   `author_email` ,   `url` ,   `version` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :label ,  :father ,  :module ,  :description ,  :author ,  :author_email ,  :url ,  :version ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "label" => $label,
        "father" => $father,
        "module" => $module,
        "description" => $description,
        "author" => $author,
        "author_email" => $author_email,
        "url" => $url,
        "version" => $version,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function modules_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`    
            FROM `modules` 
            WHERE `id` = :txt OR `id` like :txt
OR `label` like :txt
OR `father` like :txt
OR `module` like :txt
OR `description` like :txt
OR `author` like :txt
OR `author_email` like :txt
OR `url` like :txt
OR `version` like :txt
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

function modules_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (modules_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function modules_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `modules` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function modules_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`    FROM `modules` 
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

function modules_db_show_col_from_table($c) {
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
function modules_db_col_list_from_table($c) {
    $list = array();
    foreach (modules_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function modules_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_father($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `father`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
    
    
    
    
}

//
function modules_update_module($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `module`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_author($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `author`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_author_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `author_email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_version($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `version`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function modules_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `modules` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function modules_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            modules_update_id($id, $new_data);
            break;

        case "label":
            modules_update_label($id, $new_data);
            break;

        case "father":
            modules_update_father($id, $new_data);
            break;

        case "module":
            modules_update_module($id, $new_data);
            break;

        case "description":
            modules_update_description($id, $new_data);
            break;

        case "author":
            modules_update_author($id, $new_data);
            break;

        case "author_email":
            modules_update_author_email($id, $new_data);
            break;

        case "url":
            modules_update_url($id, $new_data);
            break;

        case "version":
            modules_update_version($id, $new_data);
            break;

        case "order_by":
            modules_update_order_by($id, $new_data);
            break;

        case "status":
            modules_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function modules_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `modules` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/modules/functions.php
// and comment here (this function)
function modules_add_filter($col_name, $value) {

    switch ($col_name) {
        case "father":
            return modules_field_id("module", $value);
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function modules_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `modules` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_label($label) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `modules` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_father($father) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father` FROM `modules` WHERE   `father` = ?");
    $req->execute(array($father));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_module($module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `module` FROM `modules` WHERE   `module` = ?");
    $req->execute(array($module));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `modules` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_author($author) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `author` FROM `modules` WHERE   `author` = ?");
    $req->execute(array($author));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_author_email($author_email) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `author_email` FROM `modules` WHERE   `author_email` = ?");
    $req->execute(array($author_email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_url($url) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `modules` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_version($version) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `version` FROM `modules` WHERE   `version` = ?");
    $req->execute(array($version));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `modules` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `modules` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function modules_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function modules_is_label($label) {
    return true;
}

function modules_is_father($father) {
    return true;
}

function modules_is_module($module) {
    return true;
}

function modules_is_description($description) {
    return true;
}

function modules_is_author($author) {
    return true;
}

function modules_is_author_email($author_email) {
    return true;
}

function modules_is_url($url) {
    return true;
}

function modules_is_version($version) {
    return true;
}

function modules_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function modules_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function modules_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, modules_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function modules_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (modules_is_id($value)) ? true : false;
            break;
        case "label":
            $is = (modules_is_label($value)) ? true : false;
            break;
        case "father":
            $is = (modules_is_father($value)) ? true : false;
            break;
        case "module":
            $is = (modules_is_module($value)) ? true : false;
            break;
        case "description":
            $is = (modules_is_description($value)) ? true : false;
            break;
        case "author":
            $is = (modules_is_author($value)) ? true : false;
            break;
        case "author_email":
            $is = (modules_is_author_email($value)) ? true : false;
            break;
        case "url":
            $is = (modules_is_url($value)) ? true : false;
            break;
        case "version":
            $is = (modules_is_version($value)) ? true : false;
            break;
        case "order_by":
            $is = (modules_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (modules_is_status($value)) ? true : false;
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
