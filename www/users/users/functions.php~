<?php

// plugin = users
// creation date : 
// 
// 
function users_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM users WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function users_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM users WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function users_list($start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM users ORDER BY id DESC     Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function users_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM users WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function users_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM users WHERE id=? ");
    $req->execute(array($id));
}

function users_edit($id, $contact_id, $language, $rol, $login, $password, $email, $status) {

    global $db;
    $req = $db->prepare(" UPDATE users SET "
            . "contact_id=:contact_id , "
            . "language=:language , "
            . "rol=:rol , "
            . "login=:login , "
            . "password=:password , "
            . "email=:email , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "contact_id" => $contact_id, "language" => $language, "rol" => $rol, "login" => $login, "password" => $password, "email" => $email, "status" => $status,
    ));
}

function users_add(
        $contact_id, $language, $rol, $login, $password, $email, $code, $status
) {
    global $db;
    $req = $db->prepare(" INSERT INTO `users` ( `id`,  `contact_id`,  `language`,  `rol`,  `login`,  `password`,  `email`, `code`, `status`   )
                                       VALUES  (:id ,  :contact_id ,  :language ,  :rol ,  :login ,  :password ,  :email , :code,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "language" => $language,
        "rol" => $rol,
        "login" => $login,
        "password" => $password,
        "email" => $email,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function users_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM users 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR language like :txt
OR rol like :txt
OR login like :txt
OR password like :txt
OR email like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function users_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (users_list() as $key => $value) {
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

//function users_select($k, $v, $selected = "", $disabled = array()) {
//    $c = "";
//    foreach (users_list() as $key => $value) {
//        $s = ($selected == $value[$k]) ? " selected  " : "";
//        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
//        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
//    }
//    echo $c;
//}

function users_is_id($id) {
    return true;
}

function users_is_contact_id($contact_id) {
    return true;
}

function users_is_language($language) {
    return true;
}

function users_is_rol($rol) {
    return true;
}

function users_is_login($login) {
    return true;
}

function users_is_password($password) {
    return true;
}

function users_is_email($email) {
    return true;
}

function users_is_status($status) {
    return true;
}

// Status de users
define('USER_BLOCKED', -1);
define('USER_WAITING', 0); // no tiene login
define('USER_ONLINE', 1);

$user_master_key = 30;

function users_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM users WHERE code= ?");
    $req->execute(array(
        $code
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//function ajouter_un_utilisateur($name, $lastname, $address, $postcode, $title, $birthdate, $login, $password, $email) {
//    global $db;
//    //$req= $db->prepare('INSERT INTO users(id,name,lastname,address,postcode,title,birtdate,login,password,email,status)VALUES(:id,:name,:lastname,:address,:postcode,:title,:birthdate,:login,:password,:email, :status)');
//
//    $req = $db->prepare('INSERT INTO users(id,postcode,birthdate,status)VALUES(:id,:postcode,:birthdate, :status)');
//    $req->execute(array(
//        'id' => null,
//        //'name'=>$name,
//        //'lastname'=>$lastname,
//        //'address'=>$address,
//        'postcode' => '1000',
//        //'title'=>$title,
//        'birthdate' => '2019-03-14',
//        //'login'=>$login,
//        //'password'=>$password,
//        //'email'=>$email, 
//        'status' => 1,
//    ));
//}
//function add_user_MMMM($postcode, $birthdate) {
//    global $db;
//
//
//    $req = $db->prepare('INSERT INTO users(postcode,birthdate,status)VALUES(:postcode,:birthdate,:status');
//    $req->execute(array(
//        'postcode' => '1000',
//        'birthdate' => '2019-03-14',
//        'status' => 1,
//    ));
//
//    echo "<hr>$postcode,$birthdate</hr>";
//    echo var_dump($req);
//    echo var_dump($req);
//}

/**
 * Add user 
 * @global type $db
 * @param type $title 
 * @param type $name
 * @param type $lastname
 * @param type $address
 * @param type $postcode
 * @param type $birthdate
 * @param type $login
 * @param type $email
 * @param type $password
 * @param type $rol
 */
//function add_user($title, $name, $lastname, $address, $postcode, $birthdate, $login, $email, $password, $rol) {
//    global $db;
//
//    $req = $db->prepare('INSERT INTO users (id,  title, name, lastname, address,  postcode, birthdate, login, password, email, rol, status)
//                                   VALUES (:id, :title, :name, :lastname, :address,  :postcode, :birthdate, :login, :password, :email, :rol, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'title' => $title,
//        'name' => $name,
//        'lastname' => $lastname,
//        'address' => $address,
//        'postcode' => $postcode,
//        'birthdate' => $birthdate,
//        'login' => $login,
//        'password' => $password,
//        'email' => $email,
//        'rol' => $rol,
//        'status' => 0,
//    ));
//}
//function trouve_login($login) {
//    global $db;
//
//    $trouveOK = false;
//
//    $req = $db->prepare('SELECT login, password FROM users WHERE login= ?');
//    $req->execute(array($login));
//
//    $login_recherche = $req->fetch();
//
//    if ($login_recherche['login'] == $login) {
//        $trouveOK = true;
//    }
//    return $trouveOK;
//}
//*****************************************************************************
//*****************************************************************************
//*****************************************************************************
//*****************************************************************************
//*****************************************************************************
/**
 * 
 * @global type $db
 * @param type $field
 * @param type $id
 * @return type
 */
//function users_field_id($field, $id) {
//
//    global $db;
//    $data = null;
//
//    $req = $db->prepare("SELECT $field FROM users WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//
//    return $data[0];
//}

function users_field_contact_id($field, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM `users` WHERE contact_id= ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function users_password() {

    global $db, $u_id;
    $data = null;

    $req = $db->prepare("SELECT password FROM users WHERE contact_id= ?");
    $req->execute(array($u_id));
    $data = $req->fetch();

    return $data[0];
}

function users_show_details($id) {

    global $db;
    $req = $db->prepare('SELECT * FROM users WHERE id= ?');
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

//
//function users_list() {
//
//    global $db;
//    $data = null;
//
//    $req = $db->prepare('SELECT * FROM users ORDER BY id DESC');
//    $req->execute();
//    $data = $req->fetchall();
//
//    return $data;
//}




/* function users_list_by_all($txt) {
  global $db;
  $req = $db->prepare('SELECT * FROM users WHERE
  name like :name
  OR lastname like :lastname
  OR address like :address
  OR postcode like :postcode
  OR title like :title
  OR login like :login
  OR email like :email ');
  $req->execute(array(
  'name' => $txt,
  'lastname' => $txt,
  'address' => $txt,
  'postcode' => $txt,
  'title' => $txt,
  'login' => $txt,
  'email' => $txt,
  ));
  $data = $req->fetchall();
  return $data;
  } */

function users_list_by_all($txt) {
    global $db;
    $req = $db->prepare('SELECT * FROM users WHERE 
        rol like :rol         
        OR login like :login
        OR email like :email ');
    $req->execute(array(
        'rol' => $txt,
        'login' => $txt,
        'email' => $txt,
    ));
    $data = $req->fetchall();
    return $data;
}

function users_list_by_status($status, $start = 0, $limit = 999) {
    global $db;
    $sql = 'SELECT * FROM users WHERE status=:status ORDER BY id DESC     Limit  :limit OFFSET :start  ';

    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function users_list_by_rol($rol, $start = 0, $limit = 999) {
    global $db;

    $sql = 'SELECT * FROM users WHERE rol=:rol     Limit  :limit OFFSET :start  ';

    $query = $db->prepare($sql);
    $query->bindValue(':rol', $rol, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function users_details($id) {
//
//    global $db;
//    $req = $db->prepare('SELECT * FROM users WHERE id= ?');
//    $req->execute(array($id));
//    $data = $req->fetch();
//
//    return $data;
//}

function users_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM users WHERE id=?');
    $req->execute(array($id));
}

//function users_edit($id, $name, $lastname, $address, $postcode, $title, $birthdate, $login, $password, $email, $status) {
//
//    global $db;
//
//    $req = $db->prepare('UPDATE users SET 
//        name      =:name, 
//        lastname  =:lastname, 
//        address   =:address, 
//        postcode  =:postcode, 
//        title     =:title, 
//        birthdate =:birthdate, 
//        login     =:login, 
//        password  =:password, 
//        email     =:email,
//        status    =:status
//        WHERE id=:id');
//    $req->execute(array(
//        'name' => $name,
//        'lastname' => $lastname,
//        'address' => $address,
//        'postcode' => $postcode,
//        'title' => $title,
//        'birthdate' => $birthdate,
//        'login' => $login,
//        'password' => $password,
//        'email' => $email,
//        'status' => $status,
//        'id' => $id
//    ));
//}
//function users_add($contact_id, $rol, $login, $password, $email, $status) {
//    global $db;
//
//    $req = $db->prepare('INSERT INTO users (id,  contact_id,  rol,   login,  password,  email, status)
//                                   VALUES  (:id, :contact_id, :rol, :login, :password, :email, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'contact_id' => $contact_id,
//        'rol' => $rol,
//        'login' => $login,
//        'password' => $password,
//        'email' => $email,
//        'status' => $status
//    ));
//    
//    return $db->lastInsertId() ;
//    
//    
//}
//function users_add_xxxxxx($name, $lastname, $address, $postcode, $title, $birthdate, $login, $password, $email, $status) {
//    global $db;
//
//    $req = $db->prepare('INSERT INTO users (id,   name,  lastname,  address,  postcode,  title,  birthdate,  login,  password, email,  status)
//                                   VALUES  (:id, :name, :lastname, :address, :postcode, :title, :birthdate, :login, :password, :email, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'name' => $name,
//        'lastname' => $lastname,
//        'address' => $address,
//        'postcode' => $postcode,
//        'title' => $title,
//        'birthdate' => $birthdate,
//        'login' => $login,
//        'password' => $password,
//        'email' => $email,
//        'status' => $status
//    ));
//}

function users_by_category($id_category) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT * FROM users WHERE type_id= ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

function users_total_by_category($id_category) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) FROM users WHERE type_id= ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}

function users_total_by_status($code) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) FROM users WHERE status= ?');
    $req->execute(array($code));
    $data = $req->fetchall();

    return $data[0][0];
}

function users_total_by_rol($rol = false) {
    global $db;

    $data = 0;

    if ($rol) {
        $req = $db->prepare('SELECT COUNT(*) FROM users WHERE rol = ?');
        $req->execute(array($rol));
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM users ');
        $req->execute();
    }
    $data = $req->fetchall();

    return $data[0][0];
}

function users_total_by_lang($lang) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) FROM users WHERE language = ?');
    $req->execute(array($lang));

    $data = $req->fetchall();

    return $data[0][0];
}

function users_titles_array() {
    $r = array(
        "mr" => "Monsieur",
        "mme" => "Madame",
        "mlle" => "Madamesel",
    );

    return $r;
}

function users_status_array() {
    $r = array(
        "-1" => "Blocked",
        "0" => "Waiting",
        "1" => "On line",
    );
    return $r;
}

function users_status($code) {
    $data = users_status_array();
    return $data[$code];
}

function users_status_icon($status) {

    switch ($status) {

        case USER_BLOCKED: // Bloqueado
            $icon = '<i class="fas fa-lock"></i>';
            break;

        case USER_WAITING: // en espera de aprobacion
            $icon = '<i class="glyphicon glyphicon-hourglass"></i>';
            break;

        case USER_ONLINE: // On line             
            $icon = '<i class="glyphicon glyphicon-ok"></i>';
            break;

        default: // desconocido           
            $icon = '<i class="glyphicon glyphicon-question-sign"></i>';
            break;
    }


    return $icon;
}

function users_rols_array() {
    global $db;

    $data = null;
    $req = $db->prepare('SELECT * FROM rols   ');
    $req->execute();
    $data = $req->fetchall();

    return $data;
}

function users_rols($code) {
    $data = users_rols_array();
    return $data[$code];
}

function users_is_name($name = false) {
    return (strlen($name) > 1 ) ? true : false;
}

function users_is_lastname($lastname = false) {
    return ($lastname) ? TRUE : FALSE;
    //return true;
}

function users_is_address($address = false) {
    return ($address) ? TRUE : FALSE;
    //return true;
}

function users_is_postcode($postcode = false) {
    return ($postcode) ? TRUE : FALSE;
    //return true;
}

function users_is_title($title = false) {
    return ($title) ? TRUE : FALSE;
    //return true;
}

function users_is_birthdate($birthdate = false) {
    return ($birthdate) ? TRUE : FALSE;
    //return true;
}

//function users_is_login($login = false) {
//    return (strlen($login) > 5 ) ? true : false;
//}
//function users_is_password($password) {
//    return ($password) ? TRUE : FALSE;
//    //return true;
//}
//function users_is_email($email) {
//    return ($email) ? TRUE : FALSE;
//    //return true;
//}
//function users_is_status($status) {
//    //return ($status)?TRUE:FALSE;
//    return true;
//}

/**
 * 
 * @global type $db
 * @param type $id
 * @param type $photo
 * @version 0.0.1
 */
function users_add_photo($id, $photo) {
    global $db;
    $req = $db->prepare('UPDATE users SET photo=:photo WHERE id=:id');
    $req->execute(array(
        'photo' => $photo,
        'id' => $id));
}

function users_photo($u_id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $users_photo = users_field_id("photo", $u_id);

    if (file_exists("www/users/views/img/users/$users_photo")) {
        echo "<img class=\"img-responsive\" src=\"view/img/users/$users_photo\" width=\"$w\">";
    } else {
        echo "<img class=\"img-responsive\" src=\"view/img/users/user.png\">";
    }
}

function users_photo_r($u_id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $users_photo = users_field_id("photo", $u_id);

    if (file_exists("view/img/users/$users_photo")) {
        return "<img src=\"view/img/users/$users_photo\" width=\"$w\">";
    } else {
        return "<img src=\"view/img/users/user.png\" width=\"$w\">";
    }
}

function users_update_status($id, $status) {

    global $db;
    $req = $db->prepare('UPDATE users SET         
        status    =:status
        WHERE id=:id');
    $req->execute(array(
        'status' => $status,
        'id' => $id
    ));
}

function users_block_by_contact_id($contact_id) {

    global $db;
    $req = $db->prepare('UPDATE users SET         
        status    =:status
        WHERE contact_id=:contact_id');
    $req->execute(array(
        'status' => USER_BLOCKED,
        'contact_id' => $contact_id
    ));
}

function users_rol_update($contact_id, $rol) {

    global $db;
    $req = $db->prepare('UPDATE users SET rol=:rol WHERE contact_id=:contact_id');
    $req->execute(array(
        'rol' => $rol,
        'contact_id' => $contact_id
    ));
}

function users_update_language($contact_id, $language) {
    global $db;
    $req = $db->prepare('UPDATE `users` SET 
        `language`=:language
        WHERE contact_id=:contact_id');
    $req->execute(array(
        'language' => $language,
        'contact_id' => $contact_id
    ));
}

function users_update_password($contact_id, $password) {
    global $db;
    $req = $db->prepare('UPDATE `users` SET `password`=:password WHERE contact_id=:contact_id');
    $req->execute(array(
        'password' => $password,
        'contact_id' => $contact_id
    ));
}

function users_list_by_office($office_id) {
    global $db;
    $limit = 999;

    $data = null;

    // $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");
    $req = $db->prepare("
            SELECT * 
            FROM users as u 
            JOIN contacts as c  on u.contact_id = c.id 
            JOIN rols as r on u.rol = r.rol
            WHERE u.contact_id IN (SELECT id FROM contacts WHERE owner_id = :office_id )  
            ORDER BY r.rango DESC, c.lastname, c.name
              ");

    $req->execute(array(
        "office_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Users por oficinaque no sean root
 * @global type $db
 * @param type $office_id
 * @return type
 */
function users_list_by_office_no_root($office_id) {
    global $db;
    $limit = 999;

    $data = null;

    // $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");

    $req = $db->prepare("
            SELECT * 
            FROM users as u 
            JOIN contacts as c  on u.contact_id = c.id 
            JOIN rols as r on u.rol = r.rol
            WHERE u.contact_id IN (SELECT id FROM contacts WHERE owner_id = :office_id )  AND u.rol != 'root'
            ORDER BY r.rango DESC, c.lastname, c.name
              ");

    $req->execute(array(
        "office_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function users_delete_contact_id_login($contact_id, $login) {
    global $db;
    $req = $db->prepare("DELETE FROM `users` WHERE `contact_id` = :contact_id AND `login` =:login ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'login' => $login
    ));
}

/**
 * Regresa el pass codificado 
 * @param type $password
 * @return type
 */
function users_password_hash($password) {

    $p = password_hash($password, PASSWORD_DEFAULT);

    return $p;
}

////////////////////////////////////////////////////////////////////////////////

function users_according_login($login) {
    global $db;
    $req = $db->prepare('SELECT * FROM users WHERE login= ?');
    $req->execute(array($login));
    $data = $req->fetch();
    return $data;
}

function users_according_email($email) {
    global $db;
    $req = $db->prepare('SELECT id FROM users WHERE email= ?');
    $req->execute(array($email));
    $data = $req->fetch();
    return $data;
}

function users_contact_id_according_email($email) {
    global $db;
    $req = $db->prepare('SELECT contact_id FROM users WHERE email= ?');
    $req->execute(array($email));
    $data = $req->fetch();
    return $data[0];
}

function users_according_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT id FROM users WHERE contact_id= ?');
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return $data;
}

function users_rol_according_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT rol FROM users WHERE contact_id= ?');
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function users_id_according_login($login) {
    global $db;

    if ($login == "" || $login == null || $login == false) {
        return false;
    }


    $req = $db->prepare('SELECT id FROM users WHERE login= ?');
    $req->execute(array($login));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function verifi_login_password($login, $password) {

    $user = users_according_login($login);

    if ($user['login'] == $login AND password_verify($password, $user['password'])) {

        // Registro en la session los diferentes cookies

        $_SESSION['u_id'] = $user['contact_id'];
        // si el user cambia de idioma una vez logueado, ya no funcionaria esto 
        // por eso se pone el u_language en index.php
        // $_SESSION['u_language'] = $user['language'] ;
        $_SESSION['u_rol'] = $user['rol'];
        $_SESSION['u_login'] = $user['login'];
        $_SESSION['u_email'] = $user['email'];
        $_SESSION['u_status'] = $user['status'];

        return true;
    } else {
        return false;
    }
}
