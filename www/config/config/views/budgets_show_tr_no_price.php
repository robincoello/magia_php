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
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Budgets show tr no price"); ?></h1>
        <p>
            <?php _t("On the pages: edit, details, show the lines that have zero price"); ?>?
        </p>    
        <p>
            <?php if (_options_option("config_budgets_show_tr_no_price")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_show_tr_no_price">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("No, don't show"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, Currently it shows the lines that have no price"); ?>
            </p>
            <img src="www/gallery/img/invoices_show_tr_price.jpg" width="width" height="height" alt="alt"/>
        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_show_tr_no_price">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Yes, show"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, Currently it don't shows the lines that have no price"); ?>
            </p>
            <img src="www/gallery/img/invoices_show_tr_no_price.jpg" width="width" height="height" alt="alt"/>
        <?php } ?>
        </p>












    </div>
</div>

<?php include view("home", "footer"); ?> 

