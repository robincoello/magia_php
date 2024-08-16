<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("_menus", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("_menus"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("_menus", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
