<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */

/**
 * inserta los controladores
 * @param type $c
 * @param type $a
 * @return string
 */
function controller($c, $a) {

//    global $config_public_theme;

    $public_theme = _options_option('config_public_html_theme') ?? 'Rapid';

    switch ($c) {
        case "public_html":
            if (file_exists(WWW_E . "/public_html/$public_theme/controllers/$a.php")) {
                $c = WWW_E . "/public_html/$public_theme/controllers/$a.php";
            } else {
                $c = WWW . "/public_html/$public_theme/controllers/$a.php";
            }
            break;
        default:
            if (file_exists(WWW_E . "/$c/controllers/$a.php")) {
                $c = WWW_E . "/$c/controllers/$a.php";
            } else {
                if (file_exists(WWW . "/$c/controllers/$a.php")) {
                    $c = WWW . "/$c/controllers/$a.php";
                } else {
                    $c = WWW . "/home/controllers/error.php";
                }
            }
            break;
    }

    return $c;
}
