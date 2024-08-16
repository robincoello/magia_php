<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */

/**
 * success
 * info
 * warning
 * danger
 * 
 * https://getbootstrap.com/docs/3.3/components/#alerts
 * 
 */
function message($type, $text, $icon = false, $action = array(), $translate = true, $val = false) {

    if (isset($icon)) {
        $icon_show = $icon;
    }

    $link_action = null;

    if (isset($action["url_action"]) && isset($action["url_label"])) {
        $link_action = '<a href="' . $action["url_action"] . '">' . $action["url_label"] . '</a>';
    }

    $text_translated = ($translate) ? _tr(clean($text)) : clean($text);

    switch ($type) {
        case "default":
        case "Default":
            $icon_show = "<span class='glyphicon glyphicon-comment'></span>";
            $m = '<div class="alert alert-success" role="alert">' . $icon_show . ' ' . $text_translated . ' ' . $link_action . '</div>';
            break;

        case "primary":
        case "Primary":
            $icon_show = "<span class='glyphicon glyphicon-chevron-right'></span>";
            $m = '<div class="alert alert-success" role="alert">' . $icon_show . ' ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;

        case "success":
        case "Success":
            $icon_show = "<span class='glyphicon glyphicon-ok'></span>";
            $m = '<div class="alert alert-success" role="alert">' . $icon_show . ' ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;

        case "info":
        case "Info":
            $icon_show = "<span class='glyphicon glyphicon-lamp'></span>";
            $m = '<div class="alert alert-info" role="alert">' . $icon_show . ' ' . _tr('Info') . ': ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;

        case "warning":
        case "Warning":
        case "error":
            $icon_show = "<span class='glyphicon glyphicon-exclamation-sign'></span>";
            $m = '<div class="alert alert-warning" role="alert">' . $icon_show . ' ' . _tr('Warning') . ': ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;

        case "danger":
        case "Danger":
            $icon_show = "<span class='glyphicon glyphicon-alert'></span>";
            $m = '<div class="alert alert-danger" role="alert">' . $icon_show . ' ' . _tr('Danger') . ': ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;

        default:
        case "info":
        case "Info":
            $icon_show = "<span class='glyphicon glyphicon-lamp'></span>";
            $m = '<div class="alert alert-danger" role="alert">' . $icon_show . ' ' . _tr('Info') . ': ' . (($text_translated)) . ' ' . $link_action . '</div>';
            break;
    }

//    echo $m;

    if (!$val) {
        echo $m;
    } else {
        echo sprintf($m, $val);
    }
}
