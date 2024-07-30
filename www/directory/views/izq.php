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
        <?php _menu_icon("top", "directory"); ?>
        <?php echo _t("Directory"); ?>
    </a>
    <a href="index.php?c=directory" class="list-group-item"><?php _t("List"); ?></a>
    <?php /* <a href="index.php?c=directory&a=add" class="list-group-item"><?php _t("Add"); ?></a> */ ?>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", "directory"); ?>
        <?php echo _t("Search by contact"); ?>
    </div>
    <div class="panel-body">
        <?php include "form_search.php"; ?>
    </div>
</div>








<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "directory"); ?>
        <?php echo _t("By name"); ?>
    </a>

    <?php
//    foreach (directory_names_list() as $key => $directory_names) {
//        echo '<a href="index.php?c=directory&a=search&w=by_name&txt=' . $directory_names["name"] . '" class="list-group-item">' . _tr($directory_names["name"]) . '</a>';
//    }
    ?>
</div>




