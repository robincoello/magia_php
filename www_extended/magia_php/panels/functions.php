<?php

// SEARCH for
function panels_search_controller_action($c, $a = 'index', $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `controller`,  `action`, `name`, `panel`,  `order_by`,  `status`    FROM `panels` 
    WHERE `controller` = :c AND `action` = :a 
    ORDER BY `order_by`, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function panels_search_controller_action_status($c, $a, $status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `controller`,  `action`,  `panel`,  `order_by`,  `status`    FROM `panels` 
    WHERE (`controller` = :c AND `action` = :a ) AND `status` = :status
    ORDER BY `order_by`, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO::PARAM_STR);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function panels_changer_status($id, $order_by, $status) {
    global $db;

    if ($order_by) {
        $req = $db->prepare("UPDATE `panels` SET  `status` = :status, order_by = :order_by WHERE `id` = :id ");
        $req->execute(array(
            "id" => $id,
            "status" => $status,
            "order_by" => $order_by,
        ));
    } else {
        $req = $db->prepare("UPDATE `panels` SET  `status` = :status WHERE `id` = :id ");
        $req->execute(array(
            "id" => $id,
            "status" => $status,
        ));
    }
}

function panels_show($id, $order_by) {
    panels_changer_status($id, $order_by, 1);
}

function panels_hidden($id) {
    panels_changer_status($id, null, 0);
}
