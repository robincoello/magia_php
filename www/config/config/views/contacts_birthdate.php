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

        <h1><?php _t("Contacts birthdate"); ?></h1>

        <p>
            <?php _t("Use the birthdate in the contact record?"); ?>
        </p>

        <?php include "form_contacts_birthdate.php"; ?>



    </div>

</div>

<?php include view("home", "footer"); ?> 

