
<table class="table table-contents">
    <tbody>
        <?php
        foreach (tasks_search_by_controller_doc_id($args['c'], $args['id']) as $key => $task) {

            $icon = tasks_status_field_code('icon', $task["status"]);

            $modal = '<a data-toggle="modal" data-target="#tasksModal_' . $task['id'] . '" href="#">' . $task['title'] . ' </a>

                        <div class="modal fade" id="tasksModal_' . $task['id'] . '" tabindex="-1" role="dialog" aria-labelledby="tasksModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="tasks_addLabel">
                                            ' . _tr("Tasks ") . '              
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>' . _tr('Change to') . '</p>


<div class="dropdown">
    <button 
        class="btn btn-default dropdown-toggle" 
        type="button" 
        id="dropdownMenu_change_status" 
        data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="true">
            ' . (tasks_status_field_code('icon', $task['status'])) . '
            ' . _tr(tasks_status_field_code('name', $task['status'])) . '
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_change_status">
        ';
            foreach (tasks_status_list() as $key => $status) {
                $modal .= '<li><a href = "index.php?c=tasks&a=ok_change_status&id=' . $task["id"] . '&status=' . $status['code'] . '&redi[redi]=3&redi[c]=' . $args['c'] . '&redi[doc_id]=' . $args['id'] . '">' . $status["icon"] . ' ' . _tr($status['name']) . '</a></li>';
            }

            $modal .= '
                    <li role = "separator" class = "divider"></li>
                    <li><a href = "index.php?c=tasks&a=details&id=' . $task["id"] . '">' . _tr("Details") . '</a></li > ';
            $modal .= '
    </ul>
</div>


                                    </div>
    
                                </div>
                            </div>
                        </div>';
            /**
             *                                      <div class="modal-footer">
              <a href="index.php?c=tasks&a=details&id=' . $task["id"] . '" type="button" class="btn btn-default">' . _tr('Edit') . '</a>
              <a href="index.php?c=tasks&a=details&id=' . $task["id"] . '" type="button" class="btn btn-default">' . _tr('Details') . '</a>
              </div>
             */
            echo '<tr>';
            echo '<td colspan="2"><a href="index.php?c=tasks&a=edit&id=' . $task['id'] . '">' . $icon . '  ' . $modal . '</a></td>';
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
            <td class="text-right">
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



