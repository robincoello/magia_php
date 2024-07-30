<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts_titles">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$contacts_titles[title]"; ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # abbreviation ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="abbreviation"><?php _t("Abbreviation"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="abbreviation" class="form-control"  id="abbreviation" placeholder="abbreviation" value="<?php echo "$contacts_titles[abbreviation]"; ?>" >
        </div>	
    </div>
    <?php # /abbreviation ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$contacts_titles[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$contacts_titles[status]"; ?>" >
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

