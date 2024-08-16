<?php

// plugin = directory
// creation date : 
// 
// 
function directory_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM directory WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM directory WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM directory ORDER BY id DESC   Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();

    return $data;
}

function directory_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM directory WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function directory_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM directory WHERE id=? ");
    $req->execute(array($id));
}

function directory_edit($id, $contact_id, $address_id, $name, $data, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE directory SET "
            . "contact_id=:contact_id , "
            . "address_id=:address_id , "
            . "name=:name , "
            . "data=:data , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "address_id" => $address_id,
        "name" => $name,
        "data" => $data,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function directory_add($contact_id, $address_id, $name, $data, $code, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `directory` ( `id` ,   `contact_id` ,   `address_id` ,   `name` ,   `data` , `code`,  `order_by` ,   `status`   )
                                           VALUES  (:id ,  :contact_id ,  :address_id ,  :name ,  :data , :code, :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "address_id" => $address_id,
        "name" => $name,
        "data" => $data,
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function directory_search($txt, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    $sql = "SELECT * FROM directory 
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR address_id like :txt
OR name like :txt
OR data like :txt
OR order_by like :txt
OR status like :txt ORDER BY data  Limit  :limit OFFSET :start                          
";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_search_by_name($name, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT * FROM directory     
//            WHERE name like :name ORDER BY data  Limit  :limit OFFSET :start             
//");
//    $req->execute(array(
//        "name" => "%$name%"
//    ));
//    $data = $req->fetchall();
//    return $data;

    $sql = "
            SELECT * 
            FROM directory 
            WHERE name like :name 
            ORDER BY data  
            Limit  :limit OFFSET :start 
            ";

    $query = $db->prepare($sql);
    $query->bindValue(':name', "%$name%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (directory_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function directory_is_id($id) {
    return true;
}

function directory_is_contact_id($contact_id) {
    return true;
}

function directory_is_address_id($address_id) {
    return true;
}

function directory_is_name($name) {
    return true;
}

function directory_is_data($data) {
    return true;
}

function directory_is_order_by($order_by) {
    return true;
}

function directory_is_status($status) {
    return true;
}

function directory_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM directory WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_field_address_name($field, $address_id, $name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM directory WHERE address_id = :address_id AND name = :name");
    $req->execute(array(
        "field" => $field,
        "address_id" => $address_id,
        "name" => $name,
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function directory_by_contact_name($contact_id, $name) {
    global $db;
    $req = $db->prepare('SELECT data FROM directory WHERE contact_id = :contact_id AND name=:name ORDER BY id DESC');
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : null;
}

function directory_id_by_contact_name($contact_id, $name) {
    global $db;
    $req = $db->prepare('SELECT id FROM directory WHERE contact_id = :contact_id AND name=:name ORDER BY id DESC');
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Search * in directory by contact_id AND name [tel, fax, email] 
 * @global type $db
 * @param type $contact_id Id del que deseamos buscar
 * @param type $name nombre de campo en el directorio [tel, fax, email]
 * @return type un array() con toda la linea si existe
 */
function directory_list_by_contact_name($contact_id, $name) {
    global $db;
    $req = $db->prepare('SELECT data FROM directory WHERE contact_id = :contact_id AND name=:name ORDER BY id DESC');
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function directory_search_by_contact_id($contact_id, $start = 0, $limit = 999) {
    global $db;

    $sql = " 
        SELECT * 
        FROM directory 
        WHERE contact_id = :contact_id 
        Limit  :limit OFFSET :start                          
";

    $query = $db->prepare($sql);
    $query->bindValue(':contact_id', (int) $contact_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_search_data_by_contact_id($name, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT data FROM directory WHERE contact_id = :contact_id AND name =:name ");
    $req->execute(array(
        "name" => $name,
        "contact_id" => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function directory_total_by_name($name) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM directory WHERE name= ?');
    $req->execute(array($name));
    $data = $req->fetchall();

    return $data[0][0];
}

function directory_names_format($value, $name, $format = null) {


    switch ($name) {
        case 'tel':
        case 'tel1':
        case 'tel2':
            // cojo solo los numeros         
            //$val_formated = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);    
            $res = str_replace(" ", "", $value);
            //$res .= "+".$val_formated;                 
            break;

        default:
            break;
    }

    return $res;
}

function directory_delete_item($contact_id, $name, $data) {
    global $db;
    $req = $db->prepare("DELETE FROM directory WHERE contact_id=:contact_id AND name = :name AND data = :data ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name,
        'data' => $data,
    ));
}

function directory_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT id, contact_id, name, data FROM directory WHERE contact_id = ? ORDER BY name ');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}
