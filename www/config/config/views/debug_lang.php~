<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Debug language"); ?></h1>


        <?php if (_options_option('debug_lang') && 1 == 60) { ?>

            <form method="post" action="index.php" >

                <input type="hidden" name="c" value="config" >

                <input type="hidden" name="a" value="ok_debug_lang" >

                <input type="hidden" name="status" value="false" >

                <input type="submit" class="btn btn-primary" value="<?php echo _t("Desactivate"); ?>">

            </form>
            <?php
        } else {

            /**
             *         <form method="post" action="index.php" >

              <input type="hidden" name="c" value="config" >

              <input type="hidden" name="a" value="ok_debug_lang" >

              <input type="hidden" name="status" value="true" >

              <input type="submit" class="btn btn-primary" value="<?php echo _t("Activate"); ?>">

              </form>
             */
            ?>

            disabled


        <?php } ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

