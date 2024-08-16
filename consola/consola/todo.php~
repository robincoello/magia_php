<?php

/**
 * en una tabla que tiene una columna unica hacer una funcion: 
 * function bacs_field_name($field, $name) {
    global $db;
    //$data = null;
    $req    = $db->prepare("SELECT $field FROM bacs WHERE name= ?");
    $req->execute(array($name));
    $data = $req->fetch();
    return $data[0];
}
 */