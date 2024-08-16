<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts_titles">
    <input type="hidden" name="a" value="addOk">

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /title ?>

    <?php # abbreviation ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="abbreviation"><?php _t("Abbreviation"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="abbreviation" class="form-control" id="abbreviation" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /abbreviation ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
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
