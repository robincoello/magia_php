<?php

function icon($t = 'asterisk', $provider = 'getbootstrap') {

    $provider = "getbootstrap";

    $types = [
        "asterisk" => "glyphicon glyphicon-asterisk",
        "plus" => "glyphicon glyphicon-plus",
        "question-sign" => "glyphicon glyphicon-question-sign",
        "book" => "glyphicon glyphicon-book",
        "eye-open" => "glyphicon glyphicon-eye-open",
        "eye-close" => "glyphicon glyphicon-eye-close",
        "refresh" => "glyphicon glyphicon-refresh",
        "minus" => "glyphicon glyphicon-minus",
        "plus" => "glyphicon glyphicon-plus",
        "list" => "glyphicon glyphicon-list",
        "import" => "glyphicon glyphicon-import",
        "wrench" => "glyphicon glyphicon-wrench",
        "floppy-disk" => "glyphicon glyphicon-floppy-disk",
        "resize-vertical" => "glyphicon glyphicon-resize-vertical",
        "resize-horizontal" => "glyphicon glyphicon-resize-horizontal",
        "comment" => "glyphicon glyphicon-comment",
        "option-vertical" => "glyphicon glyphicon-option-vertical",
        "option-horizontal" => "glyphicon glyphicon-option-horizontal",
        "chevron-down" => "glyphicon glyphicon-chevron-down",
        "trash" => "glyphicon glyphicon-trash",
        "chevron-right" => "glyphicon glyphicon-chevron-right",
        "chevron-left" => "glyphicon glyphicon-chevron-left",
        "repeat" => "glyphicon glyphicon-repeat",
        "pencil" => "glyphicon glyphicon-pencil",
        "ok" => "glyphicon glyphicon-ok",
        "remove" => "glyphicon glyphicon-remove",
        "search" => "glyphicon glyphicon-search",
        "earphone" => "glyphicon glyphicon-earphone",
        "user" => "glyphicon glyphicon-user",
        "calendar" => "glyphicon glyphicon-calendar",
        "map-marker" => "glyphicon glyphicon-map-marker",
        "plus-sign" => "glyphicon glyphicon-plus-sign",
        "sort" => "glyphicon glyphicon-sort",
        "th-list" => "glyphicon glyphicon-th-list",
        "th-large" => "glyphicon glyphicon-th-large",
        "thumbs-up" => "glyphicon glyphicon-thumbs-up",
        "thumbs-down" => "glyphicon glyphicon-thumbs-down",
        "pushpin" => "glyphicon glyphicon-pushpin",
        "time" => "glyphicon glyphicon-time",
        "download" => "glyphicon glyphicon-download",
        "credit-card" => "glyphicon glyphicon-credit-card",
        "shopping-cart" => "glyphicon glyphicon-shopping-cart",
        "print" => "glyphicon glyphicon-print",
        "floppy-save" => "glyphicon glyphicon-floppy-save",
        "screenshot" => "glyphicon glyphicon-screenshot",
        "align-left" => "glyphicon glyphicon-align-left",
        "ban-circle" => "glyphicon glyphicon-ban-circle",
        "ok-circle" => "glyphicon glyphicon-ok-circle",
        "import" => "glyphicon glyphicon-import",
        "export" => "glyphicon glyphicon-export",
        "random" => "glyphicon glyphicon-random",
        "tint" => "glyphicon glyphicon-tint",
        "sort-by-order" => "glyphicon glyphicon-sort-by-order",
        "font" => "glyphicon glyphicon-font",
        "option-vertical" => "glyphicon glyphicon-option-vertical",
        "sort-by-attributes" => "glyphicon glyphicon-sort-by-attributes",
        "sort-by-attributes-alt" => "glyphicon glyphicon-sort-by-attributes-alt",
    ];

    switch ($t) {
        case "asterisk":
        case "plus":
        case "question-sign":
        case "book":
        case "eye-open":
        case "eye-close":
        case "refresh":
        case "minus":
        case "plus":
        case "list":
        case "import":
        case "wrench":
        case "floppy-disk":
        case "resize-vertical":
        case "resize-horizontal":
        case "option-vertical":
        case "option-horizontal":
        case "chevron-down":
        case "comment":
        case "trash":
        case "chevron-right":
        case "chevron-left":
        case "repeat":
        case "pencil":
        case "ok":
        case "remove":
        case "search":
        case "earphone":
        case "user":
        case "calendar":
        case "map-marker":
        case "plus-sign":
        case "sort":
        case "th-list":
        case "th-large":
        case "thumbs-up":
        case "thumbs-down":
        case "pushpin":
        case "time":
        case "download":
        case "credit-card":
        case "shopping-cart":
        case "print":
        case "floppy-save":
        case "screenshot":
        case "align-left":
        case "ban-circle":
        case "ok-circle":
        case "import":
        case "export":
        case "random":
        case "tint":
        case "sort-by-order":
        case "font":
        case "option-vertical":
        case "sort-by-attributes":
        case "sort-by-attributes-alt":

            return '<span class="' . $types[$t] . '"></span>';
            break;

        default:
            return '<span class="glyphicon glyphicon-folder-close"></span>';
            break;
    }


    //
    //
    //
}

function icon_order_by($order_way = 'DESC') {


    $order_way = strtoupper($order_way);

    // Asegurarse de que el valor de order_way es seguro
    $allowed_order_way = ['ASC', 'DESC'];
    if (!in_array($order_way, $allowed_order_way)) {
        $order_way = 'DESC';
    }


    if ($order_way == 'DESC') {
        return icon("sort-by-attributes-alt");
    } else {
        return icon("sort-by-attributes");
    }
}
