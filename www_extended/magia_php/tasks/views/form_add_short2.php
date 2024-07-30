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
//vardump($args);
$form = $args['form'];
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="category_id" value="<?php echo $form['category_id']; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $form['contact_id']; ?>">

    <input type="hidden" name="controller" value="<?php echo $form['controller']; ?>">
    <input type="hidden" name="doc_id" value="<?php echo $form['doc_id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $form['redi']['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $form['redi']['c']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $form['redi']['id']; ?>">





    <?php # title   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"   name="title" class="form-control" id="title" placeholder="title" value="" autofocus="" >
        </div>	
    </div>
    <?php # /title   ?>

    <?php # description   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea  
                name="description" 
                class="form-control" 
                id="description" 
                placeholder="<?php _t("Write here the tasks you do not want to forget"); ?>" 
                rows="8"
                ></textarea>
        </div>	
    </div>
    <?php # /description   ?>

    <?php # status   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select  name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                <?php tasks_status_select("code", "name", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /status   ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
