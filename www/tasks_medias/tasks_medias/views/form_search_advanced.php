<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="tasks_medias">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # task_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="task_id"><?php _t("Task_id"); ?></label>
        <div class="col-sm-8">
            <select name="task_id" class="form-control selectpicker" id="task_id" data-live-search="true" >
                <?php tasks_select("id", array("id"), $tasks_medias->getTask_id(), array()); ?>                        
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
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
