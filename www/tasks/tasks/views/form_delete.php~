<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $tasks->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">
            <select name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true"  disabled="" >
                <?php tasks_categories_select("id", "id", $tasks->getCategory_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /category_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true"  disabled="" >
                <?php contacts_select("id", "id", $tasks->getContact_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $tasks->getTitle(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $tasks->getDescription(); ?></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true"  disabled="" >
                <?php controllers_select("controller", "controller", $tasks->getController(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="<?php echo $tasks->getDoc_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="<?php echo $tasks->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # date_update ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_update" class="form-control" id="date_update" placeholder="date_update" value="<?php echo $tasks->getDate_update(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_update ?>

    <?php # color ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t("Color"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="color" class="form-control" id="color" placeholder="color" value="<?php echo $tasks->getColor(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /color ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $tasks->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control selectpicker" id="status" data-live-search="true"  disabled="" >
                <?php tasks_status_select("code", "code", $tasks->getStatus(), array()); ?>                        
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

