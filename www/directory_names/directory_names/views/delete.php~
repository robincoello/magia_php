<?php
# MagiaPHP 
# file date creation: 2023-02-16 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("directory_names", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <h1>
            <?php _menu_icon("top", 'directory_names'); ?>
            <?php _t("directory_names details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("directory_names", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("directory_names", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
