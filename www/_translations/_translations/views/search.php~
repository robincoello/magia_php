<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php include view("_translations", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


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

        <h3><?php _t("Search"); ?>: <?php echo "$txt"; ?></h3>


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

