<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("My account number"); ?></h1>




        <form class="form-horizontal" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_bank_update">  

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Bank name"); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="bank" placeholder="" value="<?php echo _options_option('config_bank_bank'); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="account_number" class="col-sm-2 control-label"><?php _t("Account number"); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="account" name="account_number" placeholder="" value="<?php echo _options_option('config_bank_account_number'); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="bic" class="col-sm-2 control-label"><?php _t("BIC"); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bic" name="bic" placeholder="" value="<?php echo _options_option('config_bank_bic'); ?>">
                </div>
            </div>


            <div class="form-group">
                <label for="iban" class="col-sm-2 control-label"><?php _t("IBAN"); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bic" name="iban" placeholder="" value="<?php echo _options_option('config_bank_iban'); ?>">
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                </div>
            </div>
        </form>



    </div>
</div>

<?php include view("home", "footer"); ?> 

