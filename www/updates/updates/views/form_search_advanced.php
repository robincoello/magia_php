<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="updates">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="version" class="form-control" id="version" placeholder="version" value="" >
        </div>	
    </div>
    <?php # /version ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # code_install ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_install"><?php _t("Code_install"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_install" class="form-control" id="code_install" placeholder="code_install - textarea" ></textarea>
        </div>	
    </div>
    <?php # /code_install ?>

    <?php # code_uninstall ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_uninstall"><?php _t("Code_uninstall"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_uninstall" class="form-control" id="code_uninstall" placeholder="code_uninstall - textarea" ></textarea>
        </div>	
    </div>
    <?php # /code_uninstall ?>

    <?php # code_check ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_check"><?php _t("Code_check"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_check" class="form-control" id="code_check" placeholder="code_check - textarea" ></textarea>
        </div>	
    </div>
    <?php # /code_check ?>

    <?php # installed ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="installed"><?php _t("Installed"); ?></label>
        <div class="col-sm-8">
            <select name="installed" class="form-control" id="installed" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /installed ?>

    <?php # pass ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pass"><?php _t("Pass"); ?></label>
        <div class="col-sm-8">
            <textarea name="pass" class="form-control" id="pass" placeholder="pass - textarea" ></textarea>
        </div>	
    </div>
    <?php # /pass ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Search"); ?>">
        </div>      							
    </div>      							

</form>
