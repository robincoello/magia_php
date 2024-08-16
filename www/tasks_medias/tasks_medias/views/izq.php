

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
        <?php _menu_icon("top", 'tasks_medias'); ?>
        <?php echo _t("Tasks_medias"); ?>
    </a>
    <a href="index.php?c=tasks_medias" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "tasks_medias", "create")) { ?>
        <a href="index.php?c=tasks_medias&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By task_id"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("task_id") as $task_id) {
        if ($task_id['task_id'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_task_id&task_id=' . $task_id['task_id'] . '" class="list-group-item">' . $task_id['task_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By type"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By url"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_medias"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (tasks_medias_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=tasks_medias&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

