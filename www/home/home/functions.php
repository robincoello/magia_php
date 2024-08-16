<?php

function home_users_add(
        $contact_id, $language, $rol, $login, $password, $email, $code, $status
) {
    global $db;

    $req = $db->prepare('INSERT INTO users (id,   contact_id,  language,  rol,   login, password,  email, code,  status)
                                   VALUES  (:id, :contact_id, :language,  :rol, :login, :password, :email, :code, :status)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'language' => $language,
        'rol' => $rol,
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'code' => $code,
        'status' => $status
    ));
    return $db->lastInsertId();
}
