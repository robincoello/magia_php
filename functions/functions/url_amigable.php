<?php

function url_amigable($cadena) {

    $cadena = strtolower($cadena);

//    $cadena = utf8_decode($cadena);

    $cadena = str_replace(' ', '-', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('`', '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = strtr($cadena, ($originales), $modificadas);

    return $cadena;
}
