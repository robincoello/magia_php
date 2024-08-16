
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'modules'); ?>
        <?php echo _t("Modules"); ?>
    </a>
    <a href="index.php?c=modules" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=modules&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By label"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By father"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("father") as $father) {
        if ($father['father'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_father&father=' . $father['father'] . '" class="list-group-item">' . $father['father'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By module"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("module") as $module) {
        if ($module['module'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_module&module=' . $module['module'] . '" class="list-group-item">' . $module['module'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By author"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("author") as $author) {
        if ($author['author'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_author&author=' . $author['author'] . '" class="list-group-item">' . $author['author'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By author_email"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("author_email") as $author_email) {
        if ($author_email['author_email'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_author_email&author_email=' . $author_email['author_email'] . '" class="list-group-item">' . $author_email['author_email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By url"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By version"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("version") as $version) {
        if ($version['version'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_version&version=' . $version['version'] . '" class="list-group-item">' . $version['version'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "modules"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (modules_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=modules&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

