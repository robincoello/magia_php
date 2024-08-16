<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <span class="glyphicon glyphicon-link"></span>
            <?php _t("My web site"); ?>
        </h1>


        <?php include view('config', 'form_web_update'); ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

