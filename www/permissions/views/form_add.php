<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="addOk">

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-7">
            <select  name="rol" id="rol" class="form-control selectpicker" data-live-search="true" data-width="100%"   >                  
                <?php
                foreach (rols_list_order_by("rango") as $key => $value) {
                    $selected = ($value['rol'] == $rol ) ? " selected " : "";
                    ?>
                    <option value="<?php echo $value['rol']; ?>" <?php echo $selected; ?> ><?php echo $value['rol']; ?></option>
                <?php } ?>
            </select>
        </div>	
    </div>
    <?php # /rol  ?>

    <?php # controller  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-7">
            <select  name="controller" id="controller" class="form-control selectpicker" data-live-search="true" data-width="100%"   >                                  
                <?php
                foreach (controllers_list() as $key => $value) {

                    $selected = ($value['controller'] == $controller ) ? " selected " : "";

                    if (!permissions_search_by_rol_controller($rol, $value['controller'])) {
                        //if (1) {
                        ?>
                        <option value="<?php echo $value['controller']; ?>" <?php echo $selected; ?> ><?php echo $value['controller']; ?></option>                        
                        <?php
                    }
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /controller   ?>


    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-7">                    


            <label class="checkbox-inline">
                <input type="checkbox" name="create" id="create" value="1" > 
                <span class="label label-primary"><?php _t("Create"); ?></span>

            </label>
            <br>

            <label class="checkbox-inline">
                <input type="checkbox" name="read" id="read" value="1">
                <span class="label label-info"><?php _t("Read"); ?></span>
            </label>
            <br>

            <label class="checkbox-inline">
                <input type="checkbox" name="update" id="update" value="1">
                <span class="label label-warning"><?php _t("Update"); ?></span>
            </label>

            <br>
            <label class="checkbox-inline">
                <input type="checkbox" name="delete" id="delete" value="1" >
                <span class="label label-danger"><?php _t("Delete"); ?></span>
            </label>


        </div>	
    </div>
    <?php # /crud ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
        </div>      							
    </div>      							

</form>
