<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="country_provinces">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # country ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="country" class="form-control" id="country" placeholder="country" value="" >
        </div>	
    </div>
    <?php # /country ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # province ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="province"><?php _t("Province"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="province" class="form-control" id="province" placeholder="province" value="" >
        </div>	
    </div>
    <?php # /province ?>

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
