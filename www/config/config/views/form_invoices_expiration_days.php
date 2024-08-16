<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_invoices_expiration_days"> 
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
                value="<?php echo _options_option('config_invoices_expiration_days'); ?>"> 
            <div class="input-group-addon"><?php _t("days"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
</form>


