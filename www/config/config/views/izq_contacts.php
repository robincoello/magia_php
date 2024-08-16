
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("Contacts"); ?>
    </a>

    <a href="index.php?c=config&a=contacts_view" class="list-group-item <?php echo ($a == "contacts_view") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "contacts"); ?>
        <?php _t("View"); ?>
    </a>
    <a href="index.php?c=config&a=contacts_find_one" class="list-group-item <?php echo ($a == "contacts_find_one") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "contacts"); ?>
        <?php _t("Find one"); ?>
    </a>

    <a href="index.php?c=config&a=contacts_birthdate" class="list-group-item <?php echo ($a == "contacts_birthdate") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "contacts"); ?>
        <?php _t("Birthdate"); ?>
    </a>

    <a href="index.php?c=config&a=contacts_discounts_max_to_customer" class="list-group-item <?php echo ($a == "contacts_discounts_max_to_customer") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "contacts"); ?>
        <?php _t("Discount max."); ?>
    </a>

    <?php
    /**
     *     <a href="index.php?c=config&a=contacts_pics_in_search" class="list-group-item <?php echo ($a == "contacts_pics_in_search") ? "list-group-item-info" : ""; ?>">
      <span class="glyphicon glyphicon-picture"></span>
      <?php _t("Pics in search"); ?>
      </a>

      <a href="index.php?c=config&a=contacts_cv_config" class="list-group-item <?php echo ($a == "contacts_cv_config") ? "list-group-item-info" : ""; ?>">
      <span class="glyphicon glyphicon-picture"></span>
      <?php _t("Cv config"); ?>
      </a>
     */
    ?>

</div>
