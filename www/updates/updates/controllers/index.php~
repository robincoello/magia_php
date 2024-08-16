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
    _options_push("config_updates_order_col", $data, "updates");
}
################################################################################
$updates = null;

################################################################################
$pagination = new Pagination($page, updates_list());
// puede hacer falta
//$pagination->setUrl($url);
$updates = updates_list($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$updates = updates_list(10, 5);


include view("updates", "index");

if ($debug) {
    include "www/updates/views/debug.php";
}