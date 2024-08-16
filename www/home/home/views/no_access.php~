<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-lg-3">
        <?php //include "izq.php"; ?>
    </div>

    <div class="col-lg-6">


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>






        <div class="panel panel-default">
            <div class="panel-body">

                <h1>No access</h1>
                <p>Sorry, you do not have access to this page, please contact the administrator</p>

                <p>
                    <a class="btn btn-default" href="index.php"><?php _t("Home page"); ?></a>

                    <a class="btn btn-danger" href="index.php?c=home&a=logout">
                        <?php _t("Logout"); ?>
                    </a>

                </p>

                <h3>
                    <?php
                    // vardump($_SESSION); 
                    ?>
                </h3>

            </div>
        </div>









    </div>
    <div class="col-lg-3">
        <?php //include "izq.php"; ?>
    </div>
</div>





<?php include view("home", "footer"); ?>