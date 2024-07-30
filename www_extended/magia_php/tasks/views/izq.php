<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _t("By status"); ?>*
    </a>
    <?php
//    
//    $contact_id = _options_option('task_index_show_by_user');
//
//// TODOS
//    // TODOS
//    // TODOS
//    // TODOS
//    if ($contact_id == "all") {
//        foreach (tasks_status_list() as $tsl) {
//            $icon = ($tsl['icon']) ?? false;
//            $tasks_total_by_status = tasks_total_by_status($tsl['code']);
//            $total = ($tasks_total_by_status) ? '<span class="badge">' . $tasks_total_by_status . '</span>' : false;
//            echo '<a href="index.php?c=tasks&a=search&w=by_status&status=' . $tsl['code'] . '" class="list-group-item">' . $icon . ' ' . _tr($tsl['name']) . ' ' . $total . ' </a>';
//        }
//    } else {
//        // un solo usuario
//        // un solo usuario
//        // un solo usuario
//        // un solo usuario
//        //
////        foreach (tasks_contacts_search_by_contact($contact_id) as $tsl) {
//        foreach (tasks_status_list() as $tsl) {
//            $icon = ($tsl['icon']) ?? false;
//            $tasks_total_by_status = tasks_contacts_total_by_status_contact($tsl['code'], $contact_id);
//            $total = ($tasks_total_by_status) ? '<span class="badge">' . $tasks_total_by_status . '</span>' : false;
//            echo '<a href="index.php?c=tasks&a=search&w=by_status_contact&status=' . $tsl['code'] . '&contact_id=' . $contact_id . '" class="list-group-item">' . $icon . ' ' . _tr($tsl['name']) . ' ' . $total . ' </a>';
////            
//        }
//    }

    foreach (tasks_status_list() as $tsl) {
        $icon = ($tsl['icon']) ?? false;
        $tasks_total_by_status = tasks_total_by_status($tsl['code']);
        $total = ($tasks_total_by_status) ? '<span class="badge">' . $tasks_total_by_status . '</span>' : false;
        echo '<a href="index.php?c=tasks&a=search&w=by_status&status=' . $tsl['code'] . '" class="list-group-item">' . $icon . ' ' . _tr($tsl['name']) . ' ' . $total . ' </a>';
    }
    ?>
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("Controllers"); ?>
    </a>
    <?php
    foreach (tasks_unique_from_col('controller') as $key => $tufcolcontroller) {

        $total_by_controller = tasks_total_by_controller($tufcolcontroller['controller']);

        $icon_total_by_controller = ($total_by_controller) ? '<span class="badge">' . $total_by_controller . '</span>' : '';

        echo '<a href="index.php?c=tasks&a=search&w=by_controller&controller=' . $tufcolcontroller['controller'] . '" class="list-group-item">' . $tufcolcontroller['controller'] . ' ' . $icon_total_by_controller . '</a>';
    }
    ?>
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("Categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_list() as $key => $tcl) {
        $total_by_category = tasks_total_by_category_id($tcl['id']);
        $icon_total_by_category = ($total_by_category) ? '<span class="badge">' . $total_by_category . '</span>' : '';
        echo '<a href="index.php?c=tasks&a=search&w=by_category_id&category_id=' . $tcl['id'] . '" class="list-group-item">' . $tcl['category'] . ' ' . $icon_total_by_category . '</a>';
    }
    ?>
</div>







<?php
/**
 * 

  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t("By date registre"); ?>
  </div>
  <div class="panel-body">
  <form class="form-inline">
  <input type="hidden" name='c' value='tasks'>
  <input type="hidden" name='a' value='search'>
  <input type="hidden" name='w' value='date_registre'>

  <div class="form-group">
  <label class="sr-only" for="date_registre"><?php _t("Date"); ?></label>
  <input type="date" class="form-control" id="date_registre" name="date_registre" disabled="">
  </div>

  <button type="submit" class="btn btn-default" disabled="">
  <?php _t("Search"); ?>
  </button>
  </form>

  </div>
  </div>

 */
?>
