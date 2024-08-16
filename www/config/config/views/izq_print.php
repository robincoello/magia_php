<?php if (modules_field_module('status', 'accounting')) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <span class="glyphicon glyphicon-print"></span>
            <?php echo _t("Print"); ?>
        </a>

        <a href="index.php?c=config&a=print_multilang" class="list-group-item <?php echo ($a == "print_multilang") ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "_languages"); ?> 
            <?php _t("Print in  multi languages"); ?>
        </a>                

    </div>
<?php } ?>




