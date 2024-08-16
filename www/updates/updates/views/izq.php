
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'updates'); ?>
        <?php echo _t("Updates"); ?>
    </a>
    <a href="index.php?c=updates" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=updates&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By version"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("version") as $version) {
        if ($version['version'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_version&version=' . $version['version'] . '" class="list-group-item">' . $version['version'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By code_install"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_install") as $code_install) {
        if ($code_install['code_install'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_install&code_install=' . $code_install['code_install'] . '" class="list-group-item">' . $code_install['code_install'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By code_uninstall"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_uninstall") as $code_uninstall) {
        if ($code_uninstall['code_uninstall'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_uninstall&code_uninstall=' . $code_uninstall['code_uninstall'] . '" class="list-group-item">' . $code_uninstall['code_uninstall'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By code_check"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_check") as $code_check) {
        if ($code_check['code_check'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_check&code_check=' . $code_check['code_check'] . '" class="list-group-item">' . $code_check['code_check'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By installed"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("installed") as $installed) {
        if ($installed['installed'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_installed&installed=' . $installed['installed'] . '" class="list-group-item">' . $installed['installed'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By pass"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("pass") as $pass) {
        if ($pass['pass'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_pass&pass=' . $pass['pass'] . '" class="list-group-item">' . $pass['pass'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

