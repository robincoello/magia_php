<form class="form-inline" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_change_status">
    <input type="hidden" name="id" value="<?php echo $tasks->getId(); ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">


    <?php # status ?>
    <div class="form-group">
        <label class="sr-only" for="status"><?php _t("Status"); ?></label>

        <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
            <?php tasks_status_select("code", "name", $tasks->getStatus(), array()); ?>                        
        </select>

    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="sr-only" for=""></label>

        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">

    </div>      							

</form>

