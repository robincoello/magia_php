<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq_print"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-28 col-lg-8">
        <?php //include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Print multi languages"); ?></h1>

        <p>
            <?php _t("Activate this option if you want to give the possibility that users can choose the language that they print the documents / PDF"); ?>
        </p>
        <p>
            <?php // _t("If this option is not activated, the documents will be printed in the language of the contact"); ?>
        </p>    

        <p>
            <?php if (_options_option("config_print_multilang")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_print_multilang">            
                <input type="hidden" name="data" value="0">            
                <button type="submit" class="btn btn-danger"><?php _t("Desactivate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently, the system allows the connected user to choose the printing language of the documents."); ?>
            </p>


            <img src="www/gallery/img/print_multilang_yes.png" width="width" height="height" alt="alt"/>


        <?php } else { ?>

            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_print_multilang">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Actualy, the system prints in the language of the contact"); ?>
            </p>


            <img src="www/gallery/img/print_multilang_no.png" width="width" height="height" alt="alt"/>




            <h3>
                <?php _t("Default language"); ?>
            </h3>

            <p>
                <?php _t('If the client does not have a default language defined, the documents will be printed in'); ?>
            </p>

            <h4>
                <?php echo _languages_field_language('name', _options_option('config_print_default_lang')); ?>
            </h4>



            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_print_default_lang">            


                <div class="form-group">
                    <label class="sr-only" for="data"></label>
                    <select class="form-control selectpicker" data-live-search="true" name="data">
                        <option value="0"></option>
                        <?php
                        foreach (_languages_list_by_status(1) as $key => $lang) {

                            $selected = ( $lang['language'] == _options_option('config_print_default_lang') ) ? " selected " : "";
                            ?>
                            <option value="<?php echo $lang['language']; ?>" <?php echo $selected; ?>><?php echo _tr($lang['name']); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
            </form>







        <?php } ?>
        </p>

    </div>
</div>

<?php include view("home", "footer"); ?> 

