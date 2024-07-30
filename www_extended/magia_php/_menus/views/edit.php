<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_by_location.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_child_of.php"; ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php include "nav.php"; ?>


        <h1>
            <?php _menu_icon("top", '_menus'); ?>
            <?php _t("_menus edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
        <?php include "form_edit.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
