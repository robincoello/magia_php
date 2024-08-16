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
        <?php _menu_icon("top", "users"); ?>
        <?php echo _t("Users"); ?>
    </a>
    <a href="index.php?c=users" class="list-group-item"><?php echo _t("All"); ?></a>


    <a href="index.php?c=users&a=search&w=blocked" class="list-group-item">
        <?php echo users_status_icon(USER_BLOCKED); ?>
        <?php echo _t("Blocked"); ?>
        <span class="badge"><?php echo users_total_by_status(USER_BLOCKED) ?></span>
    </a>


    <a href="index.php?c=users&a=search&w=waiting" class="list-group-item">
        <?php echo users_status_icon(USER_WAITING); ?>
        <?php echo _t("Waiting for approval"); ?>
        <span class="badge"><?php echo users_total_by_status(USER_WAITING) ?></span>
    </a>


    <a href="index.php?c=users&a=search&w=online" class="list-group-item">
        <?php echo users_status_icon(USER_ONLINE); ?>
        <?php echo _t("On line"); ?>
        <span class="badge"><?php echo users_total_by_status(USER_ONLINE) ?></span>
    </a>





    <?php
    /* <a href="index.php?c=users&a=add" class="list-group-item"><?php echo _t("add"); ?></a> */
    ?>
</div>


<?php
/*
  <div class="panel panel-primary">
  <div class="panel-heading">
  <?php echo _t("Search"); ?>
  </div>
  <div class="panel-body">
  <?php include "form_search_by_status.php"; ?>
  </div>
  </div> */
?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "users"); ?>
        <?php echo _t("List by rols"); ?>
    </a>

    <a href="index.php?c=users" class="list-group-item"><?php _t("All"); ?><span class="badge"><?php echo users_total_by_rol(); ?></span></a> 

    <?php
    foreach (rols_list_order_by('rango') as $key => $value) {


        $counter = (users_total_by_rol($value['rol'])) ? "<span class=\"badge\">" . users_total_by_rol($value['rol']) . "</span>" : "";

        echo "<a href=\"index.php?c=users&a=search&w=by_rol&rol=" . $value['rol'] . "\" class=\"list-group-item\">" . $value['rol'] . " $counter </a>";
    }
    ?>

</div>







<?php
/*
  <div class="panel panel-primary">
  <div class="panel-heading">
  <?php echo _t("Search"); ?>
  </div>
  <div class="panel-body">
  <?php include "form_search_by_status.php"; ?>
  </div>
  </div> */
?>






