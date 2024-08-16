<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="logs">
    <input type="hidden" name="a" value="addOk">

    <?php # level ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="level"><?php _t("Level"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="level" class="form-control" id="level" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /level ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
        </div>	
    </div>
    <?php # /date ?>

    <?php # u_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="u_id"><?php _t("U_id"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="u_id" class="form-control" id="u_id" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /u_id ?>

    <?php # u_rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="u_rol"><?php _t("U_rol"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="u_rol" class="form-control" id="u_rol" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /u_rol ?>

    <?php # c ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="c"><?php _t("C"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="c" class="form-control" id="c" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /c ?>

    <?php # a ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="a"><?php _t("A"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="a" class="form-control" id="a" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /a ?>

    <?php # w ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="w"><?php _t("W"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="w" class="form-control" id="w" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /w ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /description ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="doc_id" class="form-control" id="doc_id" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="crud" class="form-control" id="crud" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /crud ?>

    <?php # error ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="error"><?php _t("Error"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="error" class="form-control" id="error" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /error ?>

    <?php # val_get ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_get"><?php _t("Val_get"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="val_get" class="form-control" id="val_get" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /val_get ?>

    <?php # val_post ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_post"><?php _t("Val_post"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="val_post" class="form-control" id="val_post" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /val_post ?>

    <?php # val_request ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_request"><?php _t("Val_request"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="val_request" class="form-control" id="val_request" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /val_request ?>

    <?php # ip4 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ip4"><?php _t("Ip4"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="ip4" class="form-control" id="ip4" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /ip4 ?>

    <?php # ip6 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ip6"><?php _t("Ip6"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="ip6" class="form-control" id="ip6" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /ip6 ?>

    <?php # broswer ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="broswer"><?php _t("Broswer"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="broswer" class="form-control" id="broswer" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /broswer ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
