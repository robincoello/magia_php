<?php
# MagiaPHP 
# file date creation: 2024-01-03 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("gallery", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'gallery'); ?>
            <?php _t("Add gallery"); ?>
        </h1>
        <?php include view("gallery", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("gallery", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

