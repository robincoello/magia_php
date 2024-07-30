<?php
# MagiaPHP 
# file date creation: 2023-03-07 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # location ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="location" class="form-control" id="location" placeholder="location" value="" >
        </div>	
    </div>
    <?php # /location ?>

    <?php # father_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father_id"); ?></label>
        <div class="col-sm-8">
            <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                <?php _menus_select("id", "id", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label" value="" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller" value="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url" class="form-control" id="url" placeholder="url" value="#" >
        </div>	
    </div>
    <?php # /url ?>

    <?php # target ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="target" class="form-control" id="target" placeholder="target" value="" >
        </div>	
    </div>
    <?php # /target ?>

    <?php # icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t("Icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon" value="" >
        </div>	
    </div>
    <?php # /icon ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($_menus["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($_menus["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
