<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_languages"); ?>
        <?php echo _t("Languages"); ?>
    </a>
    <a href="index.php?c=_languages&a=search&w=all" class="list-group-item"><?php _t("All"); ?></a>
    <a href="index.php?c=_languages" class="list-group-item"><?php _t("Actived"); ?></a>
    <a href="index.php?c=_languages&a=search&w=by_status&stats=0" class="list-group-item"><?php _t("Disabled"); ?></a>

    <a href="index.php?c=_languages&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_languages"); ?>
        <?php echo _t("System"); ?>
    </a>
    <a href="index.php?c=config&a=languages_config_system_lang_default" class="list-group-item"><?php _t("Default languages"); ?></a>   
    <a href="index.php?c=config&a=languages_debug" class="list-group-item">
        <span class="glyphicon glyphicon-wrench"></span>
        <?php _t("Debug"); ?>
    </a>   
</div>