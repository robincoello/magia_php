<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_cgv_update"> 
    <input type="hidden" name="redi[redi]" value="1">



    <div class="form-group">
        <label for="cgv">
            <?php _t("General conditions of sale"); ?>
        </label>
        <textarea 
            class="form-control" 
            name="data"
            rows="20"
            ><?php echo _options_option('config_cgv'); ?></textarea>
    </div>



    <div class="form-group">

        <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
    </div>

</form>



