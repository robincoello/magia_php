<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_web_update"> 
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">


    <div class="form-group">
        <label class="sr-only" for="web">Web</label>
        <div class="input-group">                    

            <input 
                type="text" 
                class="form-control" 
                id="web" 
                name="web" 
                placeholder="factux.be" 
                value="<?php echo _options_option('config_company_url'); ?>">                                        
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
</form>



