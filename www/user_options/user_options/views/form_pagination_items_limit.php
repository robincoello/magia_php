
<form class="form-inline" method="post">
    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_pagination_items_limit">
    <input type="hidden" name="redi" value="<?php echo $arg["redi"]; ?>">

    <div class="form-group">
        <div class="input-group">

            <input 
                type="text" 
                name="data" 
                class="form-control" 
                id="data" 
                placeholder="10"
                value="<?php echo _options_option("config_user_options_pagination_items_limit") ?>"
                >
            <div class="input-group-addon"><?php _t("items/page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><?php _t("Save"); ?></button>
</form>



