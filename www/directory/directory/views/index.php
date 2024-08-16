<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-10">
        <?php include view("directory", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <?php
        if ($directory) {
            include "table_index.php";
        } else {
            message('info', 'No items');
        }
        ?>




        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

