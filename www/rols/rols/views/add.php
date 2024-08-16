<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("rols", "add"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", "rols"); ?>
            <?php _t("Add rols"); ?>
        </h1>


        <?php //include "form_add.php"; ?>
        <?php include "form_add.php"; ?>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "der.php"; ?>
        <?php // include view("rols", "der"); ?>

    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

