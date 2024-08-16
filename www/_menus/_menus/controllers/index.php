<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$error = array();
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config__menus_order_col", $data, "_menus");
}
################################################################################
$_menus = null;

################################################################################
$pagination = new Pagination($page, _menus_list());
// puede hacer falta
//$pagination->setUrl($url);
$_menus = _menus_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$_menus = _menus_list(10, 5);


include view("_menus", "index");

if ($debug) {
    include "www/_menus/views/debug.php";
}