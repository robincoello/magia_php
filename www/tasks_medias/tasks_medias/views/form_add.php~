<?php
# MagiaPHP 
# file date creation: 2024-04-28 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks_medias">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # task_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="task_id"><?php _t("Task_id"); ?></label>
        <div class="col-sm-8">
            <select name="task_id" class="form-control selectpicker" id="task_id" data-live-search="true" >
                <?php tasks_select("id", array("id"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /task_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type" value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <textarea name="url" class="form-control" id="url" placeholder="url - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.url.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /url ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
