<form class="form-horizontal" method="post" action="index.php" >
    <input type="hidden" name="c" value="my_info">
    <input type="hidden" name="a" value="ok_change_password">

    <div class="form-group">
        <label for="actual" class="col-sm-3 control-label"><?php _t("Actual password"); ?></label>
        <div class="col-sm-6">
            <input type="password" name="ap" class="form-control" id="actual" placeholder="" required="">
        </div>
    </div>


    <div class="form-group">
        <label for="new"class="col-sm-3 control-label"><?php _t("New password"); ?></label>
        <div class="col-sm-6">
            <input type="text" name="np" class="form-control" id="new" placeholder="" required="">
        </div>
    </div>


    <div class="form-group">
        <label for="repete" class="col-sm-3 control-label"><?php _t("Repete password"); ?></label>
        <div class="col-sm-6">
            <input type="text" name="rp" class="form-control" id="repete" placeholder="" required="">
        </div>
    </div>


    <div class="form-group">
        <label for="repete" class="col-sm-3 control-label"></label>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
        </div>
    </div>

</form>