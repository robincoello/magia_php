

<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_push">                                                         
    <input type="hidden" name="option" value="tasks_medias_pagination_items_limit">                                                         
    <input type="hidden" name="redi[redi]" value="5">                                                          
    <input type="hidden" name="redi[c]" value="tasks_medias">                                                          
    <input type="hidden" name="redi[a]" value="index">                                                          

    <div class="form-group">
        <label class="sr-only" for="data"><?php _t("Data"); ?></label>
        <div class="input-group">                    
            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo user_options("tasks_medias_pagination_items_limit", $u_id); ?>"> 

            <div class="input-group-addon"><?php _t("items / page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>
</form>





