
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include view("country_provinces", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'country_provinces'); ?>
            <?php _t("Country_provinces Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("country_provinces", "form_search_advanced"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("country_provinces", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
