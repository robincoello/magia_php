<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_addresses"); ?>
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

        <h1><?php _t("Addresses"); ?></h1>


        <p>
            <?php _t("Do you want to use the delivery address?"); ?>?
        </p>    
        <p>
            <?php if (_options_option("config_address_use_delivery")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_address_use_delivery">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("No"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, the system uses delivery addresses"); ?>
            </p>
            <img src="www/gallery/img/address_use_delivery.jpg" width="width" height="height" alt="alt"/>
        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_address_use_delivery">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Yes"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, the system does not use delivery addresses"); ?>
            </p>
            <img src="www/gallery/img/address_no_use_delivery.jpg" width="width" height="height" alt="alt"/>
        <?php } ?>
        </p>





    </div>
</div>

<?php include view("home", "footer"); ?> 

