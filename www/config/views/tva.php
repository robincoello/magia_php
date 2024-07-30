<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }

        $disabled = (invoices_list() ) ? " disabled " : "";
        ?>

        <h1>
            <span class="glyphicon glyphicon-home"></span>        
            <?php _t("My VAT number"); ?>
        </h1>


        <?php // include view('config', 'form_tva_update'); ?>
        <br>

        <p><?php _t("Please use only numbers and capital letters"); ?></p>

        <?php
        if ($disabled) {
            message('info', "If there are invoices you can no longer change your VAT");
        }
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

