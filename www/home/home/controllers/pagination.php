<?php

$itemsByPage = (_options_option("system_items_limit")) ? _options_option("system_items_limit") : 5;

$limit = $itemsByPage;

switch ($page) {
    case 0:
        $start = 0;
        break;
    default:
        $start = ( $page - 1 ) * $itemsByPage;
        break;
}