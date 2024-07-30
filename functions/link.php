<?php

// esta funcion crea los enalces 

function link_create($c, $a, $params) {
    $c = "home";
    $a = "search";
    $params = array(
        "w" => "by_id",
        "id" => "$id",
    );

    $link = "index.php?c=$c&a=$a&xxx=xx&yy=yy&zzz=zzz";

    $link = "/home/search/by_id/id/10";

    $link = "/controlador/accion/parametros";
    $link = "/agenda/detalles/evento-de-grn-escala-102030.html";
}
