<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_banks"); ?>
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



        <h1><?php _t("Banks lines"); ?></h1>

        <p>    <?php _t("Do you want to use bank statements to record receipts and payments in your system?"); ?> </p>

        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_banks_registre">            
            <input type="hidden" name="redi[redi]" value="2">            

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="1" <?php echo (_options_option('config_banks_registre') == '1' ) ? " checked " : ""; ?>>
                        <?php _t("Yes, use bank lines"); ?>


                </label>
            </div>


            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="0" <?php echo (_options_option('config_banks_registre') == '0' ) ? " checked " : ""; ?>>
                    <?php _t("No, I prefer to do it manually"); ?>  (<?php _t("default"); ?>)
                </label>
            </div>


            <button type="submit" class="btn btn-primary"><?php _t("Change"); ?></button>
        </form>




    </div>
</div>

<?php include view("home", "footer"); ?> 

