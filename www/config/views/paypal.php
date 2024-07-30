<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }

        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        ?>

        <h1><?php _t("Paypal"); ?></h1>




        <form class="form-horizontal" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_paypal_update">  




            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Paypal account"); ?></label>
                <div class="col-sm-4">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="config_paypal_account" 
                        name="config_paypal_account" 
                        placeholder="config_paypal_account" 
                        value="<?php echo _options_option('config_paypal_account'); ?>"
                        >

                </div>
            </div>





            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button 
                        type="submit" 
                        class="btn btn-default">
                            <?php _t("Update"); ?>
                    </button>
                </div>
            </div>
        </form>



    </div>
</div>

<?php include view("home", "footer"); ?> 

