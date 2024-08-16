<?php
# MagiaPHP 
# file date creation: 2023-02-16 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("_options", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <h1>
            <?php _menu_icon("top", '_options'); ?>
            <?php _t("Add _options"); ?>
        </h1>
        <?php include view("_options", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("_options", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

