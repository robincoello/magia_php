<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_orders_extra_value_for_express_transport"> 
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <div class="form-group">
        <label class="sr-only" for="data">data</label>
        <div class="input-group">                    

            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo _options_option('config_orders_extra_value_for_express_transport'); ?>"> 

            <div class="input-group-addon"><?php _t("Euros"); ?></div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
</form>
