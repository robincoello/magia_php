<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="editOk">
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
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="rol" class="form-control"  id="rol" placeholder="rol" value="<?php echo "$permissions[rol]"; ?>" readonly="" >
        </div>	
    </div>
    <?php # /rol ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="controller" class="form-control"  id="controller" placeholder="controller" value="<?php echo "$permissions[controller]"; ?>" readonly="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php
    /**
     *     <?php # crud ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
      <div class="col-sm-8">
      <input type="text" name="crud" class="form-control"  id="crud" placeholder="crud" value="<?php echo "$permissions[crud]"; ?>" >
      </div>
      </div>
      <?php # /crud ?>
     */
    ?>



    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">                    


            <label class="checkbox-inline">
                <input type="checkbox" name="create" id="create" value="1" <?php echo ($permissions['crud'][0]) ? " checked " : ""; ?>>

                <span class="label label-primary"><?php _t("Create"); ?></span>

            </label>
            <br>

            <label class="checkbox-inline">
                <input type="checkbox" name="read" id="read" value="1" <?php echo ($permissions['crud'][1]) ? " checked " : ""; ?>> 

                <span class="label label-info"><?php _t("Read"); ?></span>


            </label>
            <br>

            <label class="checkbox-inline">
                <input type="checkbox" name="update" id="update" value="1" <?php echo ($permissions['crud'][2]) ? " checked " : ""; ?>> 

                <span class="label label-warning"><?php _t("Update"); ?></span>


            </label>

            <br>
            <label class="checkbox-inline">
                <input type="checkbox" name="delete" id="delete" value="1" <?php echo ($permissions['crud'][3]) ? " checked " : ""; ?>> 
                <span class="label label-danger"><?php _t("Delete"); ?></span>

            </label>


        </div>	
    </div>
    <?php # /crud ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

