

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks"); ?>
        <?php echo _tr(tasks_status_field_code('name', $tasks->getStatus())); ?>
    </a>
    <?php
    foreach (tasks_search_by('status', $tasks->getStatus()) as $tsbs) {

        $icon = ((int) $tsbs['id'] !== (int) $tasks->getId() ) ? tasks_status_field_code('icon', $tsbs['status']) : '<span class="glyphicon glyphicon-chevron-right"></span>';

        $class = ($tsbs["id"] == $tasks->getId()) ? ' list-group-item-info ' : '';

        echo '<a href="index.php?c=tasks&a=edit&id=' . $tsbs['id'] . '" class="list-group-item ' . $class . '">' . $icon . ' ' . $tsbs['title'] . '</a>';

        $icon = null;
    }
    ?>
</div>
