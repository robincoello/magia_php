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
//        vardump(_options_option('config_invoices_checked_by_default'));
        ?>



        <h1><?php _t("Checked by default"); ?></h1>

        <p>    <?php _t("When you create an invoice, what will be the default status?"); ?> </p>



        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_invoices_checked_by_default">            


            <div class="radio">
                <label>
                    <input type="radio" name="data" id="data" value="0" <?php echo (_options_option('config_invoices_checked_by_default') == '0' ) ? " checked " : ""; ?>>
                    <?php _t("Draft"); ?> (<?php _t("default"); ?>)
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="data" id="data" value="10" <?php echo (_options_option('config_invoices_checked_by_default') == '10' ) ? " checked " : ""; ?> >
                    <?php _t("Registred"); ?>
                </label>
            </div>





            <button type="submit" class="btn btn-primary"><?php _t("Changer"); ?></button>
        </form>


        <p>
            <?php /**
              $checked_by_default = _options_option("config_invoices_checked_by_default");

              if ($checked_by_default == 10 && 1 == 555555555555555555555555555) {
              ?>
              <p>
              <?php _t("Currently the default status when an invoice is created is registred"); ?>
              </p>
              <img src="www/gallery/img/invoices_checked_by_default10.png" width="width" height="height" alt="alt"/>
              <p>-</p>
              <form class="form-inline" method="post" action="index.php">
              <input type="hidden" name="c" value="config">
              <input type="hidden" name="a" value="ok_invoices_checked_by_default">
              <input type="hidden" name="data" value="0">
              <button type="submit" class="btn btn-danger"><?php _t("Changer to draft"); ?></button>
              </form>

              <?php
              } else {
              // esto se pondra por defecto
              ?>
              <p>
              <?php _t("Currently the default status when an invoice is created is draft"); ?>
              </p>
              <img src="www/gallery/img/invoices_checked_by_default0.png" width="width" height="height" alt="alt"/>
              <p>-</p>
              <form class="form-inline" method="post" action="index.php">
              <input type="hidden" name="c" value="config">
              <input type="hidden" name="a" value="ok_invoices_checked_by_default">
              <input type="hidden" name="data" value="10">
              <button type="submit" class="btn btn-primary"><?php _t("Change to registred"); ?></button>
              </form>
              <?php } ?>
             * 
             */ ?>
        </p>




    </div>
</div>

<?php include view("home", "footer"); ?> 

