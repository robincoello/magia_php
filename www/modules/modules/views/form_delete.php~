<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="modules">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label" value="<?php echo $modules['label']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # father ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father"><?php _t("Father"); ?></label>
        <div class="col-sm-8">
            <select name="father" class="form-control selectpicker" id="father" data-live-search="true"  disabled="" >
                <?php modules_select("module", "module", $modules['father'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /father ?>

    <?php # module ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="module"><?php _t("Module"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="module" class="form-control" id="module" placeholder="module" value="<?php echo $modules['module']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /module ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $modules['description']; ?></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # author ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="author"><?php _t("Author"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="author" class="form-control" id="author" placeholder="author" value="<?php echo $modules['author']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /author ?>

    <?php # author_email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="author_email"><?php _t("Author_email"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="author_email" class="form-control" id="author_email" placeholder="author_email" value="<?php echo $modules['author_email']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /author_email ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url" class="form-control" id="url" placeholder="url" value="<?php echo $modules['url']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /url ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="version" class="form-control" id="version" placeholder="version" value="<?php echo $modules['version']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /version ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $modules['order_by']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($modules["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($modules["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

