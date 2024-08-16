<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("contacts", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("contacts", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
//        if (count($contacts) > 0) {
//            include view('contacts', 'table_index');
//        } else {
//            message('info', 'No items');
//        }
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

