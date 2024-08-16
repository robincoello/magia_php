<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="directory">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$directory[contact_id]"; ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # address_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address_id"><?php _t("Address_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="address_id" class="form-control"  id="address_id" placeholder="address_id" value="<?php echo "$directory[address_id]"; ?>" >
        </div>	
    </div>
    <?php # /address_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$directory[name]"; ?>" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # data ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="data"><?php _t("Data"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="data" class="form-control"  id="data" placeholder="data" value="<?php echo "$directory[data]"; ?>" >
        </div>	
    </div>
    <?php # /data ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$directory[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$directory[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

