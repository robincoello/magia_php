<?php include view("home", "header"); ?>

<div class="container-fluid">
    <div class="col-lg-4"> </div>
    <div class="col-lg-4">



        <p class="text-center">
            <?php logo(200, "img-responsive"); ?>
        </p>

        <h2 class="form-signin-heading text-center">
            <?php _t("New account"); ?>
        </h2>

        <p class="text-center">
            <?php _t("You will receive a confirmation email when your account is active"); ?>
        </p>





    </div>
    <div class="col-lg-4"></div>
</div>

<?php include view("home", "footer"); ?>