<?php

function tasks_change_field($id, $field, $new_data) {
    switch ($field) {
        case 'title':
            tasks_change_title($id, $new_data);
            break;

        case 'description':
            tasks_change_description($id, $new_data);
            break;

        case 'color':
            tasks_change_color($id, $new_data);
            break;

        case 'order_by':
            tasks_change_order_by($id, $new_data);
            break;

        case 'status':
            tasks_change_status($id, $new_data);
            break;

        default:
            break;
    }
}

function tasks_change_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE tasks SET title=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function tasks_change_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE tasks SET description=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function tasks_change_color($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE tasks SET color=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function tasks_change_order_by($id, $new_data) {

    global $db;
    global $db;
    $req = $db->prepare(" UPDATE tasks SET order_by = :new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function tasks_change_status($id, $new_data) {

    global $db;
    global $db;
    $req = $db->prepare(" UPDATE tasks SET status = :new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function tasks_create_html($tmp, $args) {

//    $args pasa para el view

    $code = uniqid();

    switch ($tmp) {
        case 1:
            include view('tasks', 'tmp_1');
            break;

        case 10:
            include view('tasks', 'tmp_10');
            break;

        case 20:
            include view('tasks', 'tmp_20');
            break;

        case 'tmp_izq_index': // para izq de facturaas
            include view('tasks', 'tmp_izq_index');
            break;

        case 'tmp_der_details': // derecha en details
            include view('tasks', 'tmp_der_details');
            break;

        case 'tmp_dropdown_status':
            include view('tasks', 'tmp_dropdown_status');
            break;

        case 'form_change_order_by':
            include view('tasks', 'form_change_order_by');
            break;

        case 'form_change_status':
            include view('tasks', 'form_change_status');
            break;

        case 'form_change_field':
            include view('tasks', 'form_change_field');
            break;

        case 'tmp_by_controller_id':
            include view('tasks', 'tmp_by_controller_id');
            break;

        case 'tmp_by_controller_id_table':
            include view('tasks', 'tmp_by_controller_id_table');
            break;

        default:
            include view('tasks', 'tmp_default');
            break;
    }
}

// SEARCH
function tasks_search_by_controller($controller, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE controller = '$controller' 
     ORDER BY doc_id DESC, order_by DESC
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

// SEARCH
function tasks_search_by_controller_status($controller, $status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE controller = '$controller' AND status IN ($status)
     ORDER BY doc_id DESC, order_by DESC
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

// SEARCH
function tasks_search_by_controller_doc_id($controller, $doc_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE controller = '$controller' 
            AND doc_id = '$doc_id'
     ORDER BY order_by DESC, id DESC
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

// SEARCH
function tasks_search_by_controller_doc_id_contact_id($controller, $doc_id, $contact_id, $start = 0, $limit = 999) {

    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE controller = '$controller' 
            AND doc_id = '$doc_id'
            AND contact_id = '$contact_id'
     ORDER BY order_by DESC, id DESC
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

function tasks_search_by_controller_contact_id($controller, $doc_id, $contact_id, $start = 0, $limit = 999) {

    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE controller = '$controller' 
            AND doc_id = '$doc_id'
            AND contact_id = '$contact_id'
     ORDER BY order_by DESC, id DESC
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

function tasks_search_by_contact_id($contact_id, $start = 0, $limit = 999) {

    global $db;
    $data = null;
    $sql = "SELECT * FROM tasks 
            WHERE contact_id = '$contact_id'
     ORDER BY order_by DESC, id DESC
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

function tasks_total_by_status($status) {
    global $db;
    $sql = "SELECT COUNT(`id`) FROM `tasks` WHERE status = :status ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function tasks_total_by_category_id($category_id) {
    global $db;
    $sql = "SELECT COUNT(`id`) FROM `tasks` WHERE category_id = :category_id ";
    $query = $db->prepare($sql);
    $query->bindValue(':category_id', (int) $category_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function tasks_total_by_controller($controller) {
    global $db;
    $sql = "SELECT COUNT(`id`) FROM `tasks` WHERE controller = :controller ";
    $query = $db->prepare($sql);
    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function tasks_total_by_controller_doc_id($controller, $doc_id) {
    global $db;
    $sql = "SELECT COUNT(`id`) FROM `tasks` WHERE  `controller` = :controller  AND `doc_id` = :doc_id";
    $query = $db->prepare($sql);
    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
    $query->bindValue(':doc_id', $doc_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}
