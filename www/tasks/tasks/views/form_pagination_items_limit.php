
<form class="form-inline" method="post">
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_pagination_items_limit">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <div class="form-group">
        <div class="input-group">

            <input 
                type="text" 
                name="data" 
                class="form-control" 
                id="data" 
                placeholder="10"
                value="<?php echo _options_option("config_tasks_pagination_items_limit") ?>"
                >
            <div class="input-group-addon"><?php _t("items/page"); ?></div>
        </div>
    </div>

    <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk"); ?> <?php _t("Save"); ?></button>

</form>



