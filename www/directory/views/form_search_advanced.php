<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="directory">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="">
        </div>	
    </div>
    <?php # contact_id ?>

    <?php # address_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Address_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="address_id" class="form-control"  id="address_id" placeholder="address_id" value="">
        </div>	
    </div>
    <?php # address_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
    <?php # name ?>

    <?php # data ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Data"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="data" class="form-control"  id="data" placeholder="data" value="">
        </div>	
    </div>
    <?php # data ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
    <?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
