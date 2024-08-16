

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'tasks'); ?>
        <?php echo _t("Tasks"); ?>
    </a>
    <a href="index.php?c=tasks" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "tasks", "create")) { ?>
        <a href="index.php?c=tasks&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By category_id"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("category_id") as $category_id) {
        if ($category_id['category_id'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_category_id&category_id=' . $category_id['category_id'] . '" class="list-group-item">' . $category_id['category_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By contact_id"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By title"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By doc_id"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("doc_id") as $doc_id) {
        if ($doc_id['doc_id'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_doc_id&doc_id=' . $doc_id['doc_id'] . '" class="list-group-item">' . $doc_id['doc_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By date_registre"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By date_update"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("date_update") as $date_update) {
        if ($date_update['date_update'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_date_update&date_update=' . $date_update['date_update'] . '" class="list-group-item">' . $date_update['date_update'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By color"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=tasks&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

