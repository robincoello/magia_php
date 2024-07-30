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
    <input type="hidden" name="a" value="ok_update_description">       
    <input type="hidden" name="id" value="<?php echo $tasks->getId(); ?>">       
    <input type="hidden" name="redi[redi]" value="25">
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
        <div class="col-sm-12">
            <input type="text" 
                   name="title" 
                   class="form-control" 
                   id="title" 
                   placeholder="<?php _t("Short title"); ?>" 
                   value="<?php echo $tasks->getTitle(); ?>" 
                   required="" 
                   >
        </div>	
    </div>
    <?php # /title  ?>



    <?php # description  ?>
    <div class="form-group">
        <div class="col-sm-12">
            <textarea  
                name="description" 
                class="form-control" 
                <?php
                // si no se ponde asi, hay varios id con el mismo nombre y causa errores sobretodo con el docu de la nav
                // si no se ponde asi, hay varios id con el mismo nombre y causa errores sobretodo con el docu de la nav
                // si no se ponde asi, hay varios id con el mismo nombre y causa errores sobretodo con el docu de la nav
                // si no se ponde asi, hay varios id con el mismo nombre y causa errores sobretodo con el docu de la nav
                ?>
                id="description_<?php echo "form_edit"; ?>" 
                placeholder="" 
                rows="5"
                ><?php echo $tasks->getDescription(); ?></textarea>

            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                        .create(document.querySelector('#description_<?php echo "form_edit"; ?>'))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description  ?>

    <div class="form-group">
        <div class="col-sm-12">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
