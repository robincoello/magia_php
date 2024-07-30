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

        <h1><?php _t("Home page"); ?></h1>

        <p><?php _t("If the user has not defined their home page, this will be the default home page"); ?></p>


        <?php include view('config', 'form_home_page'); ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

