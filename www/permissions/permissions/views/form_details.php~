<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$permissions[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="rol" name="rol" class="form-control"  id="rol" placeholder="rol" value="<?php echo "$permissions[rol]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # rol ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="controller" name="controller" class="form-control"  id="controller" placeholder="controller" value="<?php echo "$permissions[controller]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # controller ?>

    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">                    
            <input type="crud" name="crud" class="form-control"  id="crud" placeholder="crud" value="<?php echo "$permissions[crud]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # crud ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">

            <a 
                class="btn btn-primary"
                href="index.php?c=permissions&a=add&rol=<?php echo $permissions['rol']; ?>" ><?php _t("Add"); ?></a>







        </div>      							
    </div>      							

</form>

