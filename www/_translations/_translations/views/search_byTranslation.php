<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_translations", "izq"); ?>
    </div>

    <div class="col-lg-9">
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

        <h3><?php _t("Search"); ?>: <?php echo "$txt"; ?> <?php _t("in"); ?> <?php echo "$language"; ?></h3>


        <?php
//vardump($_translations); 



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

