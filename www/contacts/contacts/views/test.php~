<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("contacts", "test_izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("contacts", "test_nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <h2>TEST</h2>
        <?php
        $name = "robinson";
        vardump(($name));
        vardump(contacts_formated($name));

        // Debe recibir un id
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

