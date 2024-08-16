<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$rols[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="rol" name="rol" class="form-control"  id="rol" placeholder="rol" value="<?php echo "$rols[rol]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # rol ?>

    <?php # rango ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Rango"); ?></label>
        <div class="col-sm-8">                    
            <input type="rango" name="rango" class="form-control"  id="rango" placeholder="rango" value="<?php echo "$rols[rango]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # rango ?>

    <?php # order ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order"); ?></label>
        <div class="col-sm-8">                    
            <input type="order" name="order" class="form-control"  id="order" placeholder="order" value="<?php echo "$rols[order]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

