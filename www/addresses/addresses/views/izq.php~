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
        <?php //echo vardump(_menu_icon_by_location_label("top" , "addresses"))?>
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("Addresses"); ?>
    </a>
    <a href="index.php?c=addresses" class="list-group-item"><?php _t("List"); ?></a>
</div>

<?php
/**
 * <div class="panel panel-primary">
  <div class="panel-heading">
  <?php echo _t("Search by contact"); ?>
  </div>
  <div class="panel-body">
  <?php include "form_search.php"; ?>
  </div>
  </div>
 */
?>



<div class="list-group">
    <a href="#" class="list-group-item active">        
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By country"); ?>
    </a>

    <?php
    //vardump(addresses_list_distincts_countries()); 

    foreach (addresses_list_distincts_countries() as $key => $country) {
        ?>
        <a href="index.php?c=addresses&a=search&w=by_country&country=<?php echo $country['country']; ?>" class="list-group-item"><?php echo countries_country_by_country_code($country['country']) ?></a>
    <?php } ?>


</div>