<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "izq.php"; ?>
        <?php // include view("rols", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-language"></i>
            <?php _t("rols details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php // include "form_delete.php"; ?>
        <?php include view("rols", "form_delete"); ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "der.php";  ?>
        <?php // include view("rols", "der"); ?>
    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

