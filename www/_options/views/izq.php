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
        <?php _menu_icon("top", '_options'); ?>
        <?php echo _t("_options"); ?>
    </a>
    <a href="index.php?c=_options" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=_options&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By option"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("option") as $option) {
        if ($option['option'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_option&option=' . $option['option'] . '" class="list-group-item">' . $option['option'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By data"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("data") as $data) {
        if ($data['data'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_data&data=' . $data['data'] . '" class="list-group-item">' . $data['data'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By group"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("group") as $group) {
        if ($group['group'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_group&group=' . $group['group'] . '" class="list-group-item">' . $group['group'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_options"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (_options_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=_options&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

