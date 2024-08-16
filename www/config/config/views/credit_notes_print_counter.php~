<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_credit_notes"); ?>
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

        <h1>
            <span class="glyphicon glyphicon-print"></span>
            <?php _t("Print counter"); ?>
        </h1>

        <p>    <?php _t("In the PDF of the document, you want to print the number of the annual counter of credit_notes or the ID"); ?> </p>


        <p>
            <?php
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            //------------------------------------------------------------------
            if (_options_option("config_credit_notes_print_counter")) {
                ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_credit_notes_print_counter">            
                <input type="hidden" name="data" value="0">            
                <button type="submit" class="btn btn-danger"><?php _t("Print Id"); ?></button>
            </form>
            <p>-</p>

            <p>
                <?php _t("Currently the system prints the counter"); ?>
            </p>

            <img src="www/gallery/img/ok_credit_notes_print_counter_counter.png" width="width" height="height" alt="alt"/>




        <?php } else { ?>

            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_credit_notes_print_counter">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Print counter"); ?></button>
            </form>
            <p>-</p>


            <p>
                <?php _t("Currently the system prints the ID"); ?>
            </p>

            <img src="www/gallery/img/ok_credit_notes_print_counter_id.png" width="width" height="height" alt="alt"/>



        <?php } ?>
        </p>

    </div>
</div>

<?php include view("home", "footer"); ?> 

