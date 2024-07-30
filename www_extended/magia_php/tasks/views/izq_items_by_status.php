<?php if (isset($status)) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "tasks"); ?>
            <?php echo _tr(tasks_status_field_code('name', $status)); ?>
        </a>
        <?php
//        foreach (tasks_contacts_search_by_status_contact($status, $contact_id) as $tcsbsc) {                        
        foreach ($tasks as $tcsbsc) {
            $task = new Tasks();
            $task->setTasks($tcsbsc['id']);

            $icon = (tasks_status_field_code('icon', $task->getStatus()));

            echo '<a href="index.php?c=tasks&a=edit&id=' . $task->getId() . '" class="list-group-item">' . $icon . ' ' . $task->getTitle() . '</a>';
        }
        ?>
    </div>
<?php } ?>

<?php if (isset($category_id)) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "tasks"); ?>
            <?php echo _tr(tasks_categories_field_id('category', $category_id)); ?>
        </a>
        <?php
//        foreach (tasks_contacts_search_by_status_contact($status, $contact_id) as $tcsbsc) {                        
        foreach ($tasks as $tcsbsc) {
            $task = new Tasks();
            $task->setTasks($tcsbsc['id']);

            $icon = (tasks_status_field_code('icon', $task->getStatus()));

            echo '<a href="index.php?c=tasks&a=edit&id=' . $task->getId() . '" class="list-group-item">' . $icon . ' ' . $task->getTitle() . '</a>';
        }
        ?>
    </div>
<?php } ?>


<?php if (isset($controller)) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "tasks"); ?>
            <?php echo _tr($controller); ?>
        </a>
        <?php
        foreach ($tasks as $tbcontroller) {
            $task = new Tasks();
            $task->setTasks($tbcontroller['id']);

            $icon = (tasks_status_field_code('icon', $task->getStatus()));

            echo '<a href="index.php?c=tasks&a=edit&id=' . $task->getId() . '" class="list-group-item">' . $icon . ' ' . $task->getTitle() . '</a>';
        }
        ?>
    </div>
<?php } ?>
