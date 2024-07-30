<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_invoices"); ?>
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

        <h1><?php _t("Proforma invoices"); ?></h1>

        <p>    <?php _t("From a budget you can print a proforma invoice"); ?> </p>
        <p>    <?php _t("This invoice has the same number as the budget"); ?> </p>
        <p>    <?php _t("This budget must be accepted by the client"); ?> </p>


        <p>
            <?php if (_options_option("config_invoices_proforma")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_invoices_proforma">            
                <input type="hidden" name="data" value="0">            
                <button type="submit" class="btn btn-danger"><?php _t("Desactivate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently the system use proforma invoices"); ?>
            </p>


            <img src="www/gallery/img/invoices_proforma_yes.png" width="width" height="height" alt="alt"/>


        <?php } else { ?>

            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_invoices_proforma">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently the system does not use proforma invoices"); ?>
            </p>


            <?php /* <img src="www/gallery/img/invoices_proforma_no.png" width="width" height="height" alt="alt"/> */ ?>



        <?php } ?>
        </p>

    </div>
</div>

<?php include view("home", "footer"); ?> 

