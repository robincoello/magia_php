<?php

// plugin = addresses
// creation date : 
// 
// 
function addresses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT $field 
            
            FROM addresses WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function addresses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT $field 
             
            FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function addresses_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.sector,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code as transport_code,
            addresses_transport.transport_ref as transport_ref
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            ORDER BY addresses.id DESC  Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function addresses_details($id) {
    global $db;
    $req = $db->prepare(
            "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.sector,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code,
            addresses_transport.transport_ref
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            WHERE addresses.id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function addresses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM addresses WHERE id=? ");
    $req->execute(array($id));
}

function addresses_edit($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status) {

    global $db;
    $req = $db->prepare("


UPDATE `addresses` SET 
`contact_id` = :contact_id, 
`name` = :name, 
`address` = :address, 
`number` = :number, 
`postcode` = :postcode, 
`barrio` = :barrio,
`ref` = :ref, 
`city` = :city, 
`province` = :province, 
`region` = :region, 
`country` = :country, 
`status` = :status 
WHERE `addresses`.`id` = :id          


");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "ref" => $ref,
        "city" => $city,
        "province" => $province,
        "region" => $region,
        "country" => $country,
        "status" => $status
    ));

//    vardump($req->errorInfo());
//
//    vardump(array("id" => $id,
//        "contact_id" => $contact_id,
//        "name" => $name,
//        "address" => $address,
//        "number" => $number,
//        "postcode" => $postcode,
//        "barrio" => $barrio,
//        "ref" => $ref,
//        "city" => $city,
//        "province" => $province,
//        "region" => $region,
//        "country" => $country,
//        "code" => magia_uniqid(),
//        "status" => $status));
//
//    die();
}

function addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status) {
    global $db;
    $req = $db->prepare(
            " INSERT INTO `addresses` ( `id` ,   `contact_id` ,   `name` ,   `address` ,   `number` ,   `postcode` ,   `barrio` , `ref`,  `city` , `province`,  `region` ,   `country`,  `code`,   `status`   ) VALUES  "
            . "(:id ,  :contact_id ,  :name ,  :address ,  :number ,  :postcode ,  :barrio , :ref, :city, :province, :region ,  :country , :code,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "ref" => $ref,
        "city" => $city,
        "province" => $province,
        "region" => $region,
        "country" => $country,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function addresses_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.sector,
            addresses.ref,
            addresses.city, 
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            
            addresses_transport.addresses_id,
            addresses_transport.transport_code as transport_code,
            addresses_transport.transport_ref as transport_ref
            
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            WHERE addresses.id =:txt 

            OR contact_id like :txt
            OR name like :txt
            OR address like :txt
            OR number like :txt
            OR postcode like :txt
            OR barrio like :txt
            OR sector like :txt
            OR ref like :txt
            OR city like :txt
            OR province like :txt
            OR region like :txt
            OR country like :txt
            OR status like :txt
            OR transport_code like :txt
            OR transport_ref like :txt

            ORDER BY contact_id, city, barrio, postcode, address  
            Limit :limit OFFSET :start

";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function addresses_search_by_country($country, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code as transport_code,
            addresses_transport.transport_ref as transport_ref
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            WHERE country =:country 
            ORDER BY contact_id, city, barrio, postcode, address 
            Limit :limit OFFSET :start
            ";

    $query = $db->prepare($sql);
    $query->bindValue(':country', $country, PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function addresses_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (addresses_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function addresses_search_if_exist($contact_id, $name, $number, $address, $postcode, $country) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses 
            WHERE 
            contact_id =:contact_id AND 
            name =:name AND 
            number =:number AND 
            address =:address AND 
            postcode =:postcode AND 
            country =:country
            ORDER BY contact_id, city, barrio, postcode, address 
            
            ");
    $req->execute(array(
        "contact_id" => $contact_id,
        "name" => $name,
        "number" => $number,
        "address" => $address,
        "postcode" => $postcode,
        "country" => $country
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Muestra en un panel la direccion que le pasamos como json
 * @param type $id
 */
function addresses_show_panel($addresses_json) {
    $addresses = json_decode($addresses_json, true);

    if ($addresses) {
        include view("addresses", "panel");
    } else {
        include view("addresses", "panel_noAddress");
    }
}

function addresses_format($key, $value) {

    if ($value == null || $value == false || $value == "") {
        return $value;
    }

    switch ($key) {
        case 'name':
            $res = ucfirst(strtolower(clean($value)));
            break;
        case 'address':
        case 'number':
        case 'postcode':
        case 'barrio':
        case 'ref':
        case 'city':
        case 'province':
        case 'region':
        case 'country':
        case 'status':
            $res = ucfirst(strtoupper(clean($value)));
            break;
        default:
            break;
    }
    return $res;
}

/**
 * 
 * @param type $addresses_json
 */
function addresses_show_formated($addresses_json) {
    $addresses = json_decode($addresses_json, true);

    if ($addresses) {
        include view("addresses", "formated");
    } else {
        include view("addresses", "formated_error");
    }
}

function addresses_search_by_contact_id($contact_id, $name = "all") {
    global $db;

    $data = null;

    // si mando a buscar todos los tipos de address
    if ($name == "all") {
        $req = $db->prepare(
                'SELECT * 
                FROM addresses         
                WHERE contact_id = :contact_id ');

        $req->execute(array(
            'contact_id' => $contact_id
        ));
    } else {
        $req = $db->prepare(
                'SELECT * 
                FROM addresses
                
                WHERE contact_id = :contact_id AND name = :name  ');
        $req->execute(array(
            'contact_id' => "$contact_id",
            'name' => "$name"
        ));
    }

    $data = $req->fetchall();
    return $data;
}

function addresses_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM addresses WHERE id=?');
    $req->execute(array($id));
}

function addresses_name() {
    //return array("Delivery", "Billing", "Other");
    return array("Delivery", "Billing");
}

function addresses_billing_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses              
            WHERE (contact_id=:contact_id ) AND name = 'Billing'  ");

    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_billing_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (contact_id=:contact_id ) AND name = 'Billing'  
            
            ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM `addresses`  
            
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_delivery_search_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT  
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM `addresses`  
            JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_search_by_contact_id_status($contact_id, $status) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT  
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM `addresses`  
            JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (addresses.contact_id=:contact_id ) AND addresses.name = 'Delivery' AND addresses.status =:status  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_array_to_json($address) {
    global $db;
    if ($address) {
        return json_encode($address);
    }
}

function addresses_json_to_array($address) {
    global $db;
    if ($address) {
        return json_decode($address, true);
    }
}

function addresses_field_from_array($field, $address_array) {
    return ($address_array[$field]) ? $address_array[$field] : false;
}

function addresses_list_distincts_countries() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT distinct(country) as country FROM addresses ORDER BY country  ");
    $req->execute(array());
    $data = $req->fetchall();

    return (isset($data)) ? $data : false;
}

function addresses_billing_by_contact_id_and_addresse_id($contact_id, $addresse_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id AND id = :id ) AND name = 'Billing'  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'id' => $addresse_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_delivery_by_contact_id_and_addresse_id($contact_id, $addresse_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id AND id = :id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'id' => $addresse_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_by_contact_id_and_name($contact_id, $name) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            WHERE (contact_id=:contact_id ) AND name = :name  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////

function addresses_push_by_contact_id($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status) {
    // Si hay un tipo de direccion lo edito 

    if (addresses_by_contact_id_and_name($contact_id, $name)) {

        $id = addresses_by_contact_id_and_name($contact_id, $name)['id'];

        addresses_edit($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status);
    } else {
        $code = magia_uniqid();

        addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status);

        $id = addresses_field_code('id', $code);
    }

    return $id;
}

function addresses_block($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 0,
            )
    );
}

function addresses_unblock($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 1,
            )
    );
}

function addresses_countries_list($name) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT DISTINCT(country) FROM addresses WHERE name = :name ');
    $req->execute(array(
        'name' => $name
    ));
    $data = $req->fetchall();

    return $data;
}

function addresses_total_by_countries($country) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT COUNT(country) FROM addresses WHERE country = :country ');
    $req->execute(array(
        'country' => $country
    ));
    $data = $req->fetch();

    return $data[0];
}

function addresses_contacts_list_by_country($country) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT DISTINCT(contact_id) FROM addresses WHERE country = :country ');
    $req->execute(array(
        'country' => $country
    ));
    $data = $req->fetchall();

    return $data;
}

////////////////////////////////////////////////////////////////////////////////
function addresses_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare(
            '
            SELECT 
            a.id, 
            contact_id, 
            name, 
            address, 
            number, 
            postcode, 
            barrio, 
            ref, 
            city, 
            province,
            region, 
            country, 
            code, 
            status,           
            addresses_id, 
            transport_code,
            transport_ref

           FROM addresses as a
           LEFT JOIN addresses_transport as at on at.addresses_id = a.id  

WHERE a.contact_id = ? 
            
            ORDER BY name, id DESC');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}

// ALTER TABLE `addresses_transport` ADD `transport_ref` VARCHAR(250) NULL DEFAULT NULL AFTER `transport_code`; 