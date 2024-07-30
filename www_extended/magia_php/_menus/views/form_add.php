<?php
# MagiaPHP 
# file date creation: 2023-03-07 
//vardump($location);
?>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="2">

    <?php # location  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="location" 
                class="form-control" 
                id="location" 
                placeholder="location" 
                value="<?php echo (isset($location)) ? "$location" : ""; ?>" 
                >
        </div>	
    </div>
    <?php
//    vardump($location);
# /location 
    ?>

    <?php # father_id   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8">
            <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                <option value="null"><?php _t("Without father"); ?></option>
                <?php _menus_select("id", "label", "$father_id", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /father_id   ?>

    <?php # label   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label"
                   value="<?php echo (isset($label)) ? "$label" : ""; ?>" 
                   >
        </div>	
    </div>
    <?php # /label   ?>

    <?php # controller   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php
                foreach (controllers_list() as $key => $clist) {
                    echo '<option value="' . $clist["controller"] . '" >' . ($clist['controller']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /controller   ?>

    <?php # url   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url" class="form-control" id="url" placeholder="url"
                   value="<?php echo (isset($url)) ? "$url" : ""; ?>" 
                   >
        </div>	
    </div>
    <?php # /url   ?>

    <?php # target   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="target" class="form-control" id="target" placeholder="target"
                   value="<?php echo (isset($target)) ? "$target" : ""; ?>" 
                   >
        </div>	
    </div>
    <?php # /target   ?>







    <?php # icon  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t("Icon"); ?></label>
        <div class="col-sm-6">
            <select class="form-control selectpicker" name="icon" id="icon" data-live-search="true">
                <?php
                foreach (icons_list() as $key => $icon_item) {
                    //$icon_selected = ($icon_item['icon'] === $_menus['icon'] ) ? ' selected="true" ' : '';
                    echo '<option data-icon="' . $icon_item["icon"] . '" value="' . $icon_item["icon"] . '" >' . $icon_item['icon'] . '</option>';
                }
                ?>
            </select>
            <span id="icon" class="help-block">
                <a href="https://getbootstrap.com/docs/3.4/components/" target="new"><?php _t("Icons"); ?></a>
            </span>
        </div>	

    </div>
    <?php # /icon       ?>






    <?php # order_by   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by   ?>

    <?php # status   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" ><?php echo _t("Actived"); ?></option>
                <option value="0" ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status   ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
        </div>      							
    </div>      							

</form>
