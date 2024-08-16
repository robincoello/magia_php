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

                <h1>Module not actived</h1>
                <p>Module has to be active if you want use it</p>

                <p>
                    <a class="btn btn-default" href="index.php?c=_options">
                        <?php _t("Activate"); ?>
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