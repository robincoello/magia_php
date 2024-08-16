<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("contacts_titles", "add"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("Add contacts_titles"); ?>
        </h1>


        <?php //include "form_add.php"; ?>
        <?php include view("contacts_titles", "form_add"); ?>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "der.php"; ?>
        <?php // include view("contacts_titles", "der"); ?>

    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

