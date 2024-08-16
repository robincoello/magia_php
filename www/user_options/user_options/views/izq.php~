
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'user_options'); ?>
        <?php echo _t("User_options"); ?>
    </a>
    <a href="index.php?c=user_options" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=user_options&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "user_options"); ?>
        <?php echo _t("By user_id"); ?>
    </a>
    <?php
    foreach (user_options_unique_from_col("user_id") as $user_id) {
        if ($user_id['user_id'] != "") {
            echo '<a href="index.php?c=user_options&a=search&w=by_user_id&user_id=' . $user_id['user_id'] . '" class="list-group-item">' . $user_id['user_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "user_options"); ?>
        <?php echo _t("By option"); ?>
    </a>
    <?php
    foreach (user_options_unique_from_col("option") as $option) {
        if ($option['option'] != "") {
            echo '<a href="index.php?c=user_options&a=search&w=by_option&option=' . $option['option'] . '" class="list-group-item">' . $option['option'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "user_options"); ?>
        <?php echo _t("By data"); ?>
    </a>
    <?php
    foreach (user_options_unique_from_col("data") as $data) {
        if ($data['data'] != "") {
            echo '<a href="index.php?c=user_options&a=search&w=by_data&data=' . $data['data'] . '" class="list-group-item">' . $data['data'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "user_options"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (user_options_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=user_options&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "user_options"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (user_options_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=user_options&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

