<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts_titles">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$contacts_titles[id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="title" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$contacts_titles[title]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Abbreviation"); ?></label>
        <div class="col-sm-8">                    
            <input type="abbreviation" name="abbreviation" class="form-control"  id="abbreviation" placeholder="abbreviation" value="<?php echo "$contacts_titles[abbreviation]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$contacts_titles[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$contacts_titles[status]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

