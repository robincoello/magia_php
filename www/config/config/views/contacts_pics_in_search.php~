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

        <h1><?php _t("Pics in search"); ?></h1>


        <p>
            <?php _t("Do you want to use pics in search"); ?> ?
        </p>    
        <p>
            <?php if (_options_option("config_contacts_pics_in_search")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_contacts_pics_in_search">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("No"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, the system use pics in search"); ?>
            </p>
            <img src="www/gallery/img/contacts_pics_in_search_yes.jpg" width="width" height="height" alt="alt"/>
        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_contacts_pics_in_search">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Yes"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, the system does not use pics in search"); ?>
            </p>
            <img src="www/gallery/img/contacts_pics_in_search_no.jpg" width="width" height="height" alt="alt"/>
        <?php } ?>
        </p>





    </div>
</div>

<?php include view("home", "footer"); ?> 

