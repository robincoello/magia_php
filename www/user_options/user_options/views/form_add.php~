<?php
# MagiaPHP 
# file date creation: 2024-03-14 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $arg["redi"]; ?>">

    <?php # user_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="user_id"><?php _t("User_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="user_id" class="form-control" id="user_id" placeholder="user_id" value="" >
        </div>	
    </div>
    <?php # /user_id ?>

    <?php # option ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="option" class="form-control" id="option" placeholder="option" value="" >
        </div>	
    </div>
    <?php # /option ?>

    <?php # data ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="data"><?php _t("Data"); ?></label>
        <div class="col-sm-8">
            <textarea name="data" class="form-control" id="data" placeholder="data - textarea" ></textarea>
        </div>	
    </div>
    <?php # /data ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
