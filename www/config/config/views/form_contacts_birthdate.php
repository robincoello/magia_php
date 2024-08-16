<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_contacts_birthdate">     
    <input type="hidden" name="redi" value="1">


    <div class="radio">
        <label>
            <input type="radio" name="data" value="1" <?php echo (_options_option('config_contacts_birthdate') == '1') ? " checked " : ""; ?>>
            <?php _t("Yes"); ?>

        </label>
    </div>


    <div class="radio">
        <label>
            <input type="radio" name="data" value="0" <?php echo (_options_option('config_contacts_birthdate') == '0') ? " checked " : ""; ?> >
            <?php _t("No"); ?>
        </label>
    </div>


    <button type="submit" class="btn btn-default">
        <?php _t("Save"); ?>
    </button>
</form>



