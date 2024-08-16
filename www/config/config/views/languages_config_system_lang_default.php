<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("_languages", "izq"); ?>
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

        <h1><?php _t("System default language"); ?></h1>

        <p>    <?php _t("What language will be used by default in the system?"); ?> </p>



        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_languages_config_system_lang_default">       
            <input type="hidden" name="redi" value="1">

            <div class="form-group">
                <label class="sr-only" for="home_page"><?php _t("Language"); ?></label>
                <div class="input-group">                    
                    <select name="data" class="form-control">
                        <option value="null"><?php _t('Select one'); ?></option>
                        <?php
                        foreach (_languages_list_by_status(1) as $key => $lang) {

                            $selected = ( config_system_lang_default() == $lang['language'] ) ? " selected " : "";

                            echo '<option value="' . $lang['language'] . '"  ' . $selected . '>' . $lang['language'] . ' -  ' . _tr($lang['name']) . '</option>';
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
            <?php _t("The system use this languages by default"); ?> : <?php echo config_system_lang_default() ?>
        </p>







    </div>
</div>

<?php include view("home", "footer"); ?> 

