<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("permissions", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("permissions", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php // https://api.jquery.com/prop/ ?>

        <?php
        if ($permissions) {
            echo "<h2>" . _tr("Add permissions") . "</h2>";
            include "form_add.php";
            include "table_index.php";
        } else {
            echo "<h2>" . _tr("Add permissions") . "</h2>";

            include "form_add.php";

            echo "<h2>" . _tr("Copy permissions") . "</h2>";
            include "form_copy.php";
        }
        ?>







        <?php
//pagination($url, $totalItems, $pag);
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 