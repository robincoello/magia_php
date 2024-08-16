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

        <h1><?php _t("Budgets accept via web"); ?></h1>

        <p>
            <?php _t("You can give the possibility to your clients to approve the budgets via the web"); ?>?
        </p>    



        <p>
            <?php if (_options_option("config_budgets_accept_via_web")) { ?>




            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_accept_via_web">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("No, dont accept via la web"); ?></button>
            </form>


            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, Currently your clients can accept budget via the web"); ?>
            </p>
            <img src="www/gallery/img/budgets_accept_via_web.jpg" width="width" height="height" alt="alt"/>
        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_budgets_accept_via_web">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Yes, accept via la web"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, At this time your clients cannot accept the budgets from the web"); ?>
            </p>
            <img src="www/gallery/img/budgets_accept_via_web.jpg" width="width" height="height" alt="alt"/>
        <?php } ?>
        </p>












    </div>
</div>

<?php include view("home", "footer"); ?> 

