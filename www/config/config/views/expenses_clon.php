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
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Expenses clon"); ?></h1>

        <p>
            <?php _t("You can clon (copy) a expense x time you want"); ?>
        </p>    




        <?php
        // var_dump(_options_option('config_expenses_clon'));

        if (_options_option('config_expenses_clon')) {
            ?>

            <h3><?php _t("Is enabled"); ?></h3>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_expenses_clon">
                <input type="hidden" name="data" value="0">
                <input type="hidden" name="redi" value="1">
                <button type="submit" class="btn btn-danger"><?php _t("Disable"); ?></button>
            </form>
        <?php } else { ?>
            <h3><?php _t("Is disable"); ?></h3>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_expenses_clon">
                <input type="hidden" name="data" value="1">
                <input type="hidden" name="redi" value="1">
                <button type="submit" class="btn btn-primary"><?php _t("Enable"); ?></button>
            </form>
        <?php } ?>







    </div>
</div>

<?php include view("home", "footer"); ?> 

