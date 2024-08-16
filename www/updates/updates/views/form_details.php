<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="updates">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $updates['code']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="<?php echo $updates['date']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="version" class="form-control" id="version" placeholder="version" value="<?php echo $updates['version']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /version ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $updates['name']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $updates['description']; ?></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # code_install ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_install"><?php _t("Code_install"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_install" class="form-control" id="code_install" placeholder="code_install - textarea"  disabled="" ><?php echo $updates['code_install']; ?></textarea>
        </div>	
    </div>
    <?php # /code_install ?>

    <?php # code_uninstall ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_uninstall"><?php _t("Code_uninstall"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_uninstall" class="form-control" id="code_uninstall" placeholder="code_uninstall - textarea"  disabled="" ><?php echo $updates['code_uninstall']; ?></textarea>
        </div>	
    </div>
    <?php # /code_uninstall ?>

    <?php # code_check ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_check"><?php _t("Code_check"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_check" class="form-control" id="code_check" placeholder="code_check - textarea"  disabled="" ><?php echo $updates['code_check']; ?></textarea>
        </div>	
    </div>
    <?php # /code_check ?>

    <?php # installed ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="installed"><?php _t("Installed"); ?></label>
        <div class="col-sm-8">
            <select name="installed" class="form-control" id="installed"  disabled="" >                
                <option value="1" <?php echo ($updates["installed"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($updates["installed"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /installed ?>

    <?php # pass ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pass"><?php _t("Pass"); ?></label>
        <div class="col-sm-8">
            <textarea name="pass" class="form-control" id="pass" placeholder="pass - textarea"  disabled="" ><?php echo $updates['pass']; ?></textarea>
        </div>	
    </div>
    <?php # /pass ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $updates['order_by']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($updates["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($updates["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

