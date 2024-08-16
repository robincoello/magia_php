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
        <?php _menu_icon("top", '_menus'); ?>
        <?php echo _t("_menus"); ?>
    </a>
    <a href="index.php?c=_menus" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=_menus&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By location"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("location") as $location) {
        if ($location['location'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_location&location=' . $location['location'] . '" class="list-group-item">' . $location['location'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By father_id"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("father_id") as $father_id) {
        if ($father_id['father_id'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . $father_id['father_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By label"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By url"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By target"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("target") as $target) {
        if ($target['target'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_target&target=' . $target['target'] . '" class="list-group-item">' . $target['target'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By icon"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (_menus_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=_menus&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

