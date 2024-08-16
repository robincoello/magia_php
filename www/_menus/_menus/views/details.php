<?php
# MagiaPHP 
# file date creation: 2023-03-07 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("_menus", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <h1>
            <?php _menu_icon("top", '_menus'); ?>
            <?php _t("_menus details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("_menus", "form_details"); ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("_menus", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
