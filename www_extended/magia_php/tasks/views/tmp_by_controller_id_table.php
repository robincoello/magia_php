<p>
    <b><?php echo _tr("Tasks"); ?> :  </b>
    <a data-toggle="modal" data-target="#tasksModal" href="#">
        <span class="glyphicon glyphicon-plus-sign"></span> 
        <?php _t("Add"); ?>
    </a>
    :
    <a href="index.php?c=tasks">
        <span class="glyphicon glyphicon-th"></span>
        <?php _t("See all tasks"); ?>
    </a>
</p>

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



<table class="table table-striped table-bordered">

    <tr>
        <th><?php _t("Title"); ?></th>
        <th><?php _t("Description"); ?></th>
        <th><?php _t("Date registre"); ?></th>
        <th><?php _t("Status"); ?></th>
    </tr>
    <tbody>

        <?php
        foreach (tasks_search_by_controller_doc_id($args['c'], $args['id']) as $key => $task_item) {

            $task = new Tasks();
            $task->setTasks($task_item['id']);

            $icon = tasks_status_field_code('icon', $task->getStatus());

            $modal = '<a data-toggle="modal" data-target="#tasksModal_' . $task->getId() . '" href="#">' . _tr(tasks_status_field_code('name', $task->getStatus())) . ' </a>

                        <div class="modal fade" id="tasksModal_' . $task->getId() . '" tabindex="-1" role="dialog" aria-labelledby="tasksModalLabel">
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
            ' . (tasks_status_field_code('icon', $task->getStatus())) . '
            ' . _tr(tasks_status_field_code('name', $task->getStatus())) . '
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_change_status">
        ';
            foreach (tasks_status_list() as $key => $status) {
                $modal .= '<li><a href = "index.php?c=tasks&a=ok_change_status&id=' . $task->getId() . '&status=' . $status['code'] . '&redi[redi]=3&redi[c]=' . $args['c'] . '&redi[doc_id]=' . $args['id'] . '">' . $status["icon"] . ' ' . _tr($status['name']) . '</a></li>';
            }

            $modal .= '
                    <li role = "separator" class = "divider"></li>
                    <li><a href = "index.php?c=tasks&a=details&id=' . $task->getId() . '">' . _tr("Details") . '</a></li > ';
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
            echo '<td>' . $task->getTitle() . '</td>';
            echo '<td>' . $task->getDescription() . '</td>';
            echo '<td>' . $task->getDate_registre() . '</td>';
            echo '<td colspan="2"><a href="index.php?c=tasks&a=edit&id=' . $task->getId() . '">' . $icon . '  ' . $modal . '</a></td>';
            echo "</tr>";
        }
        ?>


    </tbody>
</table>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc('tasks', 'index', _menus_get_file_name(__FILE__));
}
?>



