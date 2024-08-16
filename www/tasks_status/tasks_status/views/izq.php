
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'tasks_status'); ?>
        <?php echo _t("Tasks_status"); ?>
    </a>
    <a href="index.php?c=tasks_status" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=tasks_status&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By color"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By icon"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_status"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (tasks_status_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=tasks_status&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

