<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_credit_notes_description_maxlength">      
    <input type="hidden" name="redi" value="<?php echo $redi; ?>"> 

    <div class="form-group">

        <label for="data">
            <?php _t("This allows us to configure the length in characters in the description field of each line of the document"); ?>
        </label>

        <input 
            type="number" 
            class="form-control" 
            name="data"
            id="data" 
            placeholder="<?php _t("max value 250"); ?>"
            value="<?php echo _options_option("config_credit_notes_description_maxlength"); ?>"
            >
    </div>

    <span id="helpBlock" class="help-block">
        <?php _t("Maximum number of characters that can contain a line in the document, including empty spaces"); ?>
    </span>

    <button type="submit" class="btn btn-default">
        <?php _t("Save"); ?>
    </button>
</form>
