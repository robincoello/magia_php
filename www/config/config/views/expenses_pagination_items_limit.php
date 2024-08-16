<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_expenses"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Expenses pagination items limit"); ?></h1>

        <p>
            <?php _t("Items by page"); ?>
        </p>    


        <?php include view('config', 'form_expenses_pagination_items_limit'); ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

