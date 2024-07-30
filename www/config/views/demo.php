<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <span class="glyphicon glyphicon-gift"></span>
            <?php _t("Demo"); ?>
        </h1>

        Un sitio demo, borra toda la base de datos e instala una cuenta demo


    </div>
</div>

<?php include view("home", "footer"); ?> 

