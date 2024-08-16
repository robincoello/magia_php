<?php
# MagiaPHP 
# file date creation: 2024-01-23 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("modules", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'modules'); ?>
            <?php _t("modules details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("modules", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("modules", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
