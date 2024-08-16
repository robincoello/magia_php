<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_contacts"); ?>
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
        <h1><?php _t("Contacts find one"); ?></h1>

        <p>
            <?php echo _t("If when searching for a contact you find only one, go to the detail page of that contact"); ?>?
        </p>

        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_contacts_find_one">     
            <input type="hidden" name="redi" value="1">

            <div class="radio">
                <label>
                    <input type="radio" name="data" value="1" <?php echo (_options_option('config_contacts_find_one') == '1') ? " checked " : ""; ?>>

                    <?php _t("Yes"); ?>

                </label>
            </div>


            <div class="radio">
                <label>
                    <input type="radio" name="data" value="0" <?php echo (_options_option('config_contacts_find_one') == '0') ? " checked " : ""; ?> >

                    <?php _t("No"); ?>
                </label>
            </div>


            <button type="submit" class="btn btn-default">Submit</button>
        </form>





    </div>
</div>

<?php include view("home", "footer"); ?> 

