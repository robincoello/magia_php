<?php

// limite de las facturas 
$items_limit = _options_option('config_logs_pagination_items_limit');

// si hay limite en facturas lo usamos, sino usamos el limite por defecto en todo el sistema 
$itemsByPage = ( $items_limit ) ? $items_limit : _options_option("system_items_limit");

$limit = $itemsByPage;

switch ($page) {
    case 0:
        $start = 0;
        break;
    default:
        $start = ( $page - 1 ) * $itemsByPage;
        break;
}