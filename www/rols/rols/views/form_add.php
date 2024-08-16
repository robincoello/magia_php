<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols">
    <input type="hidden" name="a" value="addOk">

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="rol" class="form-control" id="rol" placeholder="<?php _t("Rol name"); ?>" required="">
        </div>	
    </div>
    <?php # /rol ?>

    <?php # rango ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rango"><?php _t("Rango"); ?></label>
        <div class="col-sm-8">
            <input type="number"  name="rango" class="form-control" id="rango" placeholder="<?php _t("Only numbers"); ?>" required="">
        </div>	
    </div>
    <?php # /rango ?>

    <?php # order ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number"  name="order" class="form-control" id="order" placeholder="<?php _t("Only numbers"); ?>" required="">
        </div>	
    </div>
    <?php # /order ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>

<h3><?php _t("Atention"); ?></h3>

<ul>
    <li>Rols rango <b>< = <?php echo $config_rango_max_for_labo; ?></b> for <b>external</b> users</li>
    <li>Rols rango <b>> <?php echo $config_rango_max_for_labo; ?></b> for <b>internal</b> users</li>
</ul>