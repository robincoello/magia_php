
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'country_provinces'); ?>
        <?php echo _t("Country_provinces"); ?>
    </a>
    <a href="index.php?c=country_provinces" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=country_provinces&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_provinces"); ?>
        <?php echo _t("By country"); ?>
    </a>
    <?php
    foreach (country_provinces_unique_from_col("country") as $country) {
        if ($country['country'] != "") {
            echo '<a href="index.php?c=country_provinces&a=search&w=by_country&country=' . $country['country'] . '" class="list-group-item">' . $country['country'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_provinces"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (country_provinces_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=country_provinces&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_provinces"); ?>
        <?php echo _t("By province"); ?>
    </a>
    <?php
    foreach (country_provinces_unique_from_col("province") as $province) {
        if ($province['province'] != "") {
            echo '<a href="index.php?c=country_provinces&a=search&w=by_province&province=' . $province['province'] . '" class="list-group-item">' . $province['province'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_provinces"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (country_provinces_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=country_provinces&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_provinces"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (country_provinces_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=country_provinces&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

