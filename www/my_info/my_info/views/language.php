<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php //include view("my_info", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php //include view("my_info", "nav"); ?>      

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <span class="glyphicon glyphicon-globe" ></span> 
            <?php _t("Language"); ?>
        </h1>
        <p><?php _t("Change the system language as well as the impressions, pdf, emails sent"); ?></p>
        <?php include "form_language.php"; ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php //include view("my_info", "izq"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
