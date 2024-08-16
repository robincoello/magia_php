<?php

// plugin = logs
// creation date : 
// 
// 

function logs_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM logs WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function logs_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM logs WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function logs_listxxx() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM logs ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function logs_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM `logs` ORDER BY id DESC  Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM logs WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function logs_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM logs WHERE id=? ");
    $req->execute(array($id));
}

function logs_edit($id, $level, $date, $u_id, $u_rol, $c, $a, $w, $description, $doc_id, $crud, $error, $val_get, $val_post, $val_request, $ip4, $ip6, $broswer) {

    global $db;
    $req = $db->prepare(" UPDATE logs SET "
            . "level=:level , "
            . "date=:date , "
            . "u_id=:u_id , "
            . "u_rol=:u_rol , "
            . "c=:c , "
            . "a=:a , "
            . "w=:w , "
            . "description=:description , "
            . "doc_id=:doc_id , "
            . "crud=:crud , "
            . "error=:error , "
            . "val_get=:val_get , "
            . "val_post=:val_post , "
            . "val_request=:val_request , "
            . "ip4=:ip4 , "
            . "ip6=:ip6 , "
            . "broswer=:broswer  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "level" => $level, "date" => $date, "u_id" => $u_id, "u_rol" => $u_rol, "c" => $c, "a" => $a, "w" => $w, "description" => $description, "doc_id" => $doc_id, "crud" => $crud, "error" => $error, "val_get" => $val_get, "val_post" => $val_post, "val_request" => $val_request, "ip4" => $ip4, "ip6" => $ip6, "broswer" => $broswer,
    ));
}

function logs_add(
        $level, $date, $u_id, $u_rol, $c, $a, $w,
        $description, $doc_id, $crud, $error,
        $val_get = null, $val_post = null, $val_request = null,
        $ip4 = null, $ip6 = null, $broswer = null
) {
    global $db;

    $sql = "INSERT INTO `logs` 
            (`id`, `level`, `date`, `u_id`, `u_rol`, `c`, `a`, `w`, `description`, `doc_id`, `crud`, `error`, `val_get`, `val_post`, `val_request`, `ip4`, `ip6`, `broswer`) VALUES 
            (:id , :level , :date,  :u_id , :u_rol , :c , :a , :w , :description , :doc_id , :crud , :error , :val_get , :val_post , :val_request , :ip4 , :ip6 , :broswer ) ";

    $req = $db->prepare($sql);

    $req->execute(array(
        "id" => null,
        "level" => $level,
        "date" => date("Y-m-d h:i:s"),
        "u_id" => $u_id,
        "u_rol" => $u_rol,
        "c" => $c,
        "a" => $a,
        "w" => $w,
        "description" => $description,
        "doc_id" => $doc_id,
        "crud" => $crud,
        "error" => ($error),
        "val_get" => ($val_get),
        "val_post" => ($val_post),
        "val_request" => ($val_request),
        "ip4" => get_user_ip(),
        "ip6" => get_user_ip6(),
        "broswer" => json_encode(get_user_browser())
            )
    );

    return $db->lastInsertId();
}

function logs_search($txt, $start = 0, $limit = 999) {
    global $db;

    $sql = "
        SELECT * FROM logs 
        WHERE 
        id like :txt 
        OR level like :txt
        OR date like :txt
        OR u_id like :txt
        OR u_rol like :txt
        OR c like :txt
        OR a like :txt
        OR w like :txt
        OR description like :txt
        OR doc_id like :txt
        OR crud like :txt
        OR error like :txt
        OR val_get like :txt
        OR val_post like :txt
        OR val_request like :txt
        OR ip4 like :txt
        OR ip6 like :txt
        OR broswer like :txt
            Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (logs_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function logs_is_id($id) {
    return true;
}

function logs_is_level($level) {
    return true;
}

function logs_is_date($date) {
    return true;
}

function logs_is_u_id($u_id) {
    return true;
}

function logs_is_u_rol($u_rol) {
    return true;
}

function logs_is_c($c) {
    return true;
}

function logs_is_a($a) {
    return true;
}

function logs_is_w($w) {
    return true;
}

function logs_is_description($description) {
    return true;
}

function logs_is_doc_id($doc_id) {
    return true;
}

function logs_is_crud($crud) {
    return true;
}

function logs_is_error($error) {
    return true;
}

function logs_is_val_get($val_get) {
    return true;
}

function logs_is_val_post($val_post) {
    return true;
}

function logs_is_val_request($val_request) {
    return true;
}

function logs_is_ip4($ip4) {
    return true;
}

function logs_is_ip6($ip6) {
    return true;
}

function logs_is_broswer($broswer) {
    return true;
}

function logs_list_by_controller_and_doc_id($c, $doc_id = null, $start = 0, $limit = 999) {
    global $db;

    if ($doc_id) {
        $sql = " SELECT * FROM logs WHERE c=:c AND doc_id=:doc_id ORDER BY id DESC Limit :limit OFFSET :start ";
        $query = $db->prepare($sql);
        $query->bindValue(':c', $c, PDO::PARAM_STR);
        $query->bindValue(':doc_id', (int) $doc_id, PDO::PARAM_INT);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $query->execute();
    } else {
        $sql = " SELECT * FROM logs WHERE c=:c                    ORDER BY id DESC Limit :limit OFFSET :start ";
        $query = $db->prepare($sql);
        $query->bindValue(':c', $c, PDO::PARAM_STR);
        $query->bindValue(':doc_id', (int) $doc_id, PDO::PARAM_INT);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $query->execute();
    }
    $data = $query->fetchall();
    return $data;
}

function logs_list_by_types_modeles_formes() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM logs WHERE c=:c  ORDER BY id DESC Limit :limit OFFSET :start");
    $req->execute(array(
        "c" => '_types_modeles_formes',
            //"doc_id" => $doc_id ,
    ));
    $data = $req->fetchall();
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}

function logs_list_distinct_a() {
    global $db;

    $sql = "SELECT distinct(a) FROM logs ORDER BY a Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_list_distinct_c() {
    global $db;
    $data = null;
//    $sql = "SELECT distinct(c) FROM logs ORDER BY c Limit :limit OFFSET :start";
    $sql = "SELECT distinct(c) FROM logs ORDER BY c ";
    $query = $db->prepare($sql);
//    $query->bindValue(':c', $c, PDO:: PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_list_distinct_a_by_c($c, $start = 0, $limit = 99999) {
    global $db;

    $sql = "
            SELECT distinct(a) 
            FROM logs 
            WHERE c=:c ORDER BY a  
            Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO:: PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->
            bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_list_by_controller_action_user($c, $a, $u_id) {
    global $db;
    $data = null;
    $sql = "SELECT * 
            FROM logs         
            WHERE c=:c AND a=:a AND u_id=:u_id         
            ORDER BY id DESC 
            Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO ::PARAM_STR);
    $query->bindValue(':u_id', (int) $u_id, PDO:: PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->
            bindValue(':limit', (int) $limit, PDO:: PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_seach_by_controller($c, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * 
            FROM logs         
            WHERE c = :c         
            ORDER BY id DESC   
            Limit :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO:: PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->
            bindValue(':limit', (int) $limit, PDO:: PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_seach_by_c_and_a($c, $a, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "
            SELECT * 
            FROM logs         
            WHERE c = :c AND a=:a        
            ORDER BY id DESC   Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO:: PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO

            ::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// controladores con errores
function logs_seach_by_c_and_error($c, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * 
            FROM logs         
            WHERE c = :c AND error IS NOT NULL        
            ORDER BY id DESC   Limit :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO:: PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->
            bindValue(':limit', (int) $limit, PDO:: PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_seach_by_level($level, $start = 0, $limit = 999) {
    global $db;

    $sql = "
        SELECT * 
            FROM logs         
            WHERE level=:level       
            ORDER BY id DESC    
            Limit :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':level', $level, PDO:: PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->
            bindValue(':limit', (int) $limit, PDO:: PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function logs_seach_by_user($user_id, $start = 0, $limit = 999) {
    global $db;

    $req = $db->prepare(
            "SELECT * 
            FROM logs         
            WHERE user_id=:user_id       
            ORDER BY id DESC 
            Limit :limit OFFSET :start ");

    $query = $db->prepare($sql);
    $query->bindValue(':user_id', (int) $user_id, PDO:: PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////

/**
 * 
 * @global type $db
 * @param type $users_id
 * @param type $days
 * @return type
 */
function logs_list_by_id_doc($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM logs WHERE doc_id=? ORDER BY id DESC");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}

function logs_list_by_user_id($users_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM logs WHERE user_id=? ORDER BY id DESC');
    $req->execute(array($users_id));
    $data = $req->fetchall();
    return $data;
}

/**
 * 
 * @global type $db
 * @param type $users_id
 * @return type
 */
function logs_total_by_user_id($users_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT count(*) FROM logs WHERE user_id=?');
    $req->execute(array($users_id));
    $data = $req->fetchall();
    return $data[0];
}

/**
 * 
 * @global type $db
 * @param type $users_id
 * @param type $x_days
 * @return type
 */
function logs_total_by_user_id_x_days($users_id, $x_days) {
    global $db;
    $data = null;

    $today = date("Y-m-d");
    $days = date("Y-m-d", strtotime($today . "- $x_days days"));

    $req = $db->prepare('SELECT count(*) FROM logs WHERE (date BETWEEN :x_days AND :today )AND user_id=:user_id');
    $req->execute(
            array(
                'today' => $today,
                'x_days' => $days,
                'user_id' => $users_id));

    $data = $req->fetchall();
    return $data[0][0];
}

function logs_list_by_contact_id($contact_id, $limit = 200) {
    global $db;

    $req = $db->prepare("SELECT * FROM `logs` WHERE `u_id` = :u_id ORDER BY `id` DESC LIMIT 250 ");

    $req->execute(array(
        "u_id" => $contact_id,
            // 
    ));
    $data = $req->fetchall();
    return $data;
}
