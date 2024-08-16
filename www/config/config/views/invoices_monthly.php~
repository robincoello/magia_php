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


        <h1><?php _t("Monthly invoice"); ?></h1>

        <p>    <?php _t("You can add multiple budgets to a monthly invoice"); ?> </p>



        <p>
            <?php if (_options_option("config_invoices_monthly")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_invoices_monthly">            
                <input type="hidden" name="data" value="0">            
                <button type="submit" class="btn btn-danger"><?php _t("Desactivate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently the system use monthly invoices"); ?>
            </p>


            <img src="www/gallery/img/invoices_monthly_yes.png" width="width" height="height" alt="alt"/>


        <?php } else { ?>

            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_invoices_monthly">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently the system does not use monthly invoices"); ?>
            </p>


            <img src="www/gallery/img/invoices_monthly_no.png" width="width" height="height" alt="alt"/>



        <?php } ?>
        </p>

    </div>
</div>

<?php include view("home", "footer"); ?> 

