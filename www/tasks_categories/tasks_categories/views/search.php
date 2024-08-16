<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("tasks_categories", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("tasks_categories"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("tasks_categories", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
