<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>


    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("countries", "izq"); ?>
    </div>

    <div class="col-xs-12 col-md-8 col-lg-8">
        <?php include view("countries", "nav"); ?>


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
        include "table_index.php";
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

