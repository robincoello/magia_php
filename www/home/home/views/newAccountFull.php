<?php include view("home", "header"); ?>

<div class="container-fluid">
    <div class="col-lg-4"> </div>
    <div class="col-lg-4">

        <?php
        // Permite registros automaticos
        if (AUTO_REGISTRE) {
            include view("home", "form_newAccountFull");
        } else {
            include view("home", "form_newAccountDisabled");
        }
        ?>

    </div>
    <div class="col-lg-4"></div>
</div>

<?php include view("home", "footer"); ?>