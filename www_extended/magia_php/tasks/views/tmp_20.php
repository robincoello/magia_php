<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo $args['order_by']; ?> <?php echo $args['title']; ?> 
        </h3>
    </div>

    <div class="panel-body">
        <p><?php echo clean($args['description']); ?></p>
        <p><?php _t("Category"); ?>: <?php echo $args['category_id']; ?></p>
        <p>
            <span class="glyphicon glyphicon-user"></span>
            <?php _t("By"); ?>: <?php echo contacts_formated($args['contact_id']); ?></p>
        <p>
            <?php _t("Date"); ?>: <?php echo $args['date_registre']; ?>
        </p>
        <p></p>


        <?php
        include "tmp_dropdown_status.php";
        ?>

        <br>
        <a class="btn btn-primary" href="index.php?c=tasks&a=details&id=<?php echo $args['id']; ?>"><?php echo _t("Details"); ?></a>


    </div>
</div>