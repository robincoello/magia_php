<?php

function _text($txt) {

    if ($txt == '' || $txt == null || $txt == false) {
        return $txt;
    }

    $t = str_replace('&amp;', '&', $txt);

    $t = str_replace('&quot;', '"', $t);

//    $t = utf8_decode($t);
//    $t =  mb_detect_encoding($t);

    $tt = mb_convert_encoding($t, 'UTF-8', 'ISO-8859-1');

    return ($tt);
}

function pdf_textr($txt_tr) {
//$txt_tr = "é § è ç à "; 
//return utf8_decode($txt_tr);
//    return ($txt_tr);
    if ($txt_tr) {
        return utf8_decode($txt_tr);
    } else {
        return $txt_tr;
    }
}
