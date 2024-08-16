<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="users_ask_pass">
    <input type="hidden" name="a" value="addOk">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control" id="contact_id">                                
                <?php contacts_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="code" class="form-control" id="code" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
        </div>	
    </div>
    <?php # /date ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
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
