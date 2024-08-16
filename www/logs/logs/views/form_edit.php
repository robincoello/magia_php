<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="logs">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # level ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="level"><?php _t("Level"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="level" class="form-control"  id="level" placeholder="level" value="<?php echo "$logs[level]"; ?>" >
        </div>	
    </div>
    <?php # /level ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$logs[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # u_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="u_id"><?php _t("U_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="u_id" class="form-control"  id="u_id" placeholder="u_id" value="<?php echo "$logs[u_id]"; ?>" >
        </div>	
    </div>
    <?php # /u_id ?>

    <?php # u_rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="u_rol"><?php _t("U_rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="u_rol" class="form-control"  id="u_rol" placeholder="u_rol" value="<?php echo "$logs[u_rol]"; ?>" >
        </div>	
    </div>
    <?php # /u_rol ?>

    <?php # c ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="c"><?php _t("C"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="c" class="form-control"  id="c" placeholder="c" value="<?php echo "$logs[c]"; ?>" >
        </div>	
    </div>
    <?php # /c ?>

    <?php # a ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="a"><?php _t("A"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="a" class="form-control"  id="a" placeholder="a" value="<?php echo "$logs[a]"; ?>" >
        </div>	
    </div>
    <?php # /a ?>

    <?php # w ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="w"><?php _t("W"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="w" class="form-control"  id="w" placeholder="w" value="<?php echo "$logs[w]"; ?>" >
        </div>	
    </div>
    <?php # /w ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$logs[description]"; ?>" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="doc_id" class="form-control"  id="doc_id" placeholder="doc_id" value="<?php echo "$logs[doc_id]"; ?>" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="crud" class="form-control"  id="crud" placeholder="crud" value="<?php echo "$logs[crud]"; ?>" >
        </div>	
    </div>
    <?php # /crud ?>

    <?php # error ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="error"><?php _t("Error"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="error" class="form-control"  id="error" placeholder="error" value="<?php echo "$logs[error]"; ?>" >
        </div>	
    </div>
    <?php # /error ?>

    <?php # val_get ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_get"><?php _t("Val_get"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="val_get" class="form-control"  id="val_get" placeholder="val_get" value="<?php echo "$logs[val_get]"; ?>" >
        </div>	
    </div>
    <?php # /val_get ?>

    <?php # val_post ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_post"><?php _t("Val_post"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="val_post" class="form-control"  id="val_post" placeholder="val_post" value="<?php echo "$logs[val_post]"; ?>" >
        </div>	
    </div>
    <?php # /val_post ?>

    <?php # val_request ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="val_request"><?php _t("Val_request"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="val_request" class="form-control"  id="val_request" placeholder="val_request" value="<?php echo "$logs[val_request]"; ?>" >
        </div>	
    </div>
    <?php # /val_request ?>

    <?php # ip4 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ip4"><?php _t("Ip4"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ip4" class="form-control"  id="ip4" placeholder="ip4" value="<?php echo "$logs[ip4]"; ?>" >
        </div>	
    </div>
    <?php # /ip4 ?>

    <?php # ip6 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ip6"><?php _t("Ip6"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ip6" class="form-control"  id="ip6" placeholder="ip6" value="<?php echo "$logs[ip6]"; ?>" >
        </div>	
    </div>
    <?php # /ip6 ?>

    <?php # broswer ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="broswer"><?php _t("Broswer"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="broswer" class="form-control"  id="broswer" placeholder="broswer" value="<?php echo "$logs[broswer]"; ?>" >
        </div>	
    </div>
    <?php # /broswer ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

