<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_balance"); ?>
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

        <h1><?php _t("Balance pagination"); ?></h1>

        <p>
            <?php _t("Items by page"); ?>
        </p>    



        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_balance_pagination_items_limit">                                                         


            <div class="form-group">
                <label class="sr-only" for="data">data</label>
                <div class="input-group">                    

                    <input 
                        type="text" 
                        class="form-control" 
                        id="data" 
                        name="data" 
                        placeholder="" 
                        value="<?php echo _options_option('config_balance_pagination_items_limit'); ?>"> 

                    <div class="input-group-addon"><?php _t("items / page"); ?></div>


                </div>

            </div>

            <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
        </form>






    </div>
</div>

<?php include view("home", "footer"); ?> 

