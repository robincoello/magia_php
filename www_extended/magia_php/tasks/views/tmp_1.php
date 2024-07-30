<?php
$tmp = array();
$tmp['panel'] = "";
//$tmp['title'] = ' ' . $args["order_by"] . ' : ' . $args["controller"] . ' : ' . $args["title"] . ' ';
$tmp['title'] = "Title";
$tmp['description'] = $args["description"];
$tmp['registred_by'] = "";
$tmp['registred_by'] = "";
$tmp['registred_by'] = "";
$tmp['registred_by'] = "";
$tmp['registred_by'] = "";
$tmp['registred_by'] = "";

$args['id'] = "1";
?>

<div class="panel panel-primary">
    <div class="panel-heading"><?php echo $tmp["title"]; ?></div>
    <div class="panel-body">
        <?php echo $tmp['description']; ?>

        <p><?php echo $tmp['registred_by']; ?></p>
        <p>robinson</p>

        <div class="dropdown">
            <button 
                class="btn btn-default dropdown-toggle" 
                type="button" 
                id="dropdownMenu1" 
                data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="true">
                    <?php echo _tr("Change to"); ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                foreach (tasks_status_list() as $key => $status) {
                    echo '
                <li><a href="index.php?c=tasks&a=ok_change_status&id=' . $args["id"] . '&new_status=' . $status['code'] . '&redi=1">' . _tr($status['name']) . '</a></li>';
                }

                echo '
                <li role="separator" class="divider"></li>
                <li><a href="index.php?c=tasks&a=details&id=' . $args["id"] . '">' . _tr("Details") . '</a></li> ';
                ?>
            </ul>
        </div>


    </div>
</div>