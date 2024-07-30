<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "export"); ?>
        <?php echo _t("Export"); ?>
    </a>

    <a href="#" class="list-group-item"><?php _menu_icon("top", "export_json"); ?> <?php _t("JSON"); ?></a>
    <a href="index.php?c=config&a=export_xml" class="list-group-item <?php echo ($a == "expenses_clon") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "export_xml"); ?> <?php _t("XML"); ?></a>
    <a href="#" class="list-group-item"><?php _menu_icon("top", "export_csv"); ?> <?php _t("CSV"); ?></a>
    <a href="#" class="list-group-item"><?php _menu_icon("top", "export_sql"); ?> <?php _t("SQL"); ?></a>
    <a href="#" class="list-group-item"><?php _menu_icon("top", "export_txt"); ?> <?php _t("TXT"); ?></a>


</div>





