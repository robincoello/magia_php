<div class="dropdown">
    <button 
        class="btn btn-default dropdown-toggle" 
        type="button" 
        id="dropdownMenu_change_status" 
        data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="true">
            <?php echo _tr("Change to"); ?>
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_change_status">
        <?php
        foreach (tasks_status_list() as $key => $status) {
            echo '<li><a href="index.php?c=tasks&a=ok_change_status&id=' . $args["id"] . '&status=' . $status['code'] . '&redi[redi]=1">' . $status["icon"] . ' ' . _tr($status['name']) . '</a></li>';
        }
        echo '
                <li role="separator" class="divider"></li>
                <li><a href="index.php?c=tasks&a=details&id=' . $args["id"] . '">' . _tr("Details") . '</a></li> ';
        ?>
    </ul>
</div>
