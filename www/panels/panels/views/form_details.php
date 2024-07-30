<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="panels">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $panels->getId(); ?>">
    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true"  disabled="" >
                <?php controllers_select("controller", "controller", $panels->getController(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t("Action"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="action" class="form-control" id="action" placeholder="action" value="<?php echo $panels->getAction(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /action ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $panels->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # panel ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="panel"><?php _t("Panel"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="panel" class="form-control" id="panel" placeholder="panel" value="<?php echo $panels->getPanel(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /panel ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $panels->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($panels->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($panels->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

