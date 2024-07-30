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
        <?php _menu_icon("top", 'directory_names'); ?>
        <?php echo _t("Directory_names"); ?>
    </a>
    <a href="index.php?c=directory_names" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=directory_names&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "directory_names"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (directory_names_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=directory_names&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "directory_names"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (directory_names_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=directory_names&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "directory_names"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (directory_names_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=directory_names&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

