<form class="form-horizontal">


    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Rol"); ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="name" value="<?php echo $u_rol; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label"><?php _t("Lastname"); ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" placeholder="lastname" value="<?php echo contacts_field_id("lastname", $u_id); ?>">
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>


</form>