<?php if (modules_field_module('status', 'accounting')) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item <?php
        echo ( in_array($c, array(
            'tax',
            'banks',
            'config',
            'doc_models',
        ))) ? " active " : "";
        ?>">
               <?php _menu_icon("top", "expenses"); ?>
               <?php echo _t("Expenses"); ?>
        </a>


        <a href="index.php?c=config&a=expenses_clon" class="list-group-item <?php echo ($a == "expenses_clon") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "expenses"); ?> <?php _t("Clon"); ?></a>
        <a href="index.php?c=config&a=expenses_split" class="list-group-item <?php echo ($a == "expenses_split") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "expenses"); ?> <?php _t("Split"); ?></a>
        <a href="index.php?c=config&a=expenses_pagination_items_limit" class="list-group-item <?php echo ($a == "expenses_pagination_items_limit") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "expenses"); ?> <?php _t("Pagination"); ?></a>

    </div>
<?php } ?>




