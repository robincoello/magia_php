<?php

function magia_make_link($url, $label, $check_permission = array(), $target = false, $class = false, $id = false) {

    /// si debo chequear permisos 
    // y tiene permisos
    if ($check_permission && permissions_has_permission($check_permission['rol'], $check_permission['c'], $check_permission['a'])) {
        if ($target) {
            $l = '<a href="' . $url . '" ' . $class . ' id="' . $id . '" target="' . $target . '" >' . $label . '</a>';
        } else {
            $l = '<a href="' . $url . '" ' . $class . ' id="' . $id . '">' . $label . '</a>';
        }
    } else { // sino solo muestro el label
        $l = $label;
    }

    return $l;
}

function magia_uniqid() {
    return date('Ymdhis') . uniqid() . random_int(100, 9999);
}

function magia_is_float($f) {
    return ( (float) $f);
}

function magia_strtoupper($val) {
    if ($val === null) {
        return $val;
    } else {
        return strtoupper($val);
    }
}

function magia_strlen() {
    
}
