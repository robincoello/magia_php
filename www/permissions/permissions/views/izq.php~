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





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "permissions"); ?>
        <?php echo _t("List by rols"); ?>
    </a>
    <?php
    foreach (rols_list_order_by("rango") as $key => $value) {

        $danger = ($value['rango'] <= $config_rango_max_for_labo) ? "list-group-item-danger" : "";

        echo '<a href="index.php?c=permissions&a=search&w=byRol&rol=' . $value['rol'] . '" class="list-group-item ' . $danger . '">' . $value['rol'] . '</a>';
    }
    ?>
</div>