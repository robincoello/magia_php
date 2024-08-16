<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php //include view("my_info", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php //include view("my_info", "nav"); ?>      

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <i class="fas fa-key"></i>
            <?php _t("Change password"); ?>
        </h1>
        <p><?php _t("If you change the password you should re-enter with the new password"); ?></p>

        <?php
//        message('info', 'disabled'); 

        include "form_change_password.php";
        ?>

        <p><?php message("Info", "You will need to re-enter with your new password"); ?></p>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php //include view("my_info", "izq");  ?>
    </div>


</div>

<?php include view("home", "footer"); ?>  



