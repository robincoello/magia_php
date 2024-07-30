<?php

// SEARCH
function messages_search_all($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE controller IS NULL AND doc_id IS NULL AND `contact_id` IS NULL AND rol IS NULL
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
//    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
//    $query->bindValue(':doc_id', (int) $doc_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function messages_search_by_controller($c, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE controller = :controller AND doc_id IS NULL AND `contact_id` IS NULL AND rol IS NULL
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':controller', $c, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function messages_search_by_controller_doc_id($c, $id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE controller = :controller AND doc_id = :doc_id AND `contact_id` IS NULL AND rol IS NULL
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':controller', $c, PDO::PARAM_STR);
    $query->bindValue(':doc_id', (int) $id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH para un determinado usuario
function messages_search_by_contact_id($contact_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE controller IS NULL AND doc_id IS NULL AND `contact_id` = :contact_id  AND rol IS NULL
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH para los roles x
function messages_search_by_rol($rol, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE controller IS NULL AND doc_id IS NULL AND `contact_id` IS NULL  AND rol = :rol
 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':rol', $rol, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Solo mostrar una fecha determinada
function messages_search_by_date($date, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE date_start = :date  AND date_end IS NULL
            
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':date', "$date", PDO::PARAM_STR);
//    $query->bindValue(':date_e', "$date 23:59:59", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function messages_search_by_date_from_to($today, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `messages` 
            WHERE :today >= date_start AND :today <= date_end
            
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':today', $today, PDO::PARAM_STR);
    - $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function messages_show($messages) {

    if ($messages) {
        foreach ($messages as $item) {
            //
            $mess_top = new Messages();
            //
            $mess_top->setMessages($item['id']);

            $link = array("url_action" => $mess_top->getUrl_action(), "url_label" => $mess_top->getUrl_label());

            message($mess_top->getType(), $mess_top->getMessage(), null, $link, false);
        }
    }
}
