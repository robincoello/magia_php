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

        <h1><?php _t("Partials invoices"); ?></h1>

        <p>
            <?php _t("From a budget you can create several partial invoices that adding them will give the total budget"); ?>
        </p>    

        <p>
            <?php _t("This option can be used provided that the budget has only one type of VAT"); ?>
        </p>








        <p>





            <?php if (_options_option("config_budgets_create_partials_invoices")) { ?>




            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_create_partials_invoices">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("No, i dont want"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, Currently it create partials invoices"); ?>
            </p>

        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_create_partials_invoices">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Yes, i want make partials invoices"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, Currently it don't create partials invoices"); ?>
            </p>

        <?php } ?>
        </p>



    </div>
</div>

<?php include view("home", "footer"); ?> 

