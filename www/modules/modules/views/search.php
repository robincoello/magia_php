<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("modules", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("modules"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("modules", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
