<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <?php //include view("my_info", "nav"); ?>      

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <i class="fas fa-paint-roller"></i> 
            <?php _t("Personal colors"); ?>
        </h1>

        <p><?php _t("This will change the colors only of your graphical interface"); ?></p>

        <?php
        include "colors.php";
        ?>




    </div>
</div>

<?php include view("home", "footer"); ?>  



