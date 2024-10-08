<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("_menus", "izq"); ?>
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

        <h1><?php _t("Menus debug"); ?></h1>




        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_menus_debug">       
            <input type="hidden" name="redi" value="1">

            <div class="form-group">
                <label class="sr-only" for="data"><?php _t("Debug"); ?></label>
                <div class="input-group">                    
                    <select name="data" id="data" class="form-control">
                        <option value="null"><?php _t('Select one'); ?></option>
                        <?php
                        foreach (array(0, 1) as $opt) {

                            $selected = ( _options_option('config_menus_debug') == $opt ) ? " selected " : "";

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
            <?php _t("Debug mode is active?"); ?> : <?php echo (_options_option('config_menus_debug')) ? _tr('Yes') : _tr('No') ?>
        </p>







    </div>
</div>

<?php include view("home", "footer"); ?> 

