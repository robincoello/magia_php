<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_contacts"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Contacts discounts by default"); ?></h1>

        <p>
            <?php _t("What is the maximum discount percentage that can be applied to a customer"); ?>
        </p>

        <p>
            <?php _t("The actual values is"); ?>: <?php echo _options_option('config_discounts_max_to_customer'); ?>%
        </p>

        <?php include "form_contacts_discounts_max_to_customer.php"; ?>





    </div>

</div>

<?php include view("home", "footer"); ?> 

