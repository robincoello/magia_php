<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_contacts_discounts_max_to_customer">     
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label for="data"><?php _t("Discount max."); ?></label>
        <input 
            type="number" 
            min="0" 
            max="100" 
            step="1" 
            class="form-control" 
            name="data"
            id="data" 
            placeholder="0..100%"
            required=""
            value="<?php echo _options_option('config_discounts_max_to_customer') ?>"

            >
    </div>


    <button type="submit" class="btn btn-default">
        <?php _t("Save"); ?>
    </button>
</form>



