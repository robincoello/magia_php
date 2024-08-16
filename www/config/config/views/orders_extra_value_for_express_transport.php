<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_orders"); ?>
    </div>

    <div class="col-lg-6">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Extra value for express transport"); ?></h1>

        <p>
            <?php _t("When the orders express transport is chosen, this will be the added value per order"); ?>
        </p>    


        <?php include view('config', 'form_orders_extra_value_for_express_transport'); ?>




    </div>
</div>

<?php include view("home", "footer"); ?> 

