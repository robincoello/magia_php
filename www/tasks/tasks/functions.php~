<?php

// plugin = tasks
// creation date : 2024-04-11
// 
// 
function tasks_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_id`,  `contact_id`,  `title`,  `description`,  `controller`,  `doc_id`,  `date_registre`,  `date_update`,  `color`,  `order_by`,  `status`   
    FROM `tasks` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function tasks_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `category_id`,  `contact_id`,  `title`,  `description`,  `controller`,  `doc_id`,  `date_registre`,  `date_update`,  `color`,  `order_by`,  `status`   
    FROM `tasks` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function tasks_edit($id, $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `category_id` =:category_id, `contact_id` =:contact_id, `title` =:title, `description` =:description, `controller` =:controller, `doc_id` =:doc_id, `date_registre` =:date_registre, `date_update` =:date_update, `color` =:color, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "category_id" => $category_id,
        "contact_id" => $contact_id,
        "title" => $title,
        "description" => $description,
        "controller" => $controller,
        "doc_id" => $doc_id,
        "date_registre" => $date_registre,
        "date_update" => $date_update,
        "color" => $color,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function tasks_add($category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tasks` ( `id` ,   `category_id` ,   `contact_id` ,   `title` ,   `description` ,   `controller` ,   `doc_id` ,   `date_registre` ,   `date_update` ,   `color` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :category_id ,  :contact_id ,  :title ,  :description ,  :controller ,  :doc_id ,  :date_registre ,  :date_update ,  :color ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "category_id" => $category_id,
        "contact_id" => $contact_id,
        "title" => $title,
        "description" => $description,
        "controller" => $controller,
        "doc_id" => $doc_id,
        "date_registre" => $date_registre,
        "date_update" => $date_update,
        "color" => $color,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function tasks_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_id`,  `contact_id`,  `title`,  `description`,  `controller`,  `doc_id`,  `date_registre`,  `date_update`,  `color`,  `order_by`,  `status`    
            FROM `tasks` 
            WHERE `id` = :txt OR `id` like :txt
OR `category_id` like :txt
OR `contact_id` like :txt
OR `title` like :txt
OR `description` like :txt
OR `controller` like :txt
OR `doc_id` like :txt
OR `date_registre` like :txt
OR `date_update` like :txt
OR `color` like :txt
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

function tasks_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (tasks_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function tasks_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tasks` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tasks_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_id`,  `contact_id`,  `title`,  `description`,  `controller`,  `doc_id`,  `date_registre`,  `date_update`,  `color`,  `order_by`,  `status`    FROM `tasks` 
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

function tasks_db_show_col_from_table($c) {
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
function tasks_db_col_list_from_table($c) {
    $list = array();
    foreach (tasks_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function tasks_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_category_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `category_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_doc_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `doc_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_date_update($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `date_update`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_color($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `color`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tasks_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function tasks_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tasks_update_id($id, $new_data);
            break;

        case "category_id":
            tasks_update_category_id($id, $new_data);
            break;

        case "contact_id":
            tasks_update_contact_id($id, $new_data);
            break;

        case "title":
            tasks_update_title($id, $new_data);
            break;

        case "description":
            tasks_update_description($id, $new_data);
            break;

        case "controller":
            tasks_update_controller($id, $new_data);
            break;

        case "doc_id":
            tasks_update_doc_id($id, $new_data);
            break;

        case "date_registre":
            tasks_update_date_registre($id, $new_data);
            break;

        case "date_update":
            tasks_update_date_update($id, $new_data);
            break;

        case "color":
            tasks_update_color($id, $new_data);
            break;

        case "order_by":
            tasks_update_order_by($id, $new_data);
            break;

        case "status":
            tasks_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function tasks_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tasks` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/tasks/functions.php
// and comment here (this function)
function tasks_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "category_id":
            //return tasks_categories_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "controller":
            //return controllers_field_id("controller", $value);
            return ($filtre) ?? $value;
            break;
        case "doc_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_registre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_update":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "color":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "status":
            //return tasks_status_field_id("code", $value);
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
function tasks_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tasks` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_category_id($category_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_id` FROM `tasks` WHERE   `category_id` = ?");
    $req->execute(array($category_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_contact_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `tasks` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_title($title) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `tasks` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `tasks` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_controller($controller) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `tasks` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_doc_id($doc_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc_id` FROM `tasks` WHERE   `doc_id` = ?");
    $req->execute(array($doc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_date_registre($date_registre) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `tasks` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_date_update($date_update) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_update` FROM `tasks` WHERE   `date_update` = ?");
    $req->execute(array($date_update));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_color($color) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `color` FROM `tasks` WHERE   `color` = ?");
    $req->execute(array($color));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tasks` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tasks_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tasks` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function tasks_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function tasks_is_category_id($category_id) {
    return true;
}

function tasks_is_contact_id($contact_id) {
    return true;
}

function tasks_is_title($title) {
    return true;
}

function tasks_is_description($description) {
    return true;
}

function tasks_is_controller($controller) {
    return true;
}

function tasks_is_doc_id($doc_id) {
    return true;
}

function tasks_is_date_registre($date_registre) {
    return true;
}

function tasks_is_date_update($date_update) {
    return true;
}

function tasks_is_color($color) {
    return true;
}

function tasks_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function tasks_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function tasks_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tasks_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function tasks_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (tasks_is_id($value)) ? true : false;
            break;
        case "category_id":
            $is = (tasks_is_category_id($value)) ? true : false;
            break;
        case "contact_id":
            $is = (tasks_is_contact_id($value)) ? true : false;
            break;
        case "title":
            $is = (tasks_is_title($value)) ? true : false;
            break;
        case "description":
            $is = (tasks_is_description($value)) ? true : false;
            break;
        case "controller":
            $is = (tasks_is_controller($value)) ? true : false;
            break;
        case "doc_id":
            $is = (tasks_is_doc_id($value)) ? true : false;
            break;
        case "date_registre":
            $is = (tasks_is_date_registre($value)) ? true : false;
            break;
        case "date_update":
            $is = (tasks_is_date_update($value)) ? true : false;
            break;
        case "color":
            $is = (tasks_is_color($value)) ? true : false;
            break;
        case "order_by":
            $is = (tasks_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (tasks_is_status($value)) ? true : false;
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
