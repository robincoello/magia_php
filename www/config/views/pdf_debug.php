<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("doc_models", "izq_index"); ?>

        <?php include view("config", "izq_doc_models"); ?>
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

        <h1><?php _t("Pdf debug"); ?></h1>




        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_pdf_debug">       
            <input type="hidden" name="redi[redi]" value="1">

            <div class="form-group">
                <label class="sr-only" for="data"><?php _t("Debug"); ?></label>
                <div class="input-group"> 

                    <select name="data" class="form-control">
                        <option value="null"><?php _t('Select one'); ?></option>
                        <?php
                        foreach (array(0, 1) as $opt) {

                            $selected = ( _options_option('config_pdf_debug') == $opt ) ? " selected " : "";

                            echo '<option value="' . $opt . '"  ' . $selected . '>' . $opt . ' -  ' . $opt . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>


            <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
        </form>
        <br>
        <br>
        <br>

        <p>
            <?php _t("Debug mode is active?"); ?> : <?php echo (_options_option('config_pdf_debug')) ? "yes" : "no"; ?>
        </p>







    </div>
</div>

<?php include view("home", "footer"); ?> 

