<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("controllers", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <?php include view("controllers", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($controllers) {
            include "table_controllers_without_folders.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

