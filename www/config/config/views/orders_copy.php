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

        <h1><?php _t("Make copy from an order"); ?></h1>





        <p>
            <?php if (_options_option("config_orders_copy")) { ?>




            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_orders_copy">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("Desactivate"); ?></button>
            </form>

            <p>-</p>

            <p>
                <?php _t("Yes, Currently you can make a copy from an order"); ?>
            </p>

            <img src="www/gallery/img/invoices_orders_copy_yes.jpg" width="width" height="height" alt="alt"/>



        <?php } else { ?>

            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_orders_copy">            
                <input type="hidden" name="data" value="1">            

                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <p>-</p>

            <p>
                <?php _t("No, Currently you can not make a copy from an order"); ?>
            </p>

            <img src="www/gallery/img/invoices_orders_copy_no.jpg" width="width" height="height" alt="alt"/>

        <?php } ?>
        </p>












    </div>
</div>

<?php include view("home", "footer"); ?> 

