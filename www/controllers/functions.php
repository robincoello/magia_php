<?php

// plugin = controllers
// creation date : 
// 
// 
function controllers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM controllers WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function controllers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM controllers WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function controllers_list($start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM controllers ORDER BY controller   Limit :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function controllers_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM controllers WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function controllers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM controllers WHERE id=? ");
    $req->execute(array($id));
}

function controllers_edit($id, $controller, $title, $description) {

    global $db;
    $req = $db->prepare(" UPDATE controllers SET "
            . "controller=:controller , "
            . "title=:title , "
            . "description=:description  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "controller" => $controller, "title" => $title, "description" => $description,
    ));
}

function controllers_add($controller, $title, $description) {
    global $db;
    $req = $db->prepare(" INSERT INTO `controllers` ( `id` ,   `controller` ,   `title` ,   `description`   )
                                       VALUES  (:id ,  :controller ,  :title ,  :description   ) ");

    $req->execute(array(
        "id" => null,
        "controller" => $controller,
        "title" => $title,
        "description" => $description
            )
    );

    return $db->lastInsertId();
}

function controllers_search($txt, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM controllers     
    WHERE id like :txt 
    OR controller like :txt
    OR title like :txt
    OR description like :txt  
    ORDER BY controller
    Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function controllers_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (controllers_list() as $key => $value) {

        $s = ($selected == $value[$k]) ? " selected  " : "";

        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function controllers_is_id($id) {
    return true;
}

function controllers_is_controller($c) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT id 
        FROM controllers 
        WHERE
        controller = :c                           
");
    $req->execute(array(
        "c" => $c
    ));

    $data = $req->fetchall();

    return ($data) ? TRUE : FALSE;
}

function controllers_is_title($title) {
    return true;
}

function controllers_is_description($description) {
    return true;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// regrsa la lista d carpetas en www
function controllers_folders_list() {

    $folders = array();
    $directory = 'www';
    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));

    foreach ($scanned_directory as $archivo) {
        if (is_dir("www/$archivo")) {
            array_push($folders, $archivo);
        }
    }
    return $folders;
}

/**
 * Lista de controladores que no tiene carpetas en www
 * @return array
 */
function controllers_without_folders() {

//    $folders = array();
//    $directory = 'www';
//    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
//
//    foreach ($scanned_directory as $archivo) {
//        if (is_dir("www/$archivo")) {
//            array_push($folders, $archivo);
//        }
//    }
//    return $folders;

    return false;
}
