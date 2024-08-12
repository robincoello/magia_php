<?php
// Para CRUD de la tabla api
// 
// plugin = api
// creation date : 2024-05-23
// 
// 
/**
 * 
 * @global type $db
 * @param type $field
 * @param type $id
 * @return type
 */
 
 function api_suma($a, $b){
     return $a + $b; 
 }
 
 
 
 
function api_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `api` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
/**
 * 
 * @global type $db
 * @param type $field
 * @param type $code
 * @return type
 */
function api_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `api` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `api` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `api_key`,  `crud`,  `date_start`,  `date_end`,  `requests_limit`,  `limit_period`,  `requests_made`,  `last_request`,  `order_by`,  `status`   
    FROM `api` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function api_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `contact_id`,  `api_key`,  `crud`,  `date_start`,  `date_end`,  `requests_limit`,  `limit_period`,  `requests_made`,  `last_request`,  `order_by`,  `status`   
    FROM `api` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function api_edit($id, $contact_id, $api_key, $crud, $date_start, $date_end, $requests_limit, $limit_period, $requests_made, $last_request, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `contact_id` =:contact_id, `api_key` =:api_key, `crud` =:crud, `date_start` =:date_start, `date_end` =:date_end, `requests_limit` =:requests_limit, `limit_period` =:limit_period, `requests_made` =:requests_made, `last_request` =:last_request, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "api_key" => $api_key,
        "crud" => $crud,
        "date_start" => $date_start,
        "date_end" => $date_end,
        "requests_limit" => $requests_limit,
        "limit_period" => $limit_period,
        "requests_made" => $requests_made,
        "last_request" => $last_request,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function api_add($contact_id, $api_key, $crud, $date_start, $date_end, $requests_limit, $limit_period, $requests_made, $last_request, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `api` ( `id` ,   `contact_id` ,   `api_key` ,   `crud` ,   `date_start` ,   `date_end` ,   `requests_limit` ,   `limit_period` ,   `requests_made` ,   `last_request` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :api_key ,  :crud ,  :date_start ,  :date_end ,  :requests_limit ,  :limit_period ,  :requests_made ,  :last_request ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "api_key" => $api_key,
        "crud" => $crud,
        "date_start" => $date_start,
        "date_end" => $date_end,
        "requests_limit" => $requests_limit,
        "limit_period" => $limit_period,
        "requests_made" => $requests_made,
        "last_request" => $last_request,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function api_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `api_key`,  `crud`,  `date_start`,  `date_end`,  `requests_limit`,  `limit_period`,  `requests_made`,  `last_request`,  `order_by`,  `status`    
            FROM `api` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `api_key` like :txt
OR `crud` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `requests_limit` like :txt
OR `limit_period` like :txt
OR `requests_made` like :txt
OR `last_request` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY `order_by` , `id` DESC
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

function api_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (api_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $val = "";
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show];
        }
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;
}

function api_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `api` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function api_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `api_key`,  `crud`,  `date_start`,  `date_end`,  `requests_limit`,  `limit_period`,  `requests_made`,  `last_request`,  `order_by`,  `status`    FROM `api` 
    WHERE `$field` = '$txt' 
    ORDER BY `order_by` , `id` DESC
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

function api_db_show_col_from_table($c) {
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
function api_db_col_list_from_table($c) {
    $list = array();
    foreach (api_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function api_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_api_key($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `api_key`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_crud($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `crud`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_requests_limit($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `requests_limit`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_limit_period($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `limit_period`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_requests_made($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `requests_made`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_last_request($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `last_request`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function api_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `api` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function api_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            api_update_id($id, $new_data);
            break;

        case "contact_id":
            api_update_contact_id($id, $new_data);
            break;

        case "api_key":
            api_update_api_key($id, $new_data);
            break;

        case "crud":
            api_update_crud($id, $new_data);
            break;

        case "date_start":
            api_update_date_start($id, $new_data);
            break;

        case "date_end":
            api_update_date_end($id, $new_data);
            break;

        case "requests_limit":
            api_update_requests_limit($id, $new_data);
            break;

        case "limit_period":
            api_update_limit_period($id, $new_data);
            break;

        case "requests_made":
            api_update_requests_made($id, $new_data);
            break;

        case "last_request":
            api_update_last_request($id, $new_data);
            break;

        case "order_by":
            api_update_order_by($id, $new_data);
            break;

        case "status":
            api_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function api_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `api` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/api/functions.php
// and comment here (this function)
function api_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "api_key":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "crud":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_end":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "requests_limit":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "limit_period":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "requests_made":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "last_request":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "status":
            //return _field_id("", $value);
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
function api_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `api` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_contact_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `api` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_api_key($api_key) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `api_key` FROM `api` WHERE   `api_key` = ?");
    $req->execute(array($api_key));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_crud($crud) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `crud` FROM `api` WHERE   `crud` = ?");
    $req->execute(array($crud));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_date_start($date_start) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `api` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_date_end($date_end) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `api` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_requests_limit($requests_limit) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `requests_limit` FROM `api` WHERE   `requests_limit` = ?");
    $req->execute(array($requests_limit));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_limit_period($limit_period) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `limit_period` FROM `api` WHERE   `limit_period` = ?");
    $req->execute(array($limit_period));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_requests_made($requests_made) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `requests_made` FROM `api` WHERE   `requests_made` = ?");
    $req->execute(array($requests_made));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_last_request($last_request) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `last_request` FROM `api` WHERE   `last_request` = ?");
    $req->execute(array($last_request));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `api` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `api` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function api_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function api_is_contact_id($contact_id) {
    return true;
}

function api_is_api_key($api_key) {
    return true;
}

function api_is_crud($crud) {
    return true;
}

function api_is_date_start($date_start) {
    return true;
}

function api_is_date_end($date_end) {
    return true;
}

function api_is_requests_limit($requests_limit) {
    return true;
}

function api_is_limit_period($limit_period) {
    return true;
}

function api_is_requests_made($requests_made) {
    return true;
}

function api_is_last_request($last_request) {
    return true;
}

function api_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function api_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function api_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, api_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function api_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (api_is_id($value)) ? true : false;
            break;
        case "contact_id":
            $is = (api_is_contact_id($value)) ? true : false;
            break;
        case "api_key":
            $is = (api_is_api_key($value)) ? true : false;
            break;
        case "crud":
            $is = (api_is_crud($value)) ? true : false;
            break;
        case "date_start":
            $is = (api_is_date_start($value)) ? true : false;
            break;
        case "date_end":
            $is = (api_is_date_end($value)) ? true : false;
            break;
        case "requests_limit":
            $is = (api_is_requests_limit($value)) ? true : false;
            break;
        case "limit_period":
            $is = (api_is_limit_period($value)) ? true : false;
            break;
        case "requests_made":
            $is = (api_is_requests_made($value)) ? true : false;
            break;
        case "last_request":
            $is = (api_is_last_request($value)) ? true : false;
            break;
        case "order_by":
            $is = (api_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (api_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//

function api_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=api&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
            case 'api_key':
                echo '<th>' . _tr(ucfirst('api_key')) . '</th>';
                break;
            case 'crud':
                echo '<th>' . _tr(ucfirst('crud')) . '</th>';
                break;
            case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
            case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
                break;
            case 'requests_limit':
                echo '<th>' . _tr(ucfirst('requests_limit')) . '</th>';
                break;
            case 'limit_period':
                echo '<th>' . _tr(ucfirst('limit_period')) . '</th>';
                break;
            case 'requests_made':
                echo '<th>' . _tr(ucfirst('requests_made')) . '</th>';
                break;
            case 'last_request':
                echo '<th>' . _tr(ucfirst('last_request')) . '</th>';
                break;
            case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
            case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
            case 'button_print':
            case 'button_save':
                echo '<th></th>';
                break;

            default:
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
                break;
        }
    }
}

function api_index_generate_column_body_td($api, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=api&a=details&id=' . $api[$col] . '">' . $api[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'contact_id':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'api_key':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'crud':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'date_start':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'date_end':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'requests_limit':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'limit_period':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'requests_made':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'last_request':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($api[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=api&a=details&id=' . $api['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=api&a=details_payement&id=' . $api['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=api&a=edit&id=' . $api['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=api&a=export_pdf&id=' . $api['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=api&a=export_pdf&way=pdf&&id=' . $api['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($api[$col]) . '</td>';
                break;
        }
    }
}

//
//        
################################################################################
################################################################################
################################################################################


#Nuevas modificaciones 12/08/2024

function api_extract_quoted_text($input) {
    if (preg_match('/"([^"]+)"/', $input, $matches)) {
        return $matches[1];
    }
    return null;
}

function api_curl_request($url, $i, $attempts) {
    $i++;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (false === $result || 200 !== $httpcode) {
        if ($i >= $attempts) {
            return null;
        } else {
            usleep(1500000); 
            return api_curl_request($url, $i, $attempts);
        }
    } else {
        return $result;
    }
}

function api_get_sentences_from_json($json) {
    $arr = json_decode($json, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return '';
    }
    
    $sentences = '';
    if (isset($arr['sentences'])) {
        foreach ($arr['sentences'] as $s) {
            $sentences .= isset($s['trans']) ? $s['trans'] : '';
        }
    }

    return $sentences;
}

function api_fields_string($fields) {
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key.'='.urlencode($value).'&';
    }
    return rtrim($fields_string, '&');
}

function api_curl_request_for_translate($url, $fields, $fields_string, $i, $attempts) {
    $i++;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');

    try {
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (false === $result || 200 !== $httpcode) {
            throw new Exception('Request failed with HTTP code: ' . $httpcode);
        }
        return $result;
    } catch (Exception $e) {
        if ($i >= $attempts) {
            return null;
        } else {
            usleep(1500000);
            return api_curl_request_for_translate($url, $fields, $fields_string, $i, $attempts);
        }
    } finally {
        curl_close($ch);
    }
}

function api_request_translation($source, $target, $text, $attempts) {
    $url = 'https://translate.google.com/translate_a/single?client=at&dt=t&dt=ld&dt=qca&dt=rm&dt=bd&dj=1&hl=uk-RU&ie=UTF-8&oe=UTF-8&inputm=2&otf=2&iid=1dd3b944-fa62-4b55-b330-74909a99969e';
    $fields = [
        'sl' => $source,
        'tl' => $target,
        'q'  => $text,
    ];

    if (strlen($fields['q']) >= 5000) {
        echo 'Maximum number of characters exceeded: 5000';
        return null;
    }

    $fields_string = api_fields_string($fields);
    $content = api_curl_request_for_translate($url, $fields, $fields_string, 0, $attempts);
    return api_get_sentences_from_json($content);
}

function api_translate($source, $target, $text, $attempts = 5) {
    return api_request_translation($source, $target, $text, $attempts);
}

function api_translations_search_by_content($content) {
    global $db;
    $attempts = 5;
    $base_url = 'https://coop.factuz.com/index.php';
    $params = [
        'c' => 'api',
        'api_key' => $_GET['api_key'] ?? 'demo',
        'a' => $_GET['a'] ?? '_translations',
        'function' => $_GET['function'] ?? 'search',
        'content' => $content,
    ];
    $query_string = http_build_query($params);
    $url = $base_url . '?' . $query_string;

    $response = api_curl_request($url, 0, $attempts);

    if (api_extract_quoted_text($response) === 'Not find') {
        $source = 'es';
        $target = 'fr';
        $language = $_GET['language'] ?? '';

        $resp_translate = api_translate($source, $target, $content, $attempts);

        try {
            $sql = "SELECT id, content, language, translation 
                    FROM `_translations` 
                    WHERE `content` = :content 
                    ORDER BY id DESC LIMIT 1";
            $query = $db->prepare($sql);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetchAll();

            if (empty($data)) {
                $parts = explode('_', $language);
                $lang = $parts[0] ?? '';

                $sql_check = "SELECT * FROM _content WHERE frase LIKE :word";
                $query_check = $db->prepare($sql_check);
                $query_check->bindValue(':word', '%' . $content . '%', PDO::PARAM_STR);
                $query_check->execute();
                $data_content = $query_check->fetchAll();

                if (empty($data_content)) {
                    $sql_insert_content = "INSERT INTO _content (id, frase, contexto) VALUES (NULL, :word, NULL)";
                    $query_insert_content = $db->prepare($sql_insert_content);
                    $query_insert_content->bindValue(':word', $content, PDO::PARAM_STR);
                    $query_insert_content->execute();
                }

                $sql_insert = "INSERT INTO _translations (id, content, language, translation) VALUES (NULL, :word, :language, :translation)";
                $query = $db->prepare($sql_insert);
                $query->bindValue(':word', $content, PDO::PARAM_STR);
                $query->bindValue(':language', $language, PDO::PARAM_STR);
                $query->bindValue(':translation', $resp_translate, PDO::PARAM_STR);
                $query->execute();
            }
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
            return null;
        }
    }

    return api_curl_request($url, 0, $attempts);
}





$content = isset($_GET['content']) ? $_GET['content'] : '';
if ($content) {
    api_translations_search_by_content($content);

}










