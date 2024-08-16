<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq_logo"); ?>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

        <?php include view("config", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("gallery", "part_index"); ?>

    </div>

</div>

<?php include view("home", "footer"); ?> 

