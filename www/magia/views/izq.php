
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'magia'); ?>
        <?php echo _t("Magia"); ?>
    </a>
    <a href="index.php?c=magia" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=magia&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_db"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_db") as $m_db) {
        if ($m_db['m_db'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_db&m_db=' . $m_db['m_db'] . '" class="list-group-item">' . $m_db['m_db'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_table"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_table") as $m_table) {
        if ($m_table['m_table'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_table&m_table=' . $m_table['m_table'] . '" class="list-group-item">' . $m_table['m_table'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_field_name"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_field_name") as $m_field_name) {
        if ($m_field_name['m_field_name'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_field_name&m_field_name=' . $m_field_name['m_field_name'] . '" class="list-group-item">' . $m_field_name['m_field_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_action"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_action") as $m_action) {
        if ($m_action['m_action'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_action&m_action=' . $m_action['m_action'] . '" class="list-group-item">' . $m_action['m_action'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_label"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_label") as $m_label) {
        if ($m_label['m_label'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_label&m_label=' . $m_label['m_label'] . '" class="list-group-item">' . $m_label['m_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_type"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_type") as $m_type) {
        if ($m_type['m_type'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_type&m_type=' . $m_type['m_type'] . '" class="list-group-item">' . $m_type['m_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_class"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_class") as $m_class) {
        if ($m_class['m_class'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_class&m_class=' . $m_class['m_class'] . '" class="list-group-item">' . $m_class['m_class'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_table_external"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_table_external") as $m_table_external) {
        if ($m_table_external['m_table_external'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_table_external&m_table_external=' . $m_table_external['m_table_external'] . '" class="list-group-item">' . $m_table_external['m_table_external'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_col_external"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_col_external") as $m_col_external) {
        if ($m_col_external['m_col_external'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_col_external&m_col_external=' . $m_col_external['m_col_external'] . '" class="list-group-item">' . $m_col_external['m_col_external'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_name"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_name") as $m_name) {
        if ($m_name['m_name'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_name&m_name=' . $m_name['m_name'] . '" class="list-group-item">' . $m_name['m_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_id"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_id") as $m_id) {
        if ($m_id['m_id'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_id&m_id=' . $m_id['m_id'] . '" class="list-group-item">' . $m_id['m_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_placeholder"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_placeholder") as $m_placeholder) {
        if ($m_placeholder['m_placeholder'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_placeholder&m_placeholder=' . $m_placeholder['m_placeholder'] . '" class="list-group-item">' . $m_placeholder['m_placeholder'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_value"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_value") as $m_value) {
        if ($m_value['m_value'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_value&m_value=' . $m_value['m_value'] . '" class="list-group-item">' . $m_value['m_value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_only_read"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_only_read") as $m_only_read) {
        if ($m_only_read['m_only_read'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_only_read&m_only_read=' . $m_only_read['m_only_read'] . '" class="list-group-item">' . $m_only_read['m_only_read'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_mandatory"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_mandatory") as $m_mandatory) {
        if ($m_mandatory['m_mandatory'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_mandatory&m_mandatory=' . $m_mandatory['m_mandatory'] . '" class="list-group-item">' . $m_mandatory['m_mandatory'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_selected"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_selected") as $m_selected) {
        if ($m_selected['m_selected'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_selected&m_selected=' . $m_selected['m_selected'] . '" class="list-group-item">' . $m_selected['m_selected'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By m_disabled"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("m_disabled") as $m_disabled) {
        if ($m_disabled['m_disabled'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_m_disabled&m_disabled=' . $m_disabled['m_disabled'] . '" class="list-group-item">' . $m_disabled['m_disabled'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (magia_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=magia&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

