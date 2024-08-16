
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("Pdf data"); ?>
    </a>

    <a href="index.php?c=config&a=pdf_data_contacts" class="list-group-item <?php echo ($a == "pdf_data_contacts") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "contacts"); ?> 
        <?php _t("Contacts"); ?>
    </a>

    <a href="index.php?c=config&a=contacts_pics_in_search" class="list-group-item <?php echo ($a == "contacts_pics_in_search") ? "list-group-item-info" : ""; ?>">
        <span class="glyphicon glyphicon-picture"></span>
        <?php _t("Pics in search"); ?>
    </a>

    <a href="index.php?c=config&a=contacts_cv_config" class="list-group-item <?php echo ($a == "contacts_cv_config") ? "list-group-item-info" : ""; ?>">
        <span class="glyphicon glyphicon-picture"></span>
        <?php _t("Cv config"); ?>
    </a>

</div>





