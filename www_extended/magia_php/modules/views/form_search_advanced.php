<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="modules">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
    <?php # name ?>

    <?php # sub_modules ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Sub_modules"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sub_modules" class="form-control"  id="sub_modules" placeholder="sub_modules" value="">
        </div>	
    </div>
    <?php # sub_modules ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="">
        </div>	
    </div>
    <?php # description ?>

    <?php # author ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Author"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="author" class="form-control"  id="author" placeholder="author" value="">
        </div>	
    </div>
    <?php # author ?>

    <?php # author_email ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Author_email"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="author_email" class="form-control"  id="author_email" placeholder="author_email" value="">
        </div>	
    </div>
    <?php # author_email ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="">
        </div>	
    </div>
    <?php # url ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Version"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="version" class="form-control"  id="version" placeholder="version" value="">
        </div>	
    </div>
    <?php # version ?>

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
