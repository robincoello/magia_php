<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// valor por defecto 
//$_options["status"] = 1; $magia["id"] =  false ;
$magia["m_db"] = false;
$magia["m_table"] = false;
$magia["m_field_name"] = false;
$magia["m_action"] = false;
$magia["m_label"] = false;
$magia["m_type"] = false;
$magia["m_class"] = form - control;
$magia["m_table_external"] = false;
$magia["m_col_external"] = false;
$magia["m_name"] = false;
$magia["m_id"] = false;
$magia["m_placeholder"] = false;
$magia["m_value"] = false;
$magia["m_only_read"] = false;
$magia["m_mandatory"] = false;
$magia["m_selected"] = false;
$magia["m_disabled"] = false;
$magia["order_by"] = false;
$magia["status"] = false;

include view("magia", "add");
