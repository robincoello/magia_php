<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">
            <select name="owner_id" class="form-control selectpicker" id="owner_id" data-live-search="true"  disabled="" >
                <?php contacts_select("id", "id", $gallery['owner_id'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /owner_id ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true"  disabled="" >
                <?php controllers_select("controller", "controller", $gallery['controller'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="<?php echo $gallery['doc_id']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $gallery['name']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $gallery['title']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $gallery['description']; ?></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # alt ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="alt"><?php _t("Alt"); ?></label>
        <div class="col-sm-8">
            <textarea name="alt" class="form-control" id="alt" placeholder="alt - textarea"  disabled="" ><?php echo $gallery['alt']; ?></textarea>
        </div>	
    </div>
    <?php # /alt ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <textarea name="url" class="form-control" id="url" placeholder="url - textarea"  disabled="" ><?php echo $gallery['url']; ?></textarea>
        </div>	
    </div>
    <?php # /url ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="<?php echo $gallery['date_registre']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $gallery['code']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $gallery['order_by']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($gallery["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($gallery["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
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

