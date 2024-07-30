<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_budgets"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Maxlength description"); ?></h1>


        <h3 style="ba">
            <?php _t("Max value actual"); ?>: 
            <?php echo _options_option("config_budgets_description_maxlength"); ?>
        </h3>


        <?php include view('config', 'form_budgets_description_maxlength'); ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

