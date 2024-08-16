<?php

// plugin = contacts_positions
// creation date : 
// 
// 
function contacts_positions_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_positions WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_positions_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_positions WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_positions_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM contacts_positions ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_positions_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM contacts_positions WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function contacts_positions_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM contacts_positions WHERE id=? ");
    $req->execute(array($id));
}

function contacts_positions_edit($contact_id, $company_id, $position) {

    global $db;
    $req = $db->prepare(" UPDATE contacts_positions SET "
            . "contact_id=:contact_id , "
            . "company_id=:company_id , "
            . "position=:position  "
            . " WHERE id=:id ");
    $req->execute(array(
        "contact_id" => $contact_id, "company_id" => $company_id, "position" => $position,
    ));
}

function contacts_positions_add($contact_id, $company_id, $position) {
    global $db;
    $req = $db->prepare(" INSERT INTO `contacts_positions` ( `contact_id` ,   `company_id` ,   `position`   )
                                       VALUES  (:contact_id ,  :company_id ,  :position   ) ");

    $req->execute(array(
        "contact_id" => $contact_id,
        "company_id" => $company_id,
        "position" => $position
            )
    );

    return $db->lastInsertId();
}

function contacts_positions_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM contacts_positions 
    
            WHERE id like :txt OR contact_id like :txt
OR company_id like :txt
OR position like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_positions_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (contacts_positions_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function contacts_positions_is_contact_id($contact_id) {
    return true;
}

function contacts_positions_is_company_id($company_id) {
    return true;
}

function contacts_positions_is_position($position) {
    return true;
}
