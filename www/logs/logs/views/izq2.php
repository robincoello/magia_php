

<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t('$a'); ?>
    </a>

    <?php foreach (logs_list_distinct_a_by_c($controller) as $key => $logs_list_distinct_a_by_c) { ?>
        <a href="index.php?c=logs&a=search&w=byCA&controller=<?php echo $controller; ?>&action=<?php echo $logs_list_distinct_a_by_c['a'] ?>" class="list-group-item"><?php echo $logs_list_distinct_a_by_c['a'] ?></a>
    <?php } ?>

</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t('Error'); ?>
    </a>

    <a href="index.php?c=logs&a=search&w=byCE&controller=<?php echo $controller; ?>" class="list-group-item">
        Errores
    </a>


</div>

