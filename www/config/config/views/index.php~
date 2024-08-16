<?php include view("home", "header"); ?>  

<div class="row">
    
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        Config


    </div>
</div>

<?php include view("home", "footer"); ?> 

