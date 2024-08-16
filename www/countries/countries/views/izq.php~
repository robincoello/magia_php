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
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Countries"); ?>
    </a>
    <a href="index.php?c=countries" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=countries&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("By continent"); ?>
    </a>
    <?php
    foreach (countries_continent_list() as $key => $continents) {
        echo '<a href="index.php?c=countries&a=search&w=byContinent&continentName=' . $continents['continentName'] . '" class="list-group-item">' . $continents['continentName'] . '</a>';
    }
    ?>
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("By economic union"); ?>
    </a>
    <?php
    foreach (countries_economic_union_list() as $key => $economic_union) {
        echo '<a href="index.php?c=countries&a=search&w=byEconomicUnion&eu=' . $economic_union['eu'] . '" class="list-group-item">' . $economic_union['eu'] . '</a>';
    }
    ?>
</div>