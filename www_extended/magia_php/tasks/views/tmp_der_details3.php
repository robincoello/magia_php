<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#F3F781;" >
        <h3 class="panel-title" ><?php _t('Tasks'); ?></h3>
    </div>
    <div class="panel-body">
        <p><?php _t("Tasks list for this document"); ?></p>
        <table class="table table-contents">
            <tbody>
                <?php
                foreach (tasks_search_by_controller_doc_id($args['c'], $args['id']) as $key => $task) {

                    $icon = tasks_status_field_code('icon', $task["status"]);

                    $link_delete = '
<a data-toggle="modal" data-target="#myModalDelete_' . $task["id"] . '">
   <span class="glyphicon glyphicon-trash"></span> 
</a>
<div class="modal fade" id="myModalDelete_' . $task["id"] . '" tabindex="-1" role="dialog" aria-labelledby="myModalDelete_' . $task["id"] . 'Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalDelete_' . $task["id"] . 'Label">' . _tr("Delete") . ' ' . $task["id"] . ' </h4>
      </div>
      <div class="modal-body">
        <p>' . _tr("Are you sure?") . '</p>
        <a href="index.php?c=tasks&a=ok_change_status&id=' . $task['id'] . '&status=50&redi=xxx&redi=xxx"  class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span> delete</a>
      </div>
    </div>
  </div>
</div>';

                    $menu_change_status = '<div class="dropdown">
    <button 
        class="btn btn-default dropdown-toggle" 
        type="button" 
        id="dropdownMenu_change_status" 
        data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="true">
            ' . tasks_status_field_code('name', $task['status']) . '
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_change_status">';

                    foreach (tasks_status_list() as $key => $status) {
                        $menu_change_status .= '<li><a href="index.php?c=tasks&a=ok_change_status&id=' . $task["id"] . '&status=' . $status['code'] . '&redi[redi]=3&c=' . $args['c'] . '">' . $status ["icon"] . ' ' . $status ['name'] . '</a></li>';
                    }

                    $menu_change_status .= '
                <li role="separator" class="divider"></li>
                <li><a href="index.php?c=tasks&a=details&id=' . $args["id"] . '">' . _tr("Details") . '</a></li> 
        
    </ul>
</div>';

                    echo '<tr>';
                    echo "<td>$icon</td>";
                    echo "<td>$task[title]</td>";

                    echo "<td>$menu_change_status</td>";
                    echo "<td>$link_delete</td>";
//                    echo "<td>".include view('tasks','tmp_dropdown_status') ."</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td>
                        <a data-toggle="modal" data-target="#tasksModal" href="#">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            <?php _t("Add"); ?>
                        </a>

                        <div class="modal fade" id="tasksModal" tabindex="-1" role="dialog" aria-labelledby="tasksModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="tasks_addLabel">
                                            <?php _t("Add new tasks"); ?>                
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php include view('tasks', 'form_add_short'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                    <td class="text-right" colspan="3">
                        <a href="index.php?c=tasks">
                            <?php _t("See all tasks"); ?>
                        </a>
                    </td>    
                </tr>
            </tbody>
        </table>


        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc('tasks', 'index', _menus_get_file_name(__FILE__));
        }
        ?>




    </div>
</div>

