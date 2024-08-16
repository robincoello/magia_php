

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
        <?php _menu_icon("top", 'icons'); ?>
        <?php echo _t("Icons"); ?>
    </a>
    <a href="index.php?c=icons" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "icons", "create")) { ?>
        <a href="index.php?c=icons&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "icons"); ?>
        <?php echo _t("By provider"); ?>
    </a>
    <?php
    foreach (icons_unique_from_col("provider") as $provider) {
        if ($provider['provider'] != "") {
            echo '<a href="index.php?c=icons&a=search&w=by_provider&provider=' . $provider['provider'] . '" class="list-group-item">' . $provider['provider'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "icons"); ?>
        <?php echo _t("By icon"); ?>
    </a>
    <?php
    foreach (icons_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=icons&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "icons"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (icons_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=icons&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "icons"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (icons_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=icons&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

