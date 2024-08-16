<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_tva_update">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">


    <div class="form-group">
        <label class="sr-only" for="tva">tva</label>
        <div class="input-group">                    

            <input 
                type="text" 
                class="form-control" 
                id="tva" 
                name="tva" 
                placeholder="BE123456789" 
                value="<?php echo _options_option('config_company_tva') ?>"
                <?php echo $disabled; ?>
                >                                        
        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-primary" <?php echo $disabled; ?>><?php _t("Update"); ?></button>
</form>

