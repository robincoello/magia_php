<?php

function modules_details_by_module($name) {
    global $db;
    $req = $db->prepare("SELECT * FROM modules WHERE name= ? ");
    $req->execute(array($name));
    $data = $req->fetch();
    return $data;
}

function modules_change_status($id, $status) {

    global $db;
    $req = $db->prepare(" UPDATE modules SET "
            . "status=:status  "
            . " WHERE id=:id ");

    $req->execute(array(
        "id" => $id,
        "status" => $status,
    ));
}

function modules_field_module($field, $module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE module= ?");
    $req->execute(array($module));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function modules_search_module_by_sub_module($sub_module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT father FROM modules WHERE module = ?");
    $req->execute(array($sub_module));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Lista de los sub_modules by module
 * @global type $db
 * @param type $module
 * @return type
 */
function modules_search_sub_modules_by_module($module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM modules WHERE father = ? ORDER BY father, module");
    $req->execute(array("$module"));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function modules_search_without_father_by_module_status($module, $status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM modules WHERE father IS NULL AND ( module=:module AND status =:status ) ORDER BY module");
    $req->execute(array(
        "module" => $module,
        "status" => $status,
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

//function modules_update_sub_modules_by_module($id, $module, $sub_modules) {
//    global $db;
//    $req = $db->prepare(" UPDATE modules SET sub_modules=:sub_modules  WHERE id=:id AND name=:name ");
//    $req->execute(array(
//        "id" => $id,
//        "name" => $module,
//        "sub_modules" => $sub_modules,
//    ));
//}

function modules_update_sub_modules_by_module($label, $father_id, $module, $sub_modules, $description, $author, $author_email, $url, $version, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `modules` ( `id` ,   `label` ,   `father_id` ,   `module` ,   `sub_modules` ,   `description` ,   `author` ,   `author_email` ,   `url` ,   `version` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :label ,  :father_id ,  :module ,  :sub_modules ,  :description ,  :author ,  :author_email ,  :url ,  :version ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "label" => $label,
        "father_id" => $father_id,
        "module" => $module,
        "sub_modules" => $sub_modules,
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

/**
 * Primero saco lalista de submodulos, 
 * los pongo en un array 
 * 
 */
function modules_get_sub_modules_from_module($module) {

    $sub_modules_liste = modules_search_sub_modules_by_module($module);

    $sub_modules_array = explode(',', $sub_modules_liste);

    return $sub_modules_array;
}

function modules_get_module_by_sub_module($sub_module) {
    
}

function modules_field_sub_module($field, $sub_modules) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE sub_modules= ?");
    $req->execute(array($sub_modules));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function modules_list_without_father($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
    FROM `modules` WHERE `father` IS NULL  ORDER BY `module`, `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// submodulos 
function modules_list_with_father($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `modules` WHERE `father` IS NOT NULL  ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function modules_update_father($module, $father) {
//    global $db;
//    $req = $db->prepare(" UPDATE modules SET "
//            . "father=:father  "
//            . " WHERE module=:module ");
//    $req->execute(array(
//        "module" => $module,
//        "father" => $father,
//    ));
//}

function modules_list_modules($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `modules` WHERE `father` = `module`  ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function modules_list_by_father_module($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `father`,  `module`,  `description`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `modules` WHERE `father` = `module`  ORDER BY `module`, `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function modules_list_without_father_by_status($status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
    FROM `modules` WHERE `father` IS NULL AND status =:status  ORDER BY `module`, `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
