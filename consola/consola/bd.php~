<?php

function bd_tablas($base_datos) {

    global $db;

    $data = null;

    $req = $db->prepare("SHOW FULL TABLES FROM $base_datos   ");

    $req->execute(array(
            // "base_datos" => $base_datos
    ));

    $data = $req->fetchall();
    return $data;
}
