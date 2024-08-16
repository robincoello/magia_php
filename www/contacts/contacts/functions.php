<?php

// plugin = contacts
// creation date : 
// 
// 

function contacts_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_list($start = 0, $limit = 999) {
    global $db;

    $sql = "
            SELECT `id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, 
            `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`
            FROM `contacts` 
            ORDER BY `order_by` DESC, id desc 
            Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_list_is_not_provider($start = 0, $limit = 999) {
    global $db;

    $sql = "
            SELECT * 
            FROM `contacts` WHERE (id = owner_id) AND id NOT IN (SELECT distinct(company_id) FROM providers ) 
            ORDER BY `order_by` DESC, id desc 
            Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_export() {
    global $db;

    $sql = "
            SELECT `id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status`
            FROM `contacts` 
            WHERE id = owner_id
            ORDER BY name
            ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_details($id) {
    global $db;
    $req = $db->prepare("
            SELECT `id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `billing_method`, `discounts`, `code`, `language`, `order_by`, `status` 
            FROM `contacts` 
            WHERE `id` = ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function contacts_details_by_tva($tva) {
    global $db;
    $req = $db->prepare("
            SELECT * 
            FROM `contacts` 
            WHERE `tva` = ? ");
    $req->execute(array($tva));
    $data = $req->fetch();
    return $data;
}

function contacts_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `contacts`WHERE `id` =? ");
    $req->execute(array($id));
}

function contacts_edit($id, $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `contacts` SET "
            . "`owner_id` =:owner_id , "
            . "`type` =:type , "
            . "`title` =:title , "
            . "`name` =:name , "
            . "`lastname` =:lastname , "
            . "`birthdate` =:birthdate , "
            . "`tva` =:tva , "
            . "`order_by` =:order_by , "
            . "`status` =:status  "
            . " WHERE `id`=:id ");

    $req->execute(array(
        "id" => $id,
        "owner_id" => $owner_id,
        "type" => $type,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
        "birthdate" => $birthdate,
        "tva" => $tva,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function contacts_edit_short($id, $title, $name, $lastname) {
    global $db;
    $req = $db->prepare(" UPDATE `contacts` SET `title` =:title , `name` =:name , `lastname` =:lastname WHERE `id` =:id ");

    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
    ));
}

function contacts_update($id, $title, $name, $lastname, $birthdate) {
    global $db;
    $req = $db->prepare(" UPDATE`contacts`SET title=:title , name=:name , lastname=:lastname, birthdate=:birthdate WHERE id=:id ");

    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
        "birthdate" => $birthdate,
    ));
}

function contacts_add(
        $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
) {
    global $db;

    $req = $db->prepare(" INSERT INTO `contacts` 
        ( `id` ,   `owner_id` , `type`,   `title` ,   `name` ,   `lastname` ,   `birthdate` ,   `tva` ,  
        `code`,  `order_by` ,   `status`   )
                                       VALUES  
        (:id ,     :owner_id ,  :type,   :title ,    :name ,      :lastname ,    :birthdate ,    :tva , 
        :code,   :order_by ,   :status   ) ");

    $req->execute(array(
        "id" => null,
        "owner_id" => $owner_id,
        "type" => $type,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
        "birthdate" => $birthdate,
        "tva" => $tva,
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $req->errorCode();
}

function contacts_search($txt, $order_by = "name", $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM`contacts`
WHERE 
id like :txt
OR owner_id like :txt
OR type like :txt
OR title like :txt
OR name like :txt
OR lastname like :txt
OR birthdate like :txt
OR tva like :txt
OR order_by like :txt
OR status like :txt
ORDER BY :order_by, owner_id,  name, lastname 
Limit  :limit OFFSET :start             
";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (contacts_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $val = '';
        foreach ($values_to_show as $val_to_show) {
            $val = $val . ' ' . $value[$val_to_show];
        }
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;
}

function contacts_is_id($id) {
    return (is_id($id)) ? true : false;
}

function contacts_is_owner_id($owner_id) {
    return true;
}

function contacts_is_type($type) {
    return true;
}

function contacts_is_title($title) {
    return true;
}

function contacts_is_name($name) {

    if (!is_string($name) || strlen($name) > 50) {
        return false;
    } else {
        return true;
    }
}

function contacts_is_lastname($lastname) {

    if (!is_string($lastname) || strlen($lastname) > 50) {
        return false;
    } else {
        return true;
    }
}

function contacts_is_birthdate($birthdate) {
    return true;
}

function contacts_is_tva($tva) {
    if (!is_string($tva)) {
        return false;
    } else {
        return true;
    }
}

function contacts_is_billing_method($billing_method) {

    $billing_method = strtolower($billing_method);

    if ($billing_method !== "" && ($billing_method == "m" || $billing_method == 'l')) {
        return true;
    } else {
        return false;
    }
}

function contacts_is_discounts($discounts) {
    if ($discounts && $discounts > 0 && $discounts < 100) {
        return true;
    } else {
        return false;
    }
}

function contacts_is_order_by($order_by) {
    return true;
}

function contacts_is_status($status) {
    return true;
}

function contacts_is_ok_for_new_account() {
    
}

// Mis contactos, usado para hacer un merge con los contactos del cloud
// pero no mi tva
function contacts_search_my_contacts($txt, $order_by = "name", $start = 0, $limit = 999) {
    global $db, $u_owner_id;

    $my_tva = contacts_field_id('tva', $u_owner_id);

    $sql = "SELECT *  
        FROM`contacts`  
                
WHERE (
name like :txt OR 
lastname like :txt OR 
tva like :txt 
)AND
            (`tva` IS NOT NULL AND tva != '' )


ORDER BY :order_by, name, lastname 
Limit  :limit OFFSET :start             
";

    $query = $db->prepare($sql);
//    $query->bindValue(':my_tva', $my_tva, PDO::PARAM_STR);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_language($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `language` FROM `contacts` WHERE `id`= ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_link($contact_id, $target = false) {
    global $u_rol;

    if (permissions_has_permission($u_rol, "contacts", "read")) {

        $link = "<a href='index.php?c=contacts&a=details&id=$contact_id'> " . contacts_formated($contact_id) . "</a>";
    } else {
        $link = "" . contacts_formated($contact_id) . "";
    }

    return $link;
}

function contacts_update_name($contact_id, $new_name) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `name`=:new_data  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_data' => $new_name
            )
    );
}

function contacts_update_lastname($contact_id, $new_name) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `lastname`=:new_data  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_data' => $new_name
            )
    );
}

function contacts_update_tva($contact_id, $new_tva) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `tva`=:new_tva  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_tva' => $new_tva
            )
    );
}

//
// ALTER TABLE `contacts` ADD `billing_method` ENUM('M','I') NULL DEFAULT NULL AFTER `tva`; 

function contacts_push_billing_method($contact_id, $billing_method) {
    if (contacts_field_id('billing_method', $contact_id)) {
        contacts_update_billing_method($contact_id, $billing_method);
    } else {
        // Realmente no hay un create, se debe hacer un update
//        contacts_create_billing_method($contact_id, $billing_method);
        contacts_update_billing_method($contact_id, $billing_method);
    }
}

function contacts_update_billing_method($contact_id, $billing_method) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `billing_method`=:billing_method  WHERE id=:id ');
    $req->execute(array(
        'id' => $contact_id,
        'billing_method' => $billing_method
            )
    );
}

function contacts_formated($id) {

    $type = contacts_field_id("type", $id);

    $name = (contacts_field_id("name", $id));

    $lastname = (contacts_field_id("lastname", $id));

    return ($type ) ? contacts_formated_name($name) : contacts_formated_lastname($lastname) . " " . contacts_formated_name($name);
}

// solo numeros 
// lettras
// puntos
// lineas bajas 
// lineas medias
function contacts_formated_name($name) {
    if (!$name || $name == '') {
        return $name;
    }
    $n = str_replace('&amp;', '&', $name);

    return (ucfirst(strtolower($n)));
}

function contacts_formated_lastname($lastname) {
    if (!$lastname || $lastname == '') {
        return $lastname;
    }
    $ln = str_replace('&amp;', '&', $lastname);
    return strtoupper(strtolower($ln));
}

function contacts_headoffice_list($filter = array()) {
    global $db;

    $order_by = $filter['order_by'] ?? " ORDER BY id DESC ";
    // ORDER BY id DESC

    $limit = 999;
    $data = null;

    $req = $db->prepare("
    SELECT c.id, c.owner_id, c.type, c.name, c.status, c.tva
    FROM`contacts`as c
    WHERE c.type = 1
    AND c.id = c.owner_id
    $order_by

    ");

    $req->execute(array(
//        'order_by' => $order_by,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_according_company_and_type($owner_id, $type) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM`contacts`WHERE owner_id = :owner_id AND type = :type ORDER BY name, lastname ');
    $req->execute(array(
        'owner_id' => "$owner_id",
        "type" => $type
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_according_company_and_type_no_root($office_id, $type) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT c.id, c.owner_id, c.type, c.title, c.name, 
                    c.lastname, c.birthdate, c.tva, c.billing_method, 
                    c.discounts, c.code, c.language, c.order_by, c.status,
                    u.contact_id, u.rol
            
            FROM `contacts` as c 
            
            JOIN `users` as u ON c.id = u.contact_id 

            WHERE c.id IN (SELECT id FROM contacts WHERE owner_id = :office_id )
            
            AND u.rol != 'root' AND c.type = :type 
            
              ");

    $req->execute(array(
        "office_id" => $office_id,
        "type" => $type,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_headoffice_of_contact_id($contact_id) {

    // a quien pertenece el contacto
    $owner_id = contacts_field_id("owner_id", $contact_id);

    // saco el headoffice de la oficina    
    $office_owner_id = contacts_field_id("owner_id", $owner_id);

    return ($office_owner_id) ? $office_owner_id : false;
}

function contacts_avatar($contact_id) {
    $title = contacts_field_id('title', $contact_id);

    switch ($title) {
//        case 'Mr.':
//            $avatar = "el.png"; 
//            break;
        case 'Mr.':
        case 'Miss':
        case 'Mirs.':
            $avatar = "user.png";
            break;

        default:
            $avatar = "user.png";
            break;
    }

    echo '<img src="www/gallery/img/' . $avatar . '" class="img-thumbnail img-responsive img-rounded " >';
}

function contacts_picture($contact_id, $w = 50, $class = 'media-object') {

    $pic = contacts_picture_src($contact_id);

    return '<img class="' . $class . '" src="' . $pic . '" width="' . $w . '" alt="...">';
}

function contact_type_contact($contact) {

    $type = false;

    if (!$contact) {
        $type = 0; // indefinido
    }

    if ($contact['type'] == 1 && $contact['tva']) {
        $type = 1; // headoffice
    }


    if ($contact['type'] == 1 && !$contact['tva']) {
        $type = 2; // oficina
    }

    if ($contact['type'] == 0) {
        $type = 3; // contacto
    }

    // esta en la tabla de pacientes
    if (patients_field_by_contact_id('company_id', $contact['id'])) {
        $type = 4; // contacto y paciente
    }

    return $type;
}

function contacts_picture_src($contact_id) {
    global $config_db;

    $type_contact = contact_type_contact(contacts_details($contact_id));

    $contacts_picture_in_db = user_options("contacts_picture", $contact_id);
    $class = "";

    // headoffice
    $pic_headoffice = "www/gallery/img/_" . $config_db . "/users/" . $contacts_picture_in_db;
    $pic_h = (file_exists($pic_headoffice) && $contacts_picture_in_db) ? $pic_headoffice : "www/gallery/img/company.jpg";

    // $pic_office
    $pic_office = "www/gallery/img/_" . $config_db . "/users/" . $contacts_picture_in_db;
    $pic_o = (file_exists($pic_office) && $contacts_picture_in_db) ? $pic_office : "www/gallery/img/office.jpg";

    $pic_contact = "www/gallery/img/_" . $config_db . "/users/" . $contacts_picture_in_db;
    $pic_c = (file_exists($pic_contact) && $contacts_picture_in_db) ? $pic_contact : "www/gallery/img/contact.jpg";

    // contact && patient
    $pic_patient = "www/gallery/img/_" . $config_db . "/users/" . $contacts_picture_in_db;
    $pic_p = (file_exists($pic_patient) && $contacts_picture_in_db) ? $pic_patient : "www/gallery/img/patient.jpg";

    switch ($type_contact) {
        case 0: // indefinido
            $pic = "www/gallery/img/user.jpg";
            break;
        case 1: // headoffice
            $pic = $pic_h;
            break;
        case 2: // office
            $pic = $pic_o;
            break;
        case 3: // contact
            $pic = $pic_c;
            break;
        case 4: // Patient
            $pic = $pic_p;
            break;

        default: // indefinido
            break;
    }

    return $pic;
}

function contacts_list_errors_tva() {

    $contacts_list = contacts_list();

    $total = 0;
    foreach ($contacts_list as $key => $contact) {
        if (($contact['tva']) && ($contact['tva'] != tva_formated($contact['tva']))) {
            $total = $total + 1;
        }
    }

    return $total;
}

function contacts_have_user($contact_id, $email, $login = false) {

    $r = 1;
    if (users_field_contact_id('id', $contact_id)) {
        $r = 2;
    }

    if (users_according_email($email)) {
        $r = 3;
    }

    if (users_according_login($login)) {
        $r = 4;
    }

    return $r;
}

// un contacto tiene facturas mensuales?
// yes 
// no 

function contacts_have_monthly_invoices($contact_id) {
    // lista de facturas mensales de un contacto 

    $total = invoices_total_by_client_id_type($contact_id, 'M');

    return $total ?? 0;
}

function contacts_update_field($contact_id, $field, $new_data) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `:field`=:new_data  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'field' => $field,
        'new_data' => $new_data
            )
    );
}

function contacts_update_order_by($contact_id, $new_data) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `order_by`=:new_data  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_data' => $new_data
            )
    );
}

//*********************


function contacts_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts WHERE code = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function contacts_field_tva($field, $tva) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts WHERE tva = ?");
    $req->execute(array($tva));
    $data = $req->fetch();

    return (isset($data[0])) ? $data[0] : false;
}

function xxxxxlogs_list_by_contact_id($contact_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `logs` WHERE u_id = :u_id ORDER BY `id` DESC ");

    $req->execute(array(
        "u_id" => $contact_id,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_offices_list_by_contact($contact_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM contacts WHERE owner_id = :owner_id AND type = :type ORDER BY status, name");
    $req->execute(array(
        "owner_id" => $contact_id,
        "type" => 1
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_extructure() {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('DESCRIBE contacts ');
    $req->execute(array(
        'limit' => "$limit"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_by_type($type, $start = 0, $limit = 999999) {
    global $db;
    $sql = "SELECT * FROM `contacts` WHERE `type` = :type ORDER BY name Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

/**
 * Lista de mis contactos sin tomar en cuenta los de mi empresa
 * @global type $db
 * @param type $type
 * @param type $start
 * @param type $limit
 * @return type
 */
function contacts_list_by_type_without_my_company($type, $start = 0, $limit = 999) {
    global $db;

    $sql = "
    SELECT *
    FROM `contacts`
    WHERE `type` = :type AND owner_id <> 1022
    ORDER BY id DESC, owner_id, name
    Limit :limit OFFSET :start ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_list_headoffice_without_my_company($start = 0, $limit = 999) {
    global $db;

    $sql = "
    SELECT *
    FROM `contacts`
    WHERE owner_id <> 1022 AND id = owner_id
    ORDER BY id DESC
    Limit :limit OFFSET :start ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_list_by_owner_id($owner_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE (owner_id = :owner_id ) ORDER BY id DESC   ');
    $req->execute(array(
        'owner_id' => "$owner_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_according_company($owner_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE owner_id = :owner_id ORDER BY id DESC  ');
    $req->execute(array(
        'owner_id' => "$owner_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_discounts_list() {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT DISTINCT(discounts) FROM contacts ORDER BY discounts DESC ');
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_title_list() {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT DISTINCT(title) FROM contacts ');
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_companies_list_according_contact($contact_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts_positions WHERE contact_id = :contact_id   ');
    $req->execute(array(
        'contact_id' => "$contact_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthdate) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name AND '
            . 'lastname = :lastname AND '
            . 'birthdate = :birthdate  '
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_company_name($owner_id, $name) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name '
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_by_company_and_name_lastname_birthdate($owner_id, $txt = "") {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name LIKE :name OR '
            . 'lastname LIKE :lastname OR '
            . 'birthdate = :birthdate  '
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => "%$txt%",
        'lastname' => "%$txt%",
        'birthdate' => "%$txt%",
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_by_tva($tva, $order_by = 'id') {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE tva like :tva ORDER BY :order_by ');
    $req->execute(array(
        'tva' => "%$tva%",
        'order_by' => $order_by,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_by_type($type, $order_by = 'id') {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE type=:type ORDER BY :order_by ');
    $req->execute(array(
        'type' => $type,
        'order_by' => $order_by,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_by_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE code=:code ');
    $req->execute(array(
        'code' => $code
    ));
    $data = $req->fetch();
    return $data;
}

//function contacts_search_bloqued() {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT c.id, c.owner_id, c.type, c.title, c.name, c.lastname, c.birthdate FROM contacts as c INNER JOIN users as u ON c.id = u.contact_id WHERE u.status = :status');
//    //$req = $db->prepare('SELECT * FROM contacts INNER JOIN users ON contacts.id = users.contact_id ');
//    $req->execute(array(
//        'status' => USER_BLOCKED
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function contacts_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM contacts WHERE id=?');
    $req->execute(array($id));
}

function contacts_edit_company($id, $name, $status, $tva, $discounts) {
    global $db;
    $req = $db->prepare(
            'UPDATE contacts  
            SET 
            name = :name, 
            status = :status, 
            tva = :tva, 
            discounts=:discounts 
            WHERE id=:id');
    $req->execute(array(
        'id' => $id,
        'name' => $name,
        'status' => $status,
        'tva' => $tva,
        'discounts' => $discounts
    ));
}

//function contacts_edit_owner($id, $new_owner_id) {
//    global $db;
//    $req = $db->prepare('UPDATE contacts  SET owner_id = :new_owner_id  WHERE id=:id');
//    $req->execute(array(
//        'id' => $id,
//        'new_owner_id' => $new_owner_id
//    ));
//}

function contacts_add_company($contact_id, $tva) {
    global $db;
    $req = $db->prepare('INSERT INTO companies (id,   contact_id, tva)
                                       VALUES (:id,  :contact_id, :tva)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'tva' => $tva
            )
    );
}

function contacts_add_employee($company_id, $contact_id, $owner_ref, $cargo) {
    global $db;

    //$req = $db->prepare('INSERT INTO `companies` (`id`,   `company_id`,  `contact_id`,  `owner_ref`,  `cargo`,  `order_by`,  `status`)                                       VALUES (:id,  :company_id, :contact_id, :owner_ref, :cargo, :order_by, :status)');
    $req = $db->prepare("INSERT INTO `employees` (`id`, `company_id`, `contact_id`, `owner_ref`, `date`, `cargo`, `order_by`, `status`) "
            . "VALUES (:id, :company_id, :contact_id, :owner_ref, CURRENT_TIMESTAMP, :cargo, :order_by, :status)");

    $req->execute(array(
        'id' => null,
        'company_id' => $company_id,
        'contact_id' => $contact_id,
        'owner_ref' => $owner_ref,
        'cargo' => $cargo,
        'order_by' => null,
        'status' => null,
            )
    );
}

function contacts_add_patient($company_id, $company_ref, $contact_id, $status) {
    global $db;
    $req = $db->prepare('INSERT INTO patients (id,   company_id,  company_ref,  contact_id,  order_by,  status)
                                       VALUES (:id, :company_id, :company_ref, :contact_id, :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'company_id' => $company_id,
        'company_ref' => $company_ref,
        'contact_id' => $contact_id,
        'order_by' => 0,
        'status' => 1
            )
    );
}

function contacts_add_contact($owner_id, $type, $title, $name, $lastname, $birthday) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts (id, owner_id, type,   title,  name,  lastname,  birthdate,  order_by,  status)
                                       VALUES (:id, :owner_id, :type, :title, :name, :lastname, :birthdate, :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'owner_id' => $owner_id,
        'type' => $type,
        'title' => $title,
        'name' => "$name",
        'lastname' => $lastname,
        'birthdate' => $birthday,
        'order_by' => 0,
        'status' => 1
            )
    );
}

function contacts_cat_add($contact_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts_categories (id, contact_id, category_id)
                                       VALUES (:id, :contact_id, :category_id)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'category_id' => $category_id
            )
    );
}

function contacts_cat_del($contact_id, $category_id) {
    global $db;
    $req = $db->prepare('DELETE FROM contacts_categories WHERE (category_id = :category_id AND contact_id = :contact_id)');
    $req->execute(array(
        'contact_id' => $contact_id,
        'category_id' => $category_id
            )
    );
}

function contacts_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM contacts WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `contacts_categories` JOIN contacts WHERE contacts.id = contacts_categories.contact_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

function contacts_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_by_type($type = false) {
    global $db;

    $data = 0;

    if ($type) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE type= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
    }

    $req->execute(array($type));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_with_tva() {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE tva IS NOT NULL');

    $req->execute();

    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_by_discount($discount = NULL) {
    global $db;

    $data = 0;

    if ($discount == NULL) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts IS NULL');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts = :discount');
    }

    $req->execute(array(
        "discount" => $discount
    ));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_by_title($title = NULL) {
    global $db;

    $data = 0;

    if ($title == NULL) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title IS NULL');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title = :title');
    }

    $req->execute(array(
        "title" => $title
    ));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_photo($id, $w = false, $h = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = contacts_field_id("photo", $id);

    if (file_exists("www/gallery/img/contacts/$photo")) {
        echo "<img class = \"img-responsive\" src=\"www/gallery/img/contacts/$photo\" >";
    } else {
        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts/art.png\" >";
    }
}

function contacts_photos($contact_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM contacts_photos WHERE contact_id = :contact_id");
    $req->execute(array(
        'contact_id' => $contact_id));

    $data = $req->fetchall();

    return $data;
}

function contacts_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = contacts_field_id("photo", $id);

    if (file_exists("www/gallery/img/contacts/$photo")) {
        return "<img src=\"www/gallery/img/contacts/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/contacts/art.png\" width=\"$w\">";
    }
}

function type_contactxxxxxxxxxxxxxxxxxxx($id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT category FROM categories WHERE id = ? ");
    $req->execute();
    $data = $req->fetchall();
    return $data;
}

function contacts_categories($contact_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM contacts_categories WHERE contact_id = :contact_id ");

    $req->execute(array(
        'contact_id' => $contact_id));

    $data = $req->fetchall();

    return $data;
}

function contacts_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM contacts_photos WHERE contact_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function contacts_type($type) {

    switch ($type) {
        case 0:
            return "Patient";
            break;

        case 1:
            return "Laboratorio";
            break;

        default:
            return "indefinido";
            break;
    }
}

function contacts_status($status) {

    switch ($status) {
        case -1:
            return "Bloqued";
            break;

        case 0:
            return "Waiting";
            break;

        case 1:
            return "Activated";
            break;

        default:
            return "indefinido";
            break;
    }
}

function contacts_status_list() {

    return $status = array(-1, 0, 1);
}

function contacts_password_update($contact_id, $password) {
    global $db;
    $req = $db->prepare('UPDATE users SET password=:password  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'password' => $password,
            )
    );
}

function contacts_block($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_BLOCKED,
            )
    );
}

function contacts_unblock($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_ONLINE,
            )
    );
}

function contacts_approve($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_ONLINE
            )
    );
}

function contacts_is_headoffice($contact_id) {
    return ( contacts_field_id("owner_id", $contact_id) == $contact_id ) ? true : false;
}

function contacts_is_contact_of_headoffice($contact_id, $headoffice_id) {

    // a quien pertenece el contacto
    $owner_id = contacts_field_id("owner_id", $contact_id);

    // saco el headoffice de la oficina    
    $office_owner_id = contacts_field_id("owner_id", $owner_id);

    // comparo el headoffice del empleado con el enviado    
    return ($office_owner_id == $headoffice_id ) ? true : false;
}

function contacts_search_tva($tva) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE tva = :tva   ');
    $req->execute(array(
        'tva' => $tva
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_patient_of($contact_id) {
    // saco la oficina
    // si esta es sede
    // sino saco la sede
}

function contacts_work_at($contact_id) {

    return (employees_office_by_contact($contact_id)) ? employees_office_by_contact($contact_id) : false;
}

function contacts_work_for($contact_id) {

    $val = contacts_field_id("owner_id", contacts_work_at($contact_id));

    return ($val) ? $val : false;
}

function contacts_update_owner_id($contact_id, $new_owner_id) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET owner_id=:owner_id  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'owner_id' => $new_owner_id
            )
    );
}

function contacts_discounts_update($contact_id, $new_discount) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET discounts=:discounts  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'discounts' => $new_discount
            )
    );
}

///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
//function contacts_field_code($field, $code) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `code`= ?");
//    $req->execute(array($code));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data[0])) ? $data[0] : false;
//}
//function contacts_field_tva($field, $tva) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `tva` = ?");
//    $req->execute(array($tva));
//    $data = $req->fetch();
//
//    return (isset($data[0])) ? $data[0] : false;
//}
//function contacts_offices_list_by_contact($contact_id) {
//    global $db;
//    $req = $db->prepare("SELECT * FROM contacts WHERE owner_id = :owner_id AND type = :type ORDER BY tva DESC, name, status ");
//    $req->execute(array(
//        "owner_id" => $contact_id,
//        "type" => 1
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//
//function contacts_extructure() {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('DESCRIBE contacts ');
//    $req->execute(array(
//        'limit' => "$limit"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function contacts_list_by_type($type, $start = 0, $limit = 999) {
//    global $db;
//    if ($limit) {
//        $sql = "SELECT * FROM `contacts` WHERE `type` = :type ORDER BY id DESC Limit :limit OFFSET :start  ";
//    } else {
//        $sql = "SELECT * FROM `contacts` WHERE `type` = :type ORDER BY id DESC   ";
//    }
//    $query = $db->prepare($sql);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}

function contacts_list_by_headOffice($type = 1, $limit = 999, $start = 0) {
    global $db;

    if ($limit) {
        $sql = "SELECT * FROM `contacts` WHERE `type` = :type AND tva IS NOT NULL ORDER BY name  Limit :limit OFFSET :start  ";
    } else {
        $sql = "SELECT * FROM `contacts` WHERE `type` = :type AND tva IS NOT NULL ORDER BY name   ";
    }

    $query = $db->prepare($sql);

    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetchall();

    return $data;
}

//function contacts_list_by_owner_id($owner_id, $start = 0, $limit = 999) {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $sql = 'SELECT * FROM contacts WHERE (owner_id = :owner_id ) ORDER BY id DESC Limit :limit OFFSET :start  ';
//    $query = $db->prepare($sql);
//    $query->bindValue(':owner_id', (int) $owner_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}
//function contacts_list_according_company($owner_id) {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts WHERE owner_id = :owner_id ORDER BY name  ');
//    $req->execute(array(
//        'owner_id' => "$owner_id"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function contacts_discounts_list() {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('SELECT DISTINCT(discounts) FROM contacts ORDER BY discounts DESC ');
//    $req->execute(array(
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function contacts_title_list() {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('SELECT DISTINCT(title) FROM contacts ');
//    $req->execute(array(
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//
//function contacts_companies_list_according_contact($contact_id) {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts_positions WHERE contact_id = :contact_id   ');
//    $req->execute(array(
//        'contact_id' => "$contact_id"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function contacts_companies_list_with_tva() {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM `contacts` WHERE `tva` IS NOT NULL  ');
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

//function contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthdate) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts WHERE '
//            . 'owner_id = :owner_id AND '
//            . 'name = :name AND '
//            . 'lastname = :lastname AND '
//            . 'birthdate = :birthdate  '
//            . 'ORDER BY name ');
//    $req->execute(array(
//        'owner_id' => $owner_id,
//        'name' => $name,
//        'lastname' => $lastname,
//        'birthdate' => $birthdate,
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function contacts_search_company_name($owner_id, $name) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts WHERE '
//            . 'owner_id = :owner_id AND '
//            . 'name = :name '
//            . 'ORDER BY name ');
//    $req->execute(array(
//        'owner_id' => $owner_id,
//        'name' => $name
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function contacts_search_by_company_name_lastname_birthdate($owner_id, $name, $lastname, $birthdate) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name AND '
            . 'lastname = :lastname AND '
            . 'birthdate = :birthdate  '
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_contact_anonymus($company_id) {
    global $config_company_name;

    $name = $config_company_name;
    $lastname = 'Order';
    $birthdate = "1900-01-01";

    $contact_array = contacts_search_by_company_id_name_lastname_birthdate($company_id, $name, $lastname, $birthdate);
    // send onlye the first
    return ($contact_array[0]) ? $contact_array[0] : false;
}

function contacts_is_anonymus($contact_id, $office_id) {

    if ($contact_id == contacts_search_contact_anonymus($office_id)['id']) {
        return 1;
    } else {
        return 0;
    }
}

function contacts_push_contact_anonymus($company_id) {

    global $config_company_name;

    $name = $config_company_name;
    $lastname = 'Order';
    $birthdate = "1900-01-01";

    $code = magia_uniqid();

    $email = "$code@$code.com";

// si existe, regresa su id 
    if (contacts_search_contact_anonymus($company_id)) {
        return contacts_search_contact_anonymus($company_id);
    } else { // sino lo registra y regresa su id            
        contacts_add($company_id, 0, null, $name, $lastname, $birthdate, null, $code, 1, 1);

        // busco el agregado 
        $contactslastInsertId = contacts_field_code("id", $code);

        // agrego email 
        directory_add($contactslastInsertId, null, 'Email', $email, $code, 1, 1);

        // agrego como empleado
        employees_add($company_id, $contactslastInsertId, '0', date("Y-m-d"), 'NONE', 1, 1);

        // agrego login y clave              
        users_add($contactslastInsertId, 'en_GB', 'Audiologist', $email, magia_uniqid(), $email, $code, 1);

        return contacts_search_contact_anonymus($company_id);
    }
}

function contacts_search_by_company_id_name_lastname_birthdate($company_id, $name, $lastname, $birthdate) {
    global $db;

    $sql = 'SELECT * FROM contacts WHERE '
            . 'owner_id =:owner_id AND '
            . 'name =:name AND '
            . 'lastname =:lastname AND '
            . 'birthdate =:birthdate  '
            . 'ORDER BY name  ';

    $query = $db->prepare($sql);
    $query->bindValue(':owner_id', (int) $company_id, PDO::PARAM_INT);
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function contacts_search_by_company_and_name_lastname_birthdate($owner_id, $txt = "", $start = 0, $limit = 999) {
//    global $db;
//
//    $sql = 'SELECT * FROM contacts WHERE '
//            . 'owner_id = :owner_id AND '
//            . 'name LIKE :name OR '
//            . 'lastname LIKE :lastname OR '
//            . 'birthdate = :birthdate  '
//            . 'ORDER BY name Limit  :limit OFFSET :start ';
//
//    $query = $db->prepare($sql);
//    $query->bindValue(':owner_id', (int) $owner_id, PDO::PARAM_INT);
//    $query->bindValue(':name', "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':lastname', "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':birthdate', "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}

function contacts_search_bloqued($start = 0, $limit = 999) {
    global $db;

    $sql = '
            SELECT c.id, c.owner_id, c.type, c.title, c.name, c.lastname, c.birthdate 
            FROM contacts as c 
            INNER JOIN users as u 
            ON c.id = u.contact_id 
            WHERE u.status = :status 
            Limit  :limit OFFSET :start   ';

    $query = $db->prepare($sql);
    $query->bindValue(':status', USER_BLOCKED, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_search_by_billing_method($bm, $start = 0, $limit = 999) {
    global $db;

    $sql = 'SELECT * FROM contacts WHERE billing_method = :billing_method Limit  :limit OFFSET :start  ';
    $query = $db->prepare($sql);
    $query->bindValue(':billing_method', $bm, PDO::PARAM_STR);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_search_by_id_array($array_ids, $start = 0, $limit = 999999) {
    global $db;

    $in = str_repeat('?,', count($array_ids) - 1) . '?';

    $sql = "SELECT * FROM contacts WHERE id IN ($in)    ";
    $query = $db->prepare($sql);
//    $query->bindValue(':billing_method', $bm, PDO::PARAM_STR);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function contacts_del($id) {
//    global $db;
//    $req = $db->prepare('DELETE FROM contacts WHERE id=?');
//    $req->execute(array($id));
//}
//function contacts_edit_company($id, $name, $status, $tva, $discounts) {
//    global $db;
//    $req = $db->prepare(
//            'UPDATE contacts  
//            SET 
//            name = :name, 
//            status = :status, 
//            tva = :tva, 
//            discounts=:discounts 
//            WHERE id=:id');
//    $req->execute(array(
//        'id' => $id,
//        'name' => $name,
//        'status' => $status,
//        'tva' => $tva,
//        'discounts' => $discounts
//    ));
//}

function contacts_edit_owner($id, $new_owner_id) {
    global $db;
    $req = $db->prepare('UPDATE contacts  SET owner_id = :new_owner_id  WHERE id=:id');
    $req->execute(array(
        'id' => $id,
        'new_owner_id' => $new_owner_id
    ));
}

//function contacts_add_company($contact_id, $tva) {
//    global $db;
//    $req = $db->prepare('INSERT INTO companies (id,   contact_id, tva)
//                                       VALUES (:id,  :contact_id, :tva)');
//
//    $req->execute(array(
//        'id' => null,
//        'contact_id' => $contact_id,
//        'tva' => $tva
//            )
//    );
//}
//function contacts_add_employee($company_id, $contact_id, $owner_ref, $cargo) {
//    global $db;
//
//
//
//    //$req = $db->prepare('INSERT INTO `companies` (`id`,   `company_id`,  `contact_id`,  `owner_ref`,  `cargo`,  `order_by`,  `status`)                                       VALUES (:id,  :company_id, :contact_id, :owner_ref, :cargo, :order_by, :status)');
//    $req = $db->prepare("INSERT INTO `employees` (`id`, `company_id`, `contact_id`, `owner_ref`, `date`, `cargo`, `order_by`, `status`) "
//            . "VALUES (:id, :company_id, :contact_id, :owner_ref, CURRENT_TIMESTAMP, :cargo, :order_by, :status)");
//
//    $req->execute(array(
//        'id' => null,
//        'company_id' => $company_id,
//        'contact_id' => $contact_id,
//        'owner_ref' => $owner_ref,
//        'cargo' => $cargo,
//        'order_by' => null,
//        'status' => null,
//            )
//    );
//}
//
//function contacts_add_patient($company_id, $company_ref, $contact_id, $status) {
//    global $db;
//    $req = $db->prepare('INSERT INTO patients (id,   company_id,  company_ref,  contact_id,  order_by,  status)
//                                       VALUES (:id, :company_id, :company_ref, :contact_id, :order_by, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'company_id' => $company_id,
//        'company_ref' => $company_ref,
//        'contact_id' => $contact_id,
//        'order_by' => 0,
//        'status' => 1
//            )
//    );
//}
//function contacts_add_contact($owner_id, $type, $title, $name, $lastname, $birthday) {
//    global $db;
//    $req = $db->prepare('INSERT INTO contacts (id, owner_id, type,   title,  name,  lastname,  birthdate,  order_by,  status)
//                                       VALUES (:id, :owner_id, :type, :title, :name, :lastname, :birthdate, :order_by, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'owner_id' => $owner_id,
//        'type' => $type,
//        'title' => $title,
//        'name' => "$name",
//        'lastname' => $lastname,
//        'birthdate' => $birthday,
//        'order_by' => 0,
//        'status' => 1
//            )
//    );
//}
//function contacts_cat_add($contact_id, $category_id) {
//    global $db;
//    $req = $db->prepare('INSERT INTO contacts_categories (id, contact_id, category_id)
//                                       VALUES (:id, :contact_id, :category_id)');
//
//    $req->execute(array(
//        'id' => null,
//        'contact_id' => $contact_id,
//        'category_id' => $category_id
//            )
//    );
//}
//function contacts_cat_del($contact_id, $category_id) {
//    global $db;
//    $req = $db->prepare('DELETE FROM contacts_categories WHERE (category_id = :category_id AND contact_id = :contact_id)');
//    $req->execute(array(
//        'contact_id' => $contact_id,
//        'category_id' => $category_id
//            )
//    );
//}

/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
//function contacts_by_category($id_category) {
//    global $db;
//
//    $data = null;
//
//    //$req = $db->prepare('SELECT * FROM contacts WHERE type_id= ?');
//    $req = $db->prepare('SELECT * FROM `contacts_categories` JOIN contacts WHERE contacts.id = contacts_categories.contact_id AND category_id = ?');
//    $req->execute(array($id_category));
//    $data = $req->fetchall();
//
//    return $data;
//}

/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
//function contacts_total_by_category($id_category = false) {
//    global $db;
//
//    $data = 0;
//
//    if ($id_category) {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts_categories WHERE category_id= ?');
//    } else {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
//    }
//
//    $req->execute(array($id_category));
//    $data = $req->fetchall();
//
//    return $data[0][0];
//}
//function contacts_total_by_type($type = false) {
//    global $db;
//
//    $data = 0;
//
//    if ($type == 1 || $type == 0) {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE type= ?');
//    } else {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
//    }
//
//    $req->execute(array($type));
//    $data = $req->fetchall();
//
//    return $data[0][0];
//}
//function contacts_total_with_tva() {
//    global $db;
//    $data = 0;
//    $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE tva IS NOT NULL');
//    $req->execute();
//    $data = $req->fetchall();
//    return $data[0][0];
//}
//
//function contacts_total_by_discount($discount = NULL) {
//    global $db;
//
//    $data = 0;
//
//    if ($discount == NULL) {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts IS NULL');
//    } else {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts = :discount');
//    }
//
//    $req->execute(array(
//        "discount" => $discount
//    ));
//    $data = $req->fetchall();
//
//    return $data[0][0];
//}
//function contacts_total_by_title($title = NULL) {
//    global $db;
//
//    $data = 0;
//
//    if ($title == NULL) {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title IS NULL');
//    } else {
//        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title = :title');
//    }
//
//    $req->execute(array(
//        "title" => $title
//    ));
//    $data = $req->fetchall();
//
//    return $data[0][0];
//}
//function contacts_photo($id, $w = false, $h = false) {
//    // si la foto existe, mostramos sino la por defecto 
//    $photo = contacts_field_id("photo", $id);
//
//    if (file_exists("www/gallery/img/contacts/$photo")) {
//        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts/$photo\" >";
//    } else {
//        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts/art.png\" >";
//    }
//}
//function contacts_photos($contact_id) {
//    global $db;
//    $data = false;
//    $req = $db->prepare("SELECT * FROM contacts_photos WHERE contact_id = :contact_id");
//    $req->execute(array(
//        'contact_id' => $contact_id));
//
//    $data = $req->fetchall();
//
//    return $data;
//}
//function contacts_photo_r($id, $w = false, $l = false) {
//    // si la foto existe, mostramos sino la por defecto 
//    $photo = contacts_field_id("photo", $id);
//
//    if (file_exists("www/gallery/img/contacts/$photo")) {
//        return "<img src=\"www/gallery/img/contacts/$photo\" width=\"$w\">";
//    } else {
//        return "<img src=\"www/gallery/img/contacts/art.png\" width=\"$w\">";
//    }
//}
//function contacts_categories($contact_id) {
//    global $db;
//
//    $data = false;
//
//    $req = $db->prepare("SELECT category_id FROM contacts_categories WHERE contact_id = :contact_id ");
//
//    $req->execute(array(
//        'contact_id' => $contact_id));
//
//    $data = $req->fetchall();
//
//    return $data;
//}
//function contacts_photos_total($id) {
//    global $db;
//    $data = 0;
//    $req = $db->prepare('SELECT COUNT(*) FROM contacts_photos WHERE contact_id= ?');
//    $req->execute(array($id));
//    $data = $req->fetchall();
//    return $data[0][0];
//}
//function contacts_type($type) {
//
//    switch ($type) {
//        case 0:
//            return "Patient";
//            break;
//
//        case 1:
//            return "Laboratorio";
//            break;
//
//        default:
//            return "indefinido";
//            break;
//    }
//}
//function contacts_status($status) {
//
//    switch ($status) {
//        case -1:
//            return "Bloqued";
//            break;
//
//        case 0:
//            return "Waiting";
//            break;
//
//        case 1:
//            return "Activated";
//            break;
//
//        default:
//            return "indefinido";
//            break;
//    }
//}
//function contacts_status_list() {
//
//    return $status = array(-1, 0, 1);
//}
//function contacts_password_update($contact_id, $password) {
//    global $db, $u_id;
//    $req = $db->prepare('UPDATE users SET password=:password  WHERE contact_id=:contact_id ');
//
//    $req->execute(array(
//        'contact_id' => $contact_id,
//        'password' => $password,
//            )
//    );
//}
//
//function contacts_block($contact_id) {
//    global $db;
//    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');
//
//    $req->execute(array(
//        'contact_id' => $contact_id,
//        'status' => USER_BLOCKED,
//            )
//    );
//}
//function contacts_unblock($contact_id) {
//    global $db;
//    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');
//
//    $req->execute(array(
//        'contact_id' => $contact_id,
//        'status' => USER_ONLINE,
//            )
//    );
//}
//function contacts_approve($contact_id) {
//    global $db;
//    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');
//
//    $req->execute(array(
//        'contact_id' => $contact_id,
//        'status' => USER_ONLINE
//            )
//    );
//}
//function contacts_is_headoffice($contact_id) {
//    return ( contacts_field_id("owner_id", $contact_id) == $contact_id ) ? true : false;
//}
//function contacts_is_contact_of_headoffice($contact_id, $headoffice_id) {
//
//    // a quien pertenece el contacto
//    $owner_id = contacts_field_id("owner_id", $contact_id);
//
//    // saco el headoffice de la oficina    
//    $office_owner_id = contacts_field_id("owner_id", $owner_id);
//
//    // comparo el headoffice del empleado con el enviado    
//    return ($office_owner_id == $headoffice_id ) ? true : false;
//}
//function contacts_search_tva($tva) {
//    global $db;
//    $limit = 10;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts WHERE tva = :tva   ');
//    $req->execute(array(
//        'tva' => $tva
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function contacts_patient_of($contact_id) {
//    // saco la oficina
//    // si esta es sede
//    // sino saco la sede
//}
//function contacts_work_at($contact_id) {
//
//    return (employees_office_by_contact($contact_id)) ? employees_office_by_contact($contact_id) : false;
//}
//function contacts_work_for($contact_id) {
//
//    $val = contacts_field_id("owner_id", contacts_work_at($contact_id));
//
//    return ($val) ? $val : false;
//}
//function contacts_update_owner_id($contact_id, $new_owner_id) {
//    global $db;
//    $req = $db->prepare('UPDATE `contacts` SET owner_id=:owner_id  WHERE id=:id ');
//
//    $req->execute(array(
//        'id' => $contact_id,
//        'owner_id' => $new_owner_id
//            )
//    );
//}
//function contacts_discounts_update($contact_id, $new_discount) {
//    global $db;
//    $req = $db->prepare('UPDATE `contacts` SET discounts=:discounts  WHERE id=:id ');
//
//    $req->execute(array(
//        'id' => $contact_id,
//        'discounts' => $new_discount
//            )
//    );
//}

function contacts_update_status($contact_id, $new_status) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `status`=:new_status  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_status' => $new_status
            )
    );
}

function contacts_update_language($contact_id, $new_language) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET `language`=:new_language  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'new_language' => $new_language
            )
    );
}

////////////////////////////////////////////////////////////////////////////////
function contacts_search_by_headoffice($txt, $start = 0, $limit = 999) {
    global $db;
    $sql = '   
        SELECT * 
        FROM contacts 
        WHERE (type=1 AND tva IS NOT NULL) 
        AND (name like :txt OR id like :txt OR tva like :txt)
        ORDER BY name 
        Limit :limit OFFSET :start
        
        ';
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function contacts_search_by_type($type, $order_by = 'id', $start = 0, $limit = 999) {
//    global $db;
//
//    $sql = 'SELECT * FROM contacts WHERE type=:type ORDER BY :order_by Limit :limit OFFSET :start  ';
//
//    $query = $db->prepare($sql);
//    $query->bindValue(':order_by', $order_by, PDO ::PARAM_STR);
//    $query->bindValue(':type', (int) $type, PDO ::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO ::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO ::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}

function contacts_search_by_headofficeandoffices($txt, $start = 0, $limit = 999) {
    global $db;

    $sql = '   
        SELECT * 
        FROM contacts 
        WHERE (type=1 ) 
        AND (name like :txt OR owner_id = :txt )
        ORDER BY owner_id, name DESC
        Limit :limit OFFSET :start
        
        ';
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "% $txt%", PDO ::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO ::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO ::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_search_by_contacts($txt, $start = 0, $limit = 999) {
    global $db;
    $sql = '   
        SELECT * 
        FROM contacts 
        WHERE (type=0 ) 
        AND name like :txt OR lastname like :txt
        ORDER BY name, lastname, owner_id 
        Limit  :limit OFFSET :start
        ';

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "% $txt%", PDO ::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO ::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO ::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function contacts_offices_add($office_name, $owner_id, $code) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts ( `id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `discounts`, `code`, `language`, `order_by`, `status`)
                                       VALUES (:id,   :owner_id,   :type, :title, :name, :lastname, :birthdate, :tva, :discounts, :code, :language, :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'owner_id' => $owner_id,
        'type' => 1,
        'title' => null,
        'name' => $office_name,
        'lastname' => null,
        'birthdate' => null,
        'tva' => null,
        'discounts' => null,
        'code' => $code,
        'language' => null,
        'order_by' => 1,
        'status' => 1
            )
    );
}

function contacts_offices_search($owner_id, $name) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE  owner_id = :owner_id AND name = :name ');
    $req->execute(array
        (
        'owner_id' => $owner_id,
        'name' => $name
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_why_cannot_change_office($contact_id) {
    $r = array()

    ;
    // si tiene pedidos a nombre de el

    if (1 == 1) {
        array_push($r, 'The contact has pedidos');
    }
    // si es paciente de una oficina 



    return $r;
}

// lista de contactos con facturas mensuales y metodo de facturacion no mensual

function contacts_list_with_monthly_invoices_and_billing_method_not_monthly() {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT distinct(c.id) FROM contacts as c 
            JOIN invoices as i 
            ON c.id = i.client_id
            WHERE  i.type = 'M'  AND ( c.billing_method <> 'M' OR c.billing_method is NULL )
            ");
    $req->execute(array(
            //  'owner_id' => $owner_id,
            //  'name' => $name
            )
    );
    $data = $req->fetchall();
    return $data;
}

function contacts_list_with_tva() {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * FROM contacts
            WHERE tva IS NOT NULL AND tva <> '' ORDER BY name
            ");
    $req->execute(array()
    );
    $data = $req->fetchall();
    return $data;
}

function contacts_list_without_tva() {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * FROM contacts
            WHERE tva IS  NULL OR tva = '' ORDER BY name
            ");
    $req->execute(array()
    );
    $data = $req->fetchall();
    return $data;
}

function contacts_export_list_individual_only() {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * FROM contacts
            WHERE tva IS  NULL AND (id = owner_id) ORDER BY name
            ");
    $req->execute(array()
    );
    $data = $req->fetchall();
    return $data;
}
