<?php

// plugin = permissions
// creation date : 
// 
// 
function permissions_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM permissions WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function permissions_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM permissions WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function permissions_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM `permissions` ORDER BY rol DESC , id DESC   Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function permissions_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM permissions WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function permissions_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM permissions WHERE id=? ");
    $req->execute(array($id));
}

function permissions_edit($id, $rol, $controller, $crud) {

    global $db;
    $req = $db->prepare(" UPDATE permissions SET "
            . "rol=:rol , "
            . "controller=:controller , "
            . "crud=:crud  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "rol" => $rol, "controller" => $controller, "crud" => $crud,
    ));
}

function permissions_add($rol, $controller, $crud) {
    global $db;
    $req = $db->prepare(" INSERT INTO `permissions` ( `id` ,   `rol` ,   `controller` ,   `crud`   )
                                       VALUES  (:id ,  :rol ,  :controller ,  :crud   ) ");

    $req->execute(array(
        "id" => null,
        "rol" => $rol,
        "controller" => $controller,
        "crud" => $crud
            )
    );

    return $db->lastInsertId();
}

function permissions_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM permissions 
    
            WHERE id like :txt OR id like :txt
OR rol like :txt
OR controller like :txt
OR crud like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function permissions_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (permissions_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function permissions_is_id($id) {
    return true;
}

function permissions_is_rol($rol) {
    return true;
}

function permissions_is_controller($controller) {
    return true;
}

function permissions_is_crud($crud) {
    return true;
}

//////////////////////////////////////////////
//////////////////////////////////////////////
//////////////////////////////////////////////
//////////////////////////////////////////////
//////////////////////////////////////////////
//////////////////////////////////////////////
function permissions_copy_from_to($rol_from, $rol_to) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `permissions` 
            (`rol`, `controller`, `crud`)  SELECT 
             :rol_to, `controller`, `crud`
            FROM permissions WHERE rol = :rol_from
            
            ");
    $req->execute(array(
        "rol_from" => $rol_from,
        "rol_to" => $rol_to,
    ));
    return $db->lastInsertId();
}

function xxx_permissions_list($pag) {
    global $db;

    $system_items_limit = _options_option("system_items_limit");
    $start = ($pag) ? ($pag - 1 ) * $system_items_limit : 0;
    $end = $system_items_limit;

    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM permissions ORDER BY id DESC LIMIT $start, $end ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

//function permissions_field_id($field, $id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT $field FROM permissions WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data[0];
//}

function permissions_field_name($field, $name) {
    global $db;
    //$data = null;
    $req = $db->prepare("SELECT $field FROM permissions WHERE name= ?");
    $req->execute(array($name));
    $data = $req->fetch();
    return $data[0];
}

//function permissions_list() {
//    global $db;
//    $limit = 10;
//
//    $data = null;
//
//    //$req = $db->prepare("SELECT * FROM permissions ORDER BY name   ");
//    $req = $db->prepare("SELECT * FROM permissions ORDER BY rol, controller  ");
//
//    $req->execute(array(
//        'limit' => "$limit"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//
//function permissions_search($txt) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM permissions WHERE '
//            . 'rol like :txt OR '
//            . 'controller like :txt OR '
//            . 'crud like :txt '
//            . 'ORDER BY rol DESC, controller ');
//    $req->execute(array(
//        'txt' => "%$txt%"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function permissions_search_by_rol($rol, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "
            SELECT id, rol, controller, crud 
            FROM `permissions` 
            WHERE `rol` = :rol
            ORDER BY `rol`, `controller`, `crud`    
            Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':rol', $rol, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function permissions_search_by_controller($controller) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM permissions WHERE '
            . 'controller = :controller '
            . 'ORDER BY rol ');
    $req->execute(array(
        'controller' => "$controller"
    ));
    $data = $req->fetchall();
    return $data;
}

function permissions_search_rols_by_controller($controller) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT rol FROM permissions WHERE '
            . 'controller = :controller '
            . 'ORDER BY rol');
    $req->execute(array(
        'controller' => $controller
    ));
    $data = $req->fetch();
    return $data;
}

/**
 * 
 * @global type $db
 * @param type $id
 * @return type
 */
//function permissions_details($id) {
//    global $db;
//    $req = $db->prepare('SELECT * FROM permissions WHERE id= ?');
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data;
//}
/**
 * 
 * @global type $db
 * @param type $id
 */
function permissions_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM permissions WHERE id=?');
    $req->execute(array($id));
}

/**
 * 
 * @global type $db
 * @param type $id
 * @param type $crud
 */
//function permissions_edit($id, $crud) {
//
//    global $db;
//    $req = $db->prepare('UPDATE permissions SET '
//            . 'crud=:crud '
//            . ' WHERE id=:id');
//
//    $req->execute(array(
//        'crud' => $crud,
//        'id' => $id));
//}

/**
 * 
 * @global type $db
 * @param type $status
 * @param type $description
 * @param type $code
 */
//function permissions_add($rol, $controller, $crud) {
//    global $db;
//    $req = $db->prepare('INSERT INTO permissions (id,  rol,  controller,   crud)
//                                    VALUES (:id, :rol, :controller,  :crud)');
//
//    $req->execute(array(
//        'id' => null,
//        'rol' => $rol,
//        'controller' => $controller,
//        'crud' => $crud
//            )
//    );
//}
/**
 * 
 * @global type $db
 * @param type $article_id
 * @param type $category_id
 */
function permissions_cat_add($article_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO permissions_categories (id, article_id, category_id)
                                                      VALUES (:id, :article_id, :category_id)');
    $req->execute(array(
        'id' => null,
        'article_id' => $article_id,
        'category_id' => $category_id
            )
    );
}

/**
 * 
 * @global type $db
 * @param type $article_id
 * @param type $category_id
 */
function permissions_cat_del($article_id, $category_id) {
    global $db;
    $req = $db->prepare('DELETE FROM permissions_categories WHERE (category_id = :category_id AND article_id = :article_id)');
    $req->execute(array(
        'article_id' => $article_id,
        'category_id' => $category_id
            )
    );
}

/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
function permissions_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM permissions WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `permissions_categories` JOIN permissions WHERE permissions.id = permissions_categories.article_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
function permissions_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM permissions_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM permissions');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}

function permissions_photos_update($id, $photo) {
    global $db;
    $req = $db->prepare('UPDATE permissions_photos SET photo=:photo WHERE id=:id');
    $req->execute(array(
        'photo' => $photo,
        'id' => $id));
}

function permissions_photos_add($article_id, $photo) {
    global $db;

    $p = (permissions_photos($article_id)) ? "0" : "1";

    $req = $db->prepare('INSERT INTO permissions_photos (id, article_id, photo, principal) VALUES (:id,:article_id,:photo,:principal)');
    $req->execute(array(
        'id' => null,
        'article_id' => $article_id,
        'photo' => $photo,
        'principal' => $p,
    ));
}

function permissions_photos_principal($article_id, $w = 80, $h = 80) {
    global $db;
// si la foto existe, mostramos sino la por defecto 
    $data = false;
    $req = $db->prepare("SELECT photo FROM permissions_photos WHERE article_id = :article_id AND principal = 1");
    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    $r = "<img class=\"img-responsive\" src=\"www/gallery/img/permissions/art.png\" width=\"$w\" height=\"$h\" >";

    foreach ($data as $p) {
        if ($p[0] != "" && file_exists("www/gallery/img/permissions/$p[0]")) {
            $r = "<img class=\"img-responsive\" src=\"www/gallery/img/permissions/$p[0]\" width=\"$w\" height=\"$h\" >";
        }
    }



    return $r;
}

function permissions_photos($article_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM permissions_photos WHERE article_id = :article_id ORDER BY principal DESC");
    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}

function permissions_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = permissions_field_id("photo", $id);

    if (file_exists("www/gallery/img/permissions/$photo")) {
        return "<img src=\"www/gallery/img/permissions/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/permissions/art.png\" width=\"$w\">";
    }
}

/**
  function type_article_array() {
  global $db;
  $data = null;
  $req = $db->prepare('SELECT * FROM categories ORDER BY category');
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 *//*
  function type_article($id) {
  global $db;
  $data = false;
  $req = $db->prepare("SELECT category FROM categories WHERE id = ? ");
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 */

/**
 * 
 * @global type $db
 * @param type $article_id
 * @return type
 */
function permissions_categories($article_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM permissions_categories WHERE article_id = :article_id ");

    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}

function permissions_categories_exists($article_id, $category_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM permissions_categories WHERE article_id = :article_id AND category_id = :category_id ");

    $req->execute(array(
        'article_id' => $article_id,
        'category_id' => $category_id,
    ));

    $data = $req->fetchall();

    return $data;
}

/**
 * 
 * @global type $db
 * @param type $id
 * @return type
 */
function permissions_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM permissions_photos WHERE article_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function permissions_categories_delete_all($article_id) {
    global $db;

    $data = false;

    $req = $db->prepare("DELETE  FROM permissions_categories WHERE article_id = :article_id ");

    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}

//function permissions_is_id() {
//    return TRUE;
//}
//function permissions_is_rol() {
//    return TRUE;
//}
//function permissions_is_controller() {
//    return TRUE;
//}
//function permissions_is_crud() {
//    return TRUE;
//}

function permissions_search_by_rol_controller($rol, $controller) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT `id` FROM `permissions` WHERE `rol` = :rol AND `controller` = :controller ");

    $req->execute(array(
        'rol' => $rol,
        'controller' => $controller
    ));

    $data = $req->fetchall();

    return $data;
}

////////////////////////////////////////////////////////////////////////////////
/**
 * 
 * @global type $db
 * @param type $login
 * @return type
 */
function permissions_permission($rol, $controller) {
    global $db;

    $req = $db->prepare('SELECT crud FROM permissions WHERE rol=:rol AND controller=:controller');

    $req->execute(
            array(
                'controller' => $controller,
                'rol' => $rol
    ));

    $data = $req->fetch();

    return (isset($data[0])) ? $data[0] : "0000";
    //return 1;
}

/**
 * 
 * @param type $rol
 * @param type $controller
 * @param type $action
 * @return boolean
 */
function permissions_has_permission($u_rol, $controller, $action) {
    // verificar si existe el controlador 
    // verificar si existe el rol
    // verificar si existe la acction 
    $p = permissions_permission($u_rol, $controller);

    switch ($action) {
        case "create":
            return ( $p[0] == 1 ) ? TRUE : false;

        case "read":
            return (int) $p[1];

//            return ( $p[1] == 1 ) ? TRUE : false;

        case "update":
            return ( $p[2] == 1 ) ? TRUE : false;

        case "delete":
            return ( $p[3] == 1 ) ? TRUE : false;

        default:
            return false;
    }
}

function permissions_update($rol, $controller, $crud) {

    global $db;
    $req = $db->prepare(" UPDATE permissions SET crud=:crud  WHERE rol=:rol AND  controller:=controller ");

    $req->execute(array(
        "rol" => $rol,
        "controller" => $controller,
        "crud" => $crud
    ));
}

function permissions_push($rol, $controller, $crud) {
    if (permissions_search_by_rol_controller($rol, $controller)) {
        // actualiza
        permissions_update($rol, $controller, $crud);
    } else {
        // lo crea
        permissions_add($rol, $controller, $crud);
    }
}
