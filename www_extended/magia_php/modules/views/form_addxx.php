<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="modules">
    <input type="hidden" name="a" value="addOk">

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="name" class="form-control" id="name" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /name ?>

    <?php # sub_modules ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sub_modules"><?php _t("Sub_modules"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="sub_modules" class="form-control" id="sub_modules" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /sub_modules ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /description ?>

    <?php # author ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="author"><?php _t("Author"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="author" class="form-control" id="author" placeholder="" value="Robinson Coello">
        </div>	
    </div>
    <?php # /author ?>

    <?php # author_email ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="author_email"><?php _t("Author_email"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="author_email" class="form-control" id="author_email" placeholder="" value="robincoello@hotmail.com">
        </div>	
    </div>
    <?php # /author_email ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="url" class="form-control" id="url" placeholder="" value="https://factux.be">
        </div>	
    </div>
    <?php # /url ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="version" class="form-control" id="version" placeholder=" - defecto" value="0.0.1">
        </div>	
    </div>
    <?php # /version ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto" value="1">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto" value="1">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
