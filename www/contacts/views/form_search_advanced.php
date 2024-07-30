<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="">
        </div>	
    </div>
    <?php # owner_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="type" class="form-control"  id="type" placeholder="type" value="">
        </div>	
    </div>
    <?php # type ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="">
        </div>	
    </div>
    <?php # title ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
    <?php # name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="lastname" class="form-control"  id="lastname" placeholder="lastname" value="">
        </div>	
    </div>
    <?php # lastname ?>

    <?php # birthdate ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Birthdate"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="birthdate" class="form-control"  id="birthdate" placeholder="birthdate" value="">
        </div>	
    </div>
    <?php # birthdate ?>

    <?php # tva ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tva"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tva" class="form-control"  id="tva" placeholder="tva" value="">
        </div>	
    </div>
    <?php # tva ?>

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
