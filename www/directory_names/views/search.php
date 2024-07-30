<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("directory_names", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("directory_names"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("directory_names", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
