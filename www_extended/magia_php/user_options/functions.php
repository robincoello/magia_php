<?php

function user_options($option, $user_id = null) {
    global $db;
    global $u_id;
    $data = null;
    $req = $db->prepare("SELECT `data` FROM `user_options` WHERE `option` = :option AND user_id = :user_id ");

    if ($user_id) { // si se envia el usuaario 
        $req->execute(array(
            "option" => $option,
            "user_id" => $user_id
        ));
    } else { // sino en user conectado 
        $req->execute(array(
            "option" => $option,
            "user_id" => $u_id
        ));
    }

    $data = $req->fetch();
    return (isset($data['data'])) ? $data['data'] : false;
}

function user_options_update_data($user_id, $option, $data) {

    global $db;
    $req = $db->prepare("
        UPDATE `user_options`
        SET `data` = :data
        WHERE `user_id` = :user_id AND  
        `option` = :option 
");
    $req->execute(array(
        "user_id" => $user_id,
        "option" => $option,
        "data" => $data
    ));
}

function user_options_search_by_user_option($user_id, $option) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `user_options` WHERE `user_id` = :user_id AND `option` = :option ");
    $req->execute(array(
        "user_id" => $user_id,
        "option" => $option
    ));
    $data = $req->fetch();

    return (isset($data)) ? $data : false;
}

function user_options_push_data($user_id, $option, $data) {

    // existe data ?
    if (user_options_search_by_user_option($user_id, $option)) {
        // actualiza
        user_options_update_data($user_id, $option, $data);
    } else {
        // sino lo crea
        user_options_add($user_id, $option, $data, 1, 1);
    }
}
