<?php
# MagiaPHP 
# file date creation: 2023-04-17 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("country_provinces", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'country_provinces'); ?>
            <?php _t("country_provinces details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("country_provinces", "form_details"); ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("country_provinces", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
