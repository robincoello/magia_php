
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php include view("permissions", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-search"></i>
            <?php _t("Permissions Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("permissions", "form_search_advanced"); ?>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">       
        <?php //include view("permissions", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

