<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$m_db = (isset($_POST["m_db"]) && $_POST["m_db"] != "" && $_POST["m_db"] != "null" ) ? clean($_POST["m_db"]) : false;
$m_table = (isset($_POST["m_table"]) && $_POST["m_table"] != "" && $_POST["m_table"] != "null" ) ? clean($_POST["m_table"]) : false;
$m_field_name = (isset($_POST["m_field_name"]) && $_POST["m_field_name"] != "" && $_POST["m_field_name"] != "null" ) ? clean($_POST["m_field_name"]) : false;
$m_action = (isset($_POST["m_action"]) && $_POST["m_action"] != "" && $_POST["m_action"] != "null" ) ? clean($_POST["m_action"]) : false;
$m_label = (isset($_POST["m_label"]) && $_POST["m_label"] != "" && $_POST["m_label"] != "null" ) ? clean($_POST["m_label"]) : false;
$m_type = (isset($_POST["m_type"]) && $_POST["m_type"] != "" && $_POST["m_type"] != "null" ) ? clean($_POST["m_type"]) : false;
$m_class = (isset($_POST["m_class"]) && $_POST["m_class"] != "" ) ? clean($_POST["m_class"]) : form - control;
$m_table_external = (isset($_POST["m_table_external"]) && $_POST["m_table_external"] != "" && $_POST["m_table_external"] != "null" ) ? clean($_POST["m_table_external"]) : false;
$m_col_external = (isset($_POST["m_col_external"]) && $_POST["m_col_external"] != "" && $_POST["m_col_external"] != "null" ) ? clean($_POST["m_col_external"]) : false;
$m_name = (isset($_POST["m_name"]) && $_POST["m_name"] != "" && $_POST["m_name"] != "null" ) ? clean($_POST["m_name"]) : false;
$m_id = (isset($_POST["m_id"]) && $_POST["m_id"] != "" && $_POST["m_id"] != "null" ) ? clean($_POST["m_id"]) : false;
$m_placeholder = (isset($_POST["m_placeholder"]) && $_POST["m_placeholder"] != "" && $_POST["m_placeholder"] != "null" ) ? clean($_POST["m_placeholder"]) : false;
$m_value = (isset($_POST["m_value"]) && $_POST["m_value"] != "" && $_POST["m_value"] != "null" ) ? clean($_POST["m_value"]) : false;
$m_only_read = (isset($_POST["m_only_read"]) && $_POST["m_only_read"] != "" && $_POST["m_only_read"] != "null" ) ? clean($_POST["m_only_read"]) : false;
$m_mandatory = (isset($_POST["m_mandatory"]) && $_POST["m_mandatory"] != "" && $_POST["m_mandatory"] != "null" ) ? clean($_POST["m_mandatory"]) : false;
$m_selected = (isset($_POST["m_selected"]) && $_POST["m_selected"] != "" && $_POST["m_selected"] != "null" ) ? clean($_POST["m_selected"]) : false;
$m_disabled = (isset($_POST["m_disabled"]) && $_POST["m_disabled"] != "" && $_POST["m_disabled"] != "null" ) ? clean($_POST["m_disabled"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$m_db) {
    array_push($error, '$m_db is mandatory');
}
if (!$m_table) {
    array_push($error, '$m_table is mandatory');
}
if (!$m_field_name) {
    array_push($error, '$m_field_name is mandatory');
}
if (!$m_action) {
    array_push($error, '$m_action is mandatory');
}
if (!$m_label) {
    array_push($error, '$m_label is mandatory');
}
if (!$m_type) {
    array_push($error, '$m_type is mandatory');
}
if (!$m_class) {
    array_push($error, '$m_class is mandatory');
}
if (!$m_table_external) {
    array_push($error, '$m_table_external is mandatory');
}
if (!$m_col_external) {
    array_push($error, '$m_col_external is mandatory');
}
if (!$m_name) {
    array_push($error, '$m_name is mandatory');
}
if (!$m_id) {
    array_push($error, '$m_id is mandatory');
}
if (!$m_placeholder) {
    array_push($error, '$m_placeholder is mandatory');
}
if (!$m_value) {
    array_push($error, '$m_value is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!magia_is_m_db($m_db)) {
    array_push($error, '$m_db format error');
}
if (!magia_is_m_table($m_table)) {
    array_push($error, '$m_table format error');
}
if (!magia_is_m_field_name($m_field_name)) {
    array_push($error, '$m_field_name format error');
}
if (!magia_is_m_action($m_action)) {
    array_push($error, '$m_action format error');
}
if (!magia_is_m_label($m_label)) {
    array_push($error, '$m_label format error');
}
if (!magia_is_m_type($m_type)) {
    array_push($error, '$m_type format error');
}
if (!magia_is_m_class($m_class)) {
    array_push($error, '$m_class format error');
}
if (!magia_is_m_table_external($m_table_external)) {
    array_push($error, '$m_table_external format error');
}
if (!magia_is_m_col_external($m_col_external)) {
    array_push($error, '$m_col_external format error');
}
if (!magia_is_m_name($m_name)) {
    array_push($error, '$m_name format error');
}
if (!magia_is_m_id($m_id)) {
    array_push($error, '$m_id format error');
}
if (!magia_is_m_placeholder($m_placeholder)) {
    array_push($error, '$m_placeholder format error');
}
if (!magia_is_m_value($m_value)) {
    array_push($error, '$m_value format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( magia_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = magia_add(
            $m_db, $m_table, $m_field_name, $m_action, $m_label, $m_type, $m_class, $m_table_external, $m_col_external, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=magia&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=magia");
            break;
    }
} else {

    include view("home", "pageError");
}


