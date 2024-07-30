
<div class="list-group">
    <a href="#" class="list-group-item <?php
    echo ( in_array($c, array(
        'orders_status',
        'orders_vias',
        'config',
        'remake_motifs',
        'orders_show_tr_no_price',
    ))) ? " active " : "";
    ?>">
           <?php _menu_icon("top", "orders"); ?>
           <?php echo _t("Orders"); ?>
    </a>

    <a href="index.php?c=orders_status" class="list-group-item">
        <?php _menu_icon("top", "orders_status"); ?> 
        <?php _t("Status"); ?>
    </a>
    <a href="index.php?c=orders_vias" class="list-group-item">
        <?php _menu_icon("top", "orders_vias"); ?> <?php _t("Vias"); ?>
    </a>

    <a href="index.php?c=remake_motifs" class="list-group-item">
        <?php _menu_icon("top", "remake_motifs"); ?> <?php _t("Remake motifs"); ?>
    </a>

    <a href="index.php?c=config&a=orders_show_tr_no_price" class="list-group-item <?php echo ($a == "orders_show_tr_no_price") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "orders_show_tr_no_price"); ?> 
        <?php _t("Show tr no price"); ?>
    </a>


    <a href="index.php?c=config&a=orders_description_maxlength" class="list-group-item <?php echo ($a == "orders_description_maxlength") ? "list-group-item-info" : ""; ?>">
        <span class="glyphicon glyphicon-text-width"></span>
        <?php _t("Description maxlength"); ?>
    </a>


    <a href="index.php?c=config&a=orders_pagination_items_limit" class="list-group-item <?php echo ($a == "orders_pagination_items_limit") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "orders_show_tr_no_price"); ?> 
        <?php _t("Pagination"); ?>
    </a>

    <a href="index.php?c=config&a=orders_copy" class="list-group-item <?php echo ($a == "orders_copy") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "orders_copy"); ?> <?php _t("Copies"); ?></a>

    <a href="index.php?c=config&a=orders_extra_value_for_express_transport" class="list-group-item <?php echo ($a == "orders_extra_value_for_express_transport") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "orders_copy"); ?> <?php _t("Extra value for express transport"); ?></a>

    <a href="index.php?c=_types_modeles_formes" class="list-group-item"><?php _t("Types modeles formes"); ?></a>

</div>






