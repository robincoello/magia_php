<?php
# MagiaPHP 
# file date creation: 2024-01-23 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("magia", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'magia'); ?>
            <?php _t("Add magia"); ?>
        </h1>
        <?php include view("magia", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("magia", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

