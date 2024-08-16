<div class="list-group">
    <a href="#" class="list-group-item disabled">
        <?php _t("My account"); ?>
    </a>


    <a href="index.php?c=my_info" class="list-group-item">
        <span class="glyphicon glyphicon-user" ></span> 
        <?php echo contacts_formated($u_id); ?>
    </a>


    <a href="index.php?c=my_info&a=change_colors" class="list-group-item">
        <i class="fas fa-paint-roller"></i> 
        <?php _t("Personal colors"); ?>
    </a>

    <a href="index.php?c=my_info&a=change_password" class="list-group-item">
        <i class="fas fa-key"></i> 
        <?php _t("Change password"); ?>
    </a>

    <a href="index.php?c=my_info&a=language" class="list-group-item">
        <span class="glyphicon glyphicon-globe" ></span> 
        <?php _t("Language"); ?>
    </a>

    <?php
    /*
      <a href="index.php?c=my_info&a=permissions" class="list-group-item">
      <?php _menu_icon('top', 'permissions')?>
      <?php _t("Permissions"); ?>
      </a> */
    ?>

    <a href="index.php?c=my_info&a=home_page" class="list-group-item">
        <?php _menu_icon('top', 'home_page') ?> 
        <?php _t("My home page"); ?>
    </a>

</div>


<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {

    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>

