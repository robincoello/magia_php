<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="rol" class="form-control"  id="rol" placeholder="rol name" value="<?php echo "$rols[rol]"; ?>" >
        </div>	
    </div>
    <?php # /rol ?>

    <?php # rango ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rango"><?php _t("Rango"); ?></label>
        <div class="col-sm-8">                    
            <input type="number" name="rango" class="form-control"  id="rango" placeholder="Only numbers" value="<?php echo "$rols[rango]"; ?>" >
        </div>	
    </div>
    <?php # /rango ?>

    <?php # order ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order"><?php _t("Order"); ?></label>
        <div class="col-sm-8">                    
            <input type="number" name="order" class="form-control"  id="order" placeholder="Only numbers" value="<?php echo "$rols[order]"; ?>" >
        </div>	
    </div>
    <?php # /order ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

