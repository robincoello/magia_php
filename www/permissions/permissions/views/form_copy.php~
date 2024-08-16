<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="ok_copy">
    <input type="hidden" name="rol_to" value="<?php echo $rol; ?>">

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol_from"><?php _t("Permissions from"); ?></label>
        <div class="col-sm-7">
            <select  name="rol_from" id="rol_from" class="form-control selectpicker" data-live-search="true" data-width="100%"   >                  
                <?php
                foreach (rols_list_order_by("rango") as $key => $value) {

                    //$selected = ($value['rol'] == $rol )? " selected ":"";
//                    $disabled = ($value['rol'] == $rol || $value['rol'] == 'root' ) ? " disabled " : "";

                    $disabled = null;
                    ?>
                    <option value="<?php echo $value['rol']; ?>" <?php echo "$disabled "; ?> ><?php echo $value['rol']; ?></option>
                <?php } ?>
            </select>
        </div>	
    </div>
    <?php # /rol  ?>



    <?php # rol  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol"><?php _t("Copy to"); ?></label>
        <div class="col-sm-7">
            <?php echo "$rol"; ?>
        </div>	
    </div>
    <?php # /rol  ?>






    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Copy"); ?>">
        </div>      							
    </div>      							

</form>
