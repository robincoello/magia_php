<?php include view("home", "header"); ?>


<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">


        <div class="panel panel-default">
            <div class="panel-body">


                <div class="alert alert-success" role="alert">
                    <?php _t("Error identification"); ?>
                </div>




                <?php
                if ($error) {
                    foreach ($error as $key => $value) {
                        message("info", "$value");
                    }
                }
                ?>


            </div>
        </div>


        <?php
//include "./www/home/views/form_login.php";
        ?>


        <?php include view("home", "form_login"); ?>







    </div>
    <div class="col-lg-3"></div>
</div>








<?php include view("home", "footer"); ?>