<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_pagination_items_limit">                                                         
    <input type="hidden" name="controller" value="<?php echo $controller; ?>">  
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">  

    <?php
    //vardump($controller); 
    //vardump(_options_option('config_' . $controller . '_pagination_items_limit')); 
    ?>


    <div class="form-group">
        <label class="sr-only" for="data">
            <?php _t("Data"); ?>
        </label>
        <div class="input-group">                    
            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo _options_option('config_' . $controller . '_pagination_items_limit'); ?>"> 
            <div class="input-group-addon"><?php _t("items / page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
</form>

