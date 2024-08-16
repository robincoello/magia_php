<?php

// plugin = contacts_photos
// creation date : 
// 
// 
function contacts_photos_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_photos WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_photos_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_photos WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_photos_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM contacts_photos ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_photos_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM contacts_photos WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function contacts_photos_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM contacts_photos WHERE id=? ");
    $req->execute(array($id));
}

function contacts_photos_edit($id, $contact_id, $photo, $principal, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE contacts_photos SET "
            . "contact_id=:contact_id , "
            . "photo=:photo , "
            . "principal=:principal , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "contact_id" => $contact_id, "photo" => $photo, "principal" => $principal, "order_by" => $order_by, "status" => $status,
    ));
}

function contacts_photos_add($contact_id, $photo, $principal, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `contacts_photos` ( `id` ,   `contact_id` ,   `photo` ,   `principal` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :photo ,  :principal ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "photo" => $photo,
        "principal" => $principal,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function contacts_photos_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM contacts_photos 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR photo like :txt
OR principal like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_photos_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (contacts_photos_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function contacts_photos_is_id($id) {
    return true;
}

function contacts_photos_is_contact_id($contact_id) {
    return true;
}

function contacts_photos_is_photo($photo) {
    return true;
}

function contacts_photos_is_principal($principal) {
    return true;
}

function contacts_photos_is_order_by($order_by) {
    return true;
}

function contacts_photos_is_status($status) {
    return true;
}
