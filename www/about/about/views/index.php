<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("about", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("about", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1></h1>

    </div>
</div>

<?php include view("home", "footer"); ?> 
