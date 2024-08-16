<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("_content", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <?php
        include view('_content', 'table_index_hasNotTranslationsToSendGoogle');
        ?>


        <?php
        $pagination->createHtml();
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

