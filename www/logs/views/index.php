<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("logs", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("logs", "izq2"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("logs", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }

        vardump(1);

        echo "<hr>";
        echo "Una";
        echo "<hr>";
        ?>

        <?php
        if ($logs) {
            include "table_index.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

