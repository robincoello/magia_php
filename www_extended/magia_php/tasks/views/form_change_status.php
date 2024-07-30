<?php
// crea html 
// esto poner donde se desea que aparesca este formulario
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
$form = $args['form'];
//vardump($args);
//vardump($form['status']);
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_change_status">
    <input type="hidden" name="id" value="<?php echo $form['id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $form['redi']['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $form['redi']['c']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $form['redi']['id']; ?>">

    <?php # status   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("New status"); ?></label>
        <div class="col-sm-8">
            <select  name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                <?php tasks_status_select("code", "name", $form['status'], array()); ?>                        
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
