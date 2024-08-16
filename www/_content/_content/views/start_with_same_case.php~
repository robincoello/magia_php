<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-xs-12 col-md-10 col-lg-10">
        <?php include view("_content", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
//        vardump($_REQUEST);
//        vardump($view);

        include "table_start_with_same_case.php";
        ?>


        <?php
        $pagination->createHtml();
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

