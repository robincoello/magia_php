<?php
# MagiaPHP 
# file date creation: 2024-01-04 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="messages">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="type">
                <?php
                $types_array = array("info", "success", "warning", "danger", "primary");
                foreach ($types_array as $types_item) {
                    echo '<option value="' . $types_item . '">' . ucfirst($types_item) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /type ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>
        </div>	
    </div>
    <?php # /message ?>

    <?php # url_action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_action"><?php _t("Url_action"); ?></label>
        <div class="col-sm-8">
            <textarea name="url_action" class="form-control" id="url_action" placeholder="url_action - textarea" ></textarea>
        </div>	
    </div>
    <?php # /url_action ?>

    <?php # url_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_label"><?php _t("Url_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url_label" class="form-control" id="url_label" placeholder="url_label" value="" >
        </div>	
    </div>
    <?php # /url_label ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">

            <select class="form-control" name="controller">
                <option value="null"><?php _t("All"); ?></option>
                <?php
                foreach (controllers_list() as $key => $controllers_list) {
                    echo '<option value="' . $controllers_list['controller'] . '">' . ($controllers_list["controller"]) . '</option>';
                }
                ?>
            </select>


        </div>	
    </div>
    <?php # /controller ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">

            <select class="form-control" name="contact_id">
                <option value="null"><?php _t("All"); ?></option>
                <?php
                foreach (users_list() as $key => $users_list) {
                    echo '<option value="' . $users_list['contact_id'] . '">' . contacts_formated($users_list["contact_id"]) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="rol">
                <option value="null"><?php _t("All"); ?></option>
                <?php
                foreach (rols_list() as $key => $rols_list) {
                    echo '<option value="' . $rols_list['rol'] . '">' . $rols_list["rol"] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /rol ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date" 
                name="date_registre" 
                class="form-control" 
                id="date_registre" 
                placeholder="date_registre" 
                value="<?php echo date("Y-m-d"); ?>" 
                readonly=""
                >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # read_by ?>
    <input type="hidden" name="read_by" value="null">


    <?php
    /**
     *     <div class="form-group">
      <label class="control-label col-sm-3" for="read_by"><?php _t("Read_by"); ?></label>
      <div class="col-sm-8">
      <textarea name="read_by" class="form-control" id="read_by" placeholder="read_by - textarea" ></textarea>
      </div>
      </div>
     */
    ?>
    <?php # /read_by ?>
    <input type="hidden" name="order_by" value="1">

    <?php
    /**
     *     <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1" <?php echo ($messages["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($messages["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>
     */
    ?>
    <input type="hidden" name="status" value="1">



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
