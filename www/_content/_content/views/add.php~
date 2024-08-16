<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php //include view("_content", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        message("info", "To add a content use tr() or _t() function");
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 

