<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */
function view($c, $a, $arg = array("title" => "Magia_php")) {

    global $config_public_theme;

    // si no hay configuracio, ponemos la por defecto     
    $public_theme = _options_option('config_public_html_theme') ?? 'Rapid';
    $v = false;
    $html['title'] = (isset($arg["title"])) ? $arg['title'] : "--";
    $html['body_class'] = (isset($arg["body_class"])) ? $arg['body_class'] : "";
    //vardump(array($c, $a)); 
    //"title"=>"Coello.be", "body_class"=>"body"
    // si el $c es public_html, 

    switch ($c) {
        case "public_html":
            if (file_exists(WWW_E . "/public_html/$public_theme/views/$a.php")) {
                $v = WWW_E . "/public_html/$public_theme/views/$a.php";
            } else {
                $v = WWW . "/public_html/$public_theme/views/$a.php";
            }
            break;

        default:
            if (file_exists(WWW_E . "/$c/views/$a.php")) {
                $v = WWW_E . "/$c/views/$a.php";
            } else {
                $v = WWW . "/$c/views/$a.php";
            }
            break;
    }
    return $v;
}

function css($css) {
    $v = false;

    if (file_exists(WWW_E . "/public_html/uno/views/css/$css.css")) {
        $v = WWW_E . "/public_html/uno/views/css/$css.css";
    } else {
        $v = WWW . "/public_html/uno/views/css/$css.css";
    }

    return $v;
}

/**
 * Descripcion
 * @param type $tpl
 * @param type $arg
 * @return string
 */
function pdf_template($tpl, $modele = false, $arg = array()) {
    $v = false;

    // el modelo que viene desde la base de datos 
    $doc_model = (
            _options_option("doc_model")) ?
            _options_option("doc_model") :
            "default";

    $doc_model = ($modele) ? $modele : $doc_model;

    $doc_model = 'a';

    if (file_exists(WWW_E . "/doc_models/views/$doc_model/$tpl.php")) {
        $v = WWW_E . "/doc_models/views/$doc_model/$tpl.php";
    } else {
        $v = WWW . "/doc_models/views/$doc_model/$tpl.php";
    }

    return $v;
}

function model($c, $a, $arg = array()) {
    $v = false;

    //"title"=>"Coello.be", "body_class"=>"body"

    $html['title'] = (isset($arg["title"])) ? $arg['title'] : "--";
    $html['body_class'] = (isset($arg["body_class"])) ? $arg['body_class'] : "";

    if (file_exists(WWW_E . "/$c/models/$a.php")) {
        $v = WWW_E . "/$c/models/$a.php";
    } else {
        $v = WWW . "/$c/models/$a.php";
    }

    return $v;
}

function debug($c, $a, $arg = array()) {
    $v = false;

    //"title"=>"Coello.be", "body_class"=>"body"

    $html['title'] = (isset($arg["title"])) ? $arg['title'] : "--";
    $html['body_class'] = (isset($arg["body_class"])) ? $arg['body_class'] : "";

    if (file_exists(WWW_E . "/$c/debug/$a.php")) {
        $v = WWW_E . "/$c/debug/$a.php";
    } else {
        $v = WWW . "/$c/debug/$a.php";
    }

    return $v;
}

function view_tempalte($c, $a, $data_form, $rename = false) {
    global $config_public_theme;

    $v = false;

    $html['title'] = (isset($arg["title"])) ? $arg['title'] : "--";
    $html['body_class'] = (isset($arg["body_class"])) ? $arg['body_class'] : "";
    //vardump(array($c, $a)); 
    //"title"=>"Coello.be", "body_class"=>"body"
    // si el $c es public_html, 

    $public_theme = _options_option('config_public_html_theme') ?? 'Rapid';

    switch ($c) {
        case "public_html":
            if (file_exists(WWW_E . "/public_html/$public_theme/views/$a.php")) {
                $v = WWW_E . "/public_html/$public_theme/views/$a.php";
            } else {
                $v = WWW . "/public_html/$public_theme/views/$a.php";
            }
            break;
        default:
            if (file_exists(WWW_E . "/$c/views/$a.php")) {
                $v = WWW_E . "/$c/views/$a.php";
            } else {
                $v = WWW . "/$c/views/$a.php";
            }
            break;
    }
    require $v;
}

function views_list_by_controller($c = null) {
    $views = array(
        "izq",
        "izq_add",
    );

    return $views;
}
