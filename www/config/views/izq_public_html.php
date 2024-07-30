
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "public_html"); ?>
        <?php echo _t("public_html"); ?>
    </a>


    <a href="index.php?c=config&a=public_html_theme" class="list-group-item <?php echo ($a == "public_html_theme") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "public_html"); ?> 
        <?php _t("Theme"); ?>
    </a>

</div>

