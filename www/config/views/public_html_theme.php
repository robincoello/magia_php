<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_public_html"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>

        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Theme"); ?></h1>



        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_public_html_theme">            
            <input type="hidden" name="redi[redi]" value="1">            

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="Rapid" <?php echo (_options_option('config_public_html_theme') == 'Rapid' ) ? " checked " : ""; ?>>
                    <?php _t("Rapid"); ?> (<?php _t("default"); ?>)
                </label>
            </div>


            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="UpConstruction" <?php echo (_options_option('config_public_html_theme') == 'UpConstruction' ) ? " checked " : ""; ?>>
                        <?php _t("UpConstruction"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="Logis" <?php echo (_options_option('config_public_html_theme') == 'Logis' ) ? " checked " : ""; ?> >
                        <?php _t("Logis"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="Pratt" <?php echo (_options_option('config_public_html_theme') == 'Pratt' ) ? " checked " : ""; ?> >
                        <?php _t("Pratt"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="apex" <?php echo (_options_option('config_public_html_theme') == 'apex' ) ? " checked " : ""; ?> >
                        <?php _t("apex"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="barberz-master" <?php echo (_options_option('config_public_html_theme') == 'barberz-master' ) ? " checked " : ""; ?> >
                        <?php _t("barberz-master"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="eNno" <?php echo (_options_option('config_public_html_theme') == 'eNno' ) ? " checked " : ""; ?> >
                        <?php _t("eNno"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="business-casual" <?php echo (_options_option('config_public_html_theme') == 'business-casual' ) ? " checked " : ""; ?> >
                        <?php _t("business-casual"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="onepage_1" <?php echo (_options_option('config_public_html_theme') == 'onepage_1' ) ? " checked " : ""; ?> >
                        <?php _t("onepage_1"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="uno" <?php echo (_options_option('config_public_html_theme') == 'uno' ) ? " checked " : ""; ?> >
                        <?php _t("uno"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="stylish-portfolio" <?php echo (_options_option('config_public_html_theme') == 'stylish-portfolio' ) ? " checked " : ""; ?> >
                        <?php _t("stylish-portfolio"); ?>
                </label>
            </div>


            <button type="submit" class="btn btn-primary"><?php _t("Changer"); ?></button>
        </form>






    </div>
</div>

<?php include view("home", "footer"); ?> 

