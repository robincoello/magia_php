<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("tasks", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("tasks"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("tasks", "form_search", $arg = ["redi" => 1]); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
