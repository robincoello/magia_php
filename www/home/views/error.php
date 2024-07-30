<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>
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

                <h1>Error</h1>
                <p>Please contact the administrator</p>

                <h3>
                    <?php
                    if (!file_exists("./www/$c")) {
                        echo "<p>\$c Controller:  <b>$c</b> No existe</p>";
                    }

                    if (!file_exists("./www/$c/controllers/$a.php")) {
                        echo "<p>\$a Action :  <b>$a</b> No existe</p>";
                    }
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