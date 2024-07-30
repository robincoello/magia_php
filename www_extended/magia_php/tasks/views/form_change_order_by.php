<?php
// crea html 
// esto poner donde se desea que aparesca este formulario
// order_by
//$args = array(
//    "c" => $c,
//    "name" => 'robinson',
//    "form" => array(
//        "id" => $tasks['id'],
//        "order_by" => $tasks['order_by'],
//        "redi" => array(
//            "redi" => "2",
//            "c" => $c,
//            "id" => $tasks['id']
//        )
//    ),
//);
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
    <input type="hidden" name="a" value="ok_change_order_by">
    <input type="hidden" name="id" value="<?php echo $form['id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $form['redi']['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $form['redi']['c']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $form['redi']['id']; ?>">

    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number"  name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $form['order_by'] ?>" >
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
