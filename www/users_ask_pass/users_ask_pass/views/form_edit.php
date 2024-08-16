<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="users_ask_pass">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$users_ask_pass[contact_id]"; ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$users_ask_pass[code]"; ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$users_ask_pass[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$users_ask_pass[status]"; ?>" >
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

