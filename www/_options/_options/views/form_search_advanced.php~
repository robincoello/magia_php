<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_options">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # option ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="option" class="form-control" id="option" placeholder="option" value="" >
        </div>	
    </div>
    <?php # /option ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" placeholder="description" value="" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # data ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="data"><?php _t("Data"); ?></label>
        <div class="col-sm-8">
            <textarea name="data" class="form-control" id="data" placeholder="data - textarea" ></textarea>
        </div>	
    </div>
    <?php # /data ?>

    <?php # group ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="group"><?php _t("Group"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="group" class="form-control" id="group" placeholder="group" value="" >
        </div>	
    </div>
    <?php # /group ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php controllers_select("controller", "controller", $_options['controller'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
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
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Search"); ?>">
        </div>      							
    </div>      							

</form>
