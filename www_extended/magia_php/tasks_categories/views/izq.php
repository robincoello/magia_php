
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'tasks_categories'); ?>
        <?php echo _t("Tasks_categories"); ?>
    </a>
    <a href="index.php?c=tasks_categories" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=tasks_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By father_id"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("father_id") as $father_id) {
        if ($father_id['father_id'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . _tr(tasks_categories_field_id('category', $father_id['father_id'])) . '</a>';
        }
    }
    ?>
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

