<?php include view("home", "header"); ?>

<div class="container-fluid">
    <div class="col-lg-4"> </div>
    <div class="col-lg-4">

        <?php
        // Permite registros automaticos
        if (AUTO_REGISTRE) {
            include view("home", "f_form_new_account");
        } else {

            include view("home", "f_form_new_ccount_disabled");
        }
        ?>

    </div>
    <div class="col-lg-4"></div>
</div>

<?php include view("home", "footer"); ?>