
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'gallery'); ?>
        <?php echo _t("Gallery"); ?>
    </a>
    <a href="index.php?c=gallery" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=gallery&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By owner_id"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("owner_id") as $owner_id) {
        if ($owner_id['owner_id'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_owner_id&owner_id=' . $owner_id['owner_id'] . '" class="list-group-item">' . $owner_id['owner_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By doc_id"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("doc_id") as $doc_id) {
        if ($doc_id['doc_id'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_doc_id&doc_id=' . $doc_id['doc_id'] . '" class="list-group-item">' . $doc_id['doc_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By title"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By alt"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("alt") as $alt) {
        if ($alt['alt'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_alt&alt=' . $alt['alt'] . '" class="list-group-item">' . $alt['alt'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By url"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By date_registre"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "gallery"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (gallery_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=gallery&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

