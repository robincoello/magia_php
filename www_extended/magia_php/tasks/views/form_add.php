<?php
// crea html 
//if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
//    $args = array(
//        "c" => $c,
//        "name" => 'robinson',
//        "form" => array(
//            "category_id" => null,
//            "contact_id" => $u_id,
//            "controller" => $c,
//            "doc_id" => null,
//            "redi" => array(
//                "redi" => "30",
//                "c" => $c,
//                "id" => null
//            )
//        ),
//    );
//
//    tasks_create_html('tmp_izq_index', $args);
//}
?>
<?php
# MagiaPHP 
# file date creation: 2023-02-08 
//vardump(1);
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">
    <input type="hidden" name="controller" value="<?php echo $c; ?>">
    <input type="hidden" name="redi[redi]" value="20">
    <input type="hidden" name="redi[c]" value="tasks">
    <input type="hidden" name="redi[id]" value="">



    <?php
    /**
     *     <?php # contact_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
      <div class="col-sm-8">
      <select  name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
      <?php contacts_select("id", "name", array(), array()); ?>
      </select>
      </div>
      </div>
      <?php # /contact_id ?>
     */
    ?>

    <?php # title  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?> * </label>
        <div class="col-sm-8">
            <input type="text"   name="title" class="form-control" id="title" placeholder="<?php _t("Short title"); ?>" value="" required="" >
        </div>	
    </div>
    <?php # /title  ?>



    <?php # description  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description_<?php echo "form_add"; ?>"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea  
                name="description" 
                class="form-control" 
                id="description_<?php echo "form_add"; ?>" 
                placeholder="" 
                rows="5"
                ></textarea>

            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                        .create(document.querySelector('#description_<?php echo "form_add"; ?>'))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description  ?>



    <?php # more  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"></label>
        <div class="col-sm-8">
            <a class="" 
               role="button" 
               data-toggle="collapse" 
               href="#collapseExample" 
               aria-expanded="false" 
               aria-controls="collapseExample">
                <span class="glyphicon glyphicon-chevron-down"></span>
                <?php _t("more"); ?>
            </a>
        </div>	
    </div>
    <?php # /more  ?>
    <div class="collapse" id="collapseExample">


        <?php # category_id  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="category_id"><?php _t("Category_id"); ?></label>
            <div class="col-sm-8">
                <select  name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true" >
                    <?php //tasks_categories_select("id", "category", array(), array());  ?> 
                    <option value="null"><?php _t('Select one'); ?></option>
                    <?php
                    // solo lo qiue father_id is not null
                    foreach (tasks_categories_without_father() as $key => $category_father) {
                        // show category name
                        echo '<optgroup label="' . $category_father['category'] . '"><option value="' . $category_father['id'] . '">' . $category_father['category'] . '</option>';
                        // for each father, get category
                        foreach (tasks_categories_search_by('father_id', $category_father['id']) as $key => $category_child) {
                            echo '<option value="' . $category_child['id'] . '">' . _tr($category_child['category']) . '</option>';
                        }
                        echo '</optgroup>';
                    }
                    ?>
                </select>
            </div>	
        </div>
        <?php # /category_id  ?>



        <?php # controller  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
            <div class="col-sm-8">
                <select  name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                    <?php controllers_select("controller", "controller", array(), array()); ?>                        
                </select>
            </div>	
        </div>
        <?php # /controller  ?>

        <?php # doc_id  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
            <div class="col-sm-8">
                <input type="number"  name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="" >
            </div>	
        </div>
        <?php # /doc_id  ?>

        <?php
        /**
         *     <?php # date_registre ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
          <div class="col-sm-8">
          <input type="date"   name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="current_timestamp()" >
          </div>
          </div>
          <?php # /date_registre ?>

          <?php # date_update ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
          <div class="col-sm-8">
          <input type="date"   name="date_update" class="form-control" id="date_update" placeholder="date_update" value="0000-00-00 00:00:00" >
          </div>
          </div>
          <?php # /date_update ?>
         */
        ?>

        <?php # color  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="color"><?php _t("Color"); ?></label>
            <div class="col-sm-8">
                <input type="text"   name="color" class="form-control" id="color" placeholder="color" value="white" >
            </div>	
        </div>
        <?php # /color  ?>

        <?php # order_by  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
            <div class="col-sm-8">
                <input type="number"  name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
            </div>	
        </div>
        <?php # /order_by  ?>



    </div>



    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select  name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                <?php
                foreach (tasks_status_list() as $key => $tsl) {
                    echo '<option value="' . $tsl["code"] . '">' . _tr($tsl["name"]) . '</option>';
                }
                ?>
                <?php //tasks_status_select("code", "name", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /status  ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
